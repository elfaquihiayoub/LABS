---
marp: true
theme: default
paginate: true
---

# PHP OOP : Service, BaseService et DAO

## Organiser un CRUD Catégorie / Thématique

**Objectif :** comprendre le rôle de chaque classe et suivre la création d'une catégorie jusqu'au stockage JSON.

---

# Objectifs

- Distinguer une **Entity**, un **DAO** et un **Service**.
- Comprendre l'héritage avec `BaseService`.
- Suivre le flux **JavaScript → Controller → Service → DAO → JSON**.
- Repérer les avantages de la séparation des responsabilités.

---

# Les notions essentielles

- **Classe :** plan qui décrit les données et actions d'un type d'objet.
- **Objet :** instance créée à partir d'une classe.
- **Encapsulation :** regrouper les données et les opérations liées dans une classe.
- **Héritage :** une classe enfant réutilise les méthodes d'une classe parent.
- **Entity :** objet simple qui représente une donnée métier, ici une catégorie.

---

# Une responsabilité par couche

- **Controller :** reçoit la requête HTTP et construit la réponse HTTP.
- **Service :** applique les règles métier et valide les données.
- **DAO (Data Access Object) :** lit et écrit les données dans le stockage.
- **Entity :** représente une catégorie en mémoire.
- **Stockage JSON :** conserve les catégories dans cet exemple pédagogique.

> Le Service ne lit pas directement le fichier. Le Controller ne décide pas des règles métier.

---

# Architecture du flux

```text
Navigateur (JavaScript Fetch)
            │ requête HTTP JSON
            ▼
       Controller
            │ appelle
            ▼
        Service ─── applique validation et règles métier
            │ appelle
            ▼
           DAO ─── lit / écrit
            │
            ▼
 storage/categories.json
```

Le Controller traduit HTTP, le Service décide, et le DAO gère le stockage.

---

# Architecture traditionnelle ou séparée ?

| PHP traditionnel | Service / BaseService / DAO |
|---|---|
| Une page peut traiter HTTP, validation et fichier | Chaque classe a un rôle clair |
| La logique est répétée dans plusieurs pages | Les méthodes communes sont réutilisées |
| Changer le stockage affecte beaucoup de code | Le DAO centralise l'accès aux données |
| Les tests et évolutions sont difficiles | Les responsabilités sont plus simples à vérifier |

La séparation est utile quand l'application grandit. Pour un petit script, elle peut être inutilement lourde.

---

# Héritage : BaseService et CategoryService

- `BaseService` contient des méthodes simples réutilisables par plusieurs services.
- `CategoryService` **hérite** de `BaseService` avec le mot-clé `extends`.
- `CategoryService` conserve les règles propres aux catégories.
- L'héritage sert à partager du code, pas à tout placer dans une classe parent.

```text
BaseService
    ▲
    │ extends
CategoryService ───── utilise ───── CategoryDAO
                                         │
                                         ▼
                                  categories.json
```

---

# Exemple : l'Entity Category

Fichier `src/Entity/Category.php` :

```php
<?php

final class Category
{
    public function __construct(
        public readonly string $id,
        public readonly string $name
    ) {
    }

    public function toArray(): array
    {
        return ['id' => $this->id, 'name' => $this->name];
    }
}
```

L'Entity représente une catégorie. Elle ne valide pas le formulaire et ne connaît pas le fichier JSON.

---

# Exemple : le DAO

Fichier `src/DAO/CategoryDAO.php` :

```php
<?php

final class CategoryDAO
{
    public function __construct(private string $filePath)
    {
    }

    /** @return Category[] */
    public function findAll(): array
    {
        if (!is_file($this->filePath)) {
            return [];
        }

        $json = file_get_contents($this->filePath);
        if ($json === false) {
            throw new RuntimeException('Impossible de lire le fichier.');
        }

        $rows = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        if (!is_array($rows) || !array_is_list($rows)) {
            throw new RuntimeException('Le fichier JSON doit contenir une liste.');
        }

        $categories = [];
        foreach ($rows as $row) {
            if (!is_array($row) || !isset($row['id'], $row['name'])) {
                throw new RuntimeException('Une catégorie du fichier est invalide.');
            }
            $categories[] = new Category((string) $row['id'], (string) $row['name']);
        }

        return $categories;
    }
```

Le DAO convertit les lignes JSON en objets `Category`.

---

# DAO : enregistrer une catégorie

Suite de `CategoryDAO.php` :

```php
    public function save(Category $category): void
    {
        $categories = $this->findAll();
        $categories[] = $category;

        $rows = array_map(
            static fn (Category $item): array => $item->toArray(),
            $categories
        );
        $json = json_encode($rows, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);

        if (file_put_contents($this->filePath, $json, LOCK_EX) === false) {
            throw new RuntimeException('Impossible d\'écrire le fichier.');
        }
    }
}
```

`save()` ajoute la catégorie à la liste puis écrit la liste complète. `LOCK_EX` verrouille le fichier pendant l'écriture, mais ne rend pas toute l'opération lecture-modification-écriture sûre face à plusieurs requêtes simultanées.

---

# BaseService : les aides communes

Fichier `src/Service/BaseService.php` :

```php
<?php

abstract class BaseService
{
    protected function requireText(string $value, string $field): string
    {
        $value = trim($value);
        if ($value === '') {
            throw new InvalidArgumentException("$field est obligatoire.");
        }

        return $value;
    }

    protected function newId(): string
    {
        return bin2hex(random_bytes(8));
    }
}
```

`abstract` signifie qu'on ne crée pas directement un `BaseService`. Les Services enfants utilisent ses méthodes.

---

# CategoryService : la règle métier

Fichier `src/Service/CategoryService.php` :

```php
<?php

final class CategoryService extends BaseService
{
    public function __construct(private CategoryDAO $dao)
    {
    }

    public function create(string $name): Category
    {
        $name = $this->requireText($name, 'Le nom');

        foreach ($this->dao->findAll() as $existing) {
            if (strcasecmp($existing->name, $name) === 0) {
                throw new InvalidArgumentException('Cette catégorie existe déjà.');
            }
        }

        $category = new Category($this->newId(), $name);
        $this->dao->save($category);

        return $category;
    }
}
```

Le Service valide le nom, empêche les doublons simples sans tenir compte de la casse, puis demande au DAO d'enregistrer l'objet.

---

# Controller : relier HTTP au Service

Extrait simplifié de `CategoryController.php` :

```php
<?php

final class CategoryController
{
    public function __construct(private CategoryService $service)
    {
    }

    public function store(array $input): array
    {
        $name = $input['name'] ?? null;
        if (!is_string($name)) {
            throw new InvalidArgumentException('Le champ name est obligatoire.');
        }

        return $this->service->create($name)->toArray();
    }
}
```

L'endpoint `POST /api/categories` décode le JSON, appelle `store()`, puis renvoie une réponse JSON avec le statut HTTP `201`. Les erreurs de saisie renvoient `422`; les erreurs de stockage doivent être journalisées et renvoyer `500`.

---

# JavaScript : envoyer le formulaire avec Fetch

```javascript
async function createCategory(name) {
  const response = await fetch('/api/categories', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: JSON.stringify({ name })
  });

  const result = await response.json();
  if (!response.ok) {
    throw new Error(result.error ?? 'La création a échoué.');
  }

  return result;
}
```

Le navigateur envoie `{"name":"Design"}` et attend une réponse JSON. `response.ok` permet de détecter les réponses HTTP en erreur.

---

# De Fetch au fichier JSON : étape par étape

1. L'utilisateur saisit **Design** et valide le formulaire.
2. `fetch()` envoie une requête `POST` avec `Content-Type: application/json`.
3. Le Controller décode le corps JSON et appelle `CategoryService::create()`.
4. Le Service nettoie et valide le nom, puis construit une Entity `Category`.
5. Le DAO ajoute l'Entity et écrit la liste dans `storage/categories.json`.
6. Le Controller renvoie le résultat; le navigateur affiche la nouvelle catégorie.

**Réponse possible :** `{"id":"a1b2c3d4e5f67890","name":"Design"}`

---

# Exemple du stockage obtenu

Fichier `storage/categories.json` :

```json
[
  {
    "id": "a1b2c3d4e5f67890",
    "name": "Design"
  }
]
```

- Le fichier absent représente une liste vide au premier lancement.
- Le dossier `storage/` doit exister avant la première écriture.
- Le DAO est le seul composant de cet exemple qui lit ou écrit le fichier.
- En production, une base de données est généralement préférable à un fichier JSON.

---

# Et pour le reste du CRUD ?

- **Create :** le Service valide, puis le DAO ajoute une catégorie.
- **Read :** le Controller appelle le Service, qui demande `findAll()` au DAO.
- **Update :** le Service valide les nouvelles valeurs, puis le DAO remplace l'entrée ciblée.
- **Delete :** le Service vérifie la règle métier, puis le DAO retire l'entrée ciblée.

Chaque opération suit la même direction : **Controller → Service → DAO**.

---

# À retenir

- L'**Entity** représente les données métier.
- Le **DAO** est responsable du stockage.
- Le **Service** porte les règles métier et la validation.
- Le **BaseService** partage quelques méthodes utiles par héritage.
- Cette organisation réduit les doublons et rend le code plus lisible et maintenable.

**Question de vérification :** dans quel fichier faut-il modifier le code si le stockage JSON devient une base de données ?

---

# Sources et hypothèses de l'exemple

- Exemple pédagogique sans framework PHP; le routage HTTP dépend de l'application.
- Chaque classe est placée dans le fichier indiqué; un autoloader doit charger ces classes.
- `array_is_list()` nécessite PHP 8.1 ou plus récent.
- Le contrôle de doublon avec `strcasecmp()` est insensible à la casse pour les caractères ASCII.
