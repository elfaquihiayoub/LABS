# Lab : Architecture PHP OOP avec Service, BaseService et DAO

> **Sujet :** créer une catégorie à partir d'un formulaire JavaScript, valider la demande dans un Service et enregistrer les données dans un fichier JSON avec un DAO.

## 1. Présentation du Lab

### 1.1 Métadonnées

- **Technologie :** PHP natif, programmation orientée objet, JavaScript Fetch et JSON
- **Niveau :** débutant en POO
- **Durée estimée :** 2 heures
- **Prérequis :** PHP 8.1 ou plus récent, terminal, navigateur et notions de HTML/JavaScript
- **Base de données :** aucune; le fichier JSON sert de stockage pédagogique

### 1.2 Introduction

Ce lab montre comment organiser une petite fonctionnalité PHP en classes simples. Nous créons une catégorie et séparons la représentation des données, les règles métier et le stockage.

### 1.3 Contexte et objectif

Un formulaire permet à l'utilisateur d'ajouter une catégorie ou thématique. À la fin du lab, l'apprenant sait expliquer et réaliser le flux complet :

```text
Formulaire → JavaScript Fetch → Controller → CategoryService
                                      ↓             ↓
                                    réponse     BaseService
                                                    ↓
                                                CategoryDAO → categories.json
```

Le résultat attendu est une catégorie validée, affichée dans le navigateur et enregistrée dans `storage/categories.json`.

### 1.4 Besoin

- Accepter un nom de catégorie envoyé en JSON.
- Refuser un nom vide ou un doublon sans tenir compte de la casse.
- Persister les catégories dans un fichier JSON.
- Retourner une réponse JSON et un statut HTTP adaptés.

## 2. Notions théoriques

| Notion | Définition simple | Exemple dans le lab |
|---|---|---|
| Classe | Plan qui définit les données et comportements d'un type d'objet | `CategoryService` |
| Objet | Instance créée à partir d'une classe | Une catégorie nommée « Design » |
| Encapsulation | Regroupement des données et comportements liés | Le DAO regroupe la lecture et l'écriture du JSON |
| Entity | Objet qui représente une donnée métier | `Category` |
| DAO | Objet responsable de l'accès au stockage | `CategoryDAO` |
| Service | Objet qui applique les règles métier | `CategoryService` |
| Héritage | Une classe enfant réutilise les méthodes de sa classe parent | `CategoryService extends BaseService` |

### Responsabilité des classes

- **Entity :** représente une catégorie en mémoire; elle ne connaît ni HTTP ni le stockage.
- **DAO :** convertit les données JSON en objets et enregistre les objets dans le fichier.
- **BaseService :** contient de petites méthodes réutilisables par plusieurs Services.
- **CategoryService :** applique les règles liées à une catégorie et demande au DAO de la sauvegarder.
- **Controller :** reçoit les données HTTP et coordonne le Service et la réponse.

Le Service utilise le DAO; le Controller ne lit pas lui-même le fichier. Cette séparation rend chaque responsabilité plus facile à comprendre et à modifier.

### Architecture traditionnelle et architecture séparée

| PHP traditionnel dans une seule page | Architecture de ce lab |
|---|---|
| HTTP, validation et fichier mélangés | Une responsabilité par classe |
| Logique répétée dans plusieurs pages | Méthodes communes dans `BaseService` |
| Changer le stockage touche plusieurs endroits | Le DAO centralise le stockage |
| Les erreurs sont difficiles à isoler | Les rôles sont plus faciles à tester |

Pour un script très court, cette organisation peut être excessive. Elle devient plus utile lorsque l'application comporte plusieurs fonctionnalités.

## 3. Réalisation pratique

### 3.1 Préparer le projet

Créez cette structure :

```text
php-category-lab/
├── public/
│   ├── index.php
│   └── index.html
├── src/
│   ├── Controller/CategoryController.php
│   ├── DAO/CategoryDAO.php
│   ├── Entity/Category.php
│   └── Service/
│       ├── BaseService.php
│       └── CategoryService.php
└── storage/
    └── categories.json
```

Initialisez `storage/categories.json` avec une liste vide :

```json
[]
```

Dans le terminal, placez-vous dans `php-category-lab`, puis lancez le serveur PHP avec `index.php` comme routeur :

```bash
php -S 127.0.0.1:8000 -t public public/index.php
```

Le dossier `storage/` doit être accessible en écriture par PHP. Ce serveur intégré convient au développement local, pas à une mise en production.

### 3.2 Étape 1 — Créer l'Entity

Dans `src/Entity/Category.php`, représentez une catégorie. Les propriétés `readonly` évitent leur modification après la construction de l'objet.

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

**À vérifier :** une catégorie possède toujours un identifiant et un nom. L'Entity ne valide pas les règles métier.

### 3.3 Étape 2 — Créer le DAO

Dans `src/DAO/CategoryDAO.php`, centralisez les opérations sur le fichier JSON :

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
            if (
                !is_array($row)
                || !isset($row['id'], $row['name'])
                || !is_string($row['id'])
                || !is_string($row['name'])
            ) {
                throw new RuntimeException('Une catégorie du fichier est invalide.');
            }

            $categories[] = new Category($row['id'], $row['name']);
        }

        return $categories;
    }

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

`findAll()` lit le fichier et construit des Entities. `save()` ajoute une Entity et réécrit la liste. `LOCK_EX` verrouille le fichier pendant l'écriture, mais ne rend pas l'ensemble lecture-modification-écriture sûr face à des requêtes simultanées. Un fichier JSON est ici un stockage d'apprentissage, pas une base adaptée à une application multi-utilisateur.

### 3.4 Étape 3 — Créer le BaseService

Dans `src/Service/BaseService.php`, placez les méthodes simples partagées :

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

La classe est `abstract` : on ne crée pas directement de `BaseService`. Les Services spécialisés héritent de ses méthodes.

### 3.5 Étape 4 — Créer le CategoryService

Dans `src/Service/CategoryService.php`, placez les règles métier de création :

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

Le Service réutilise `requireText()` et `newId()` grâce à l'héritage. `strcasecmp()` compare les noms sans tenir compte de la casse pour les caractères ASCII.

### 3.6 Étape 5 — Créer le Controller

Dans `src/Controller/CategoryController.php`, vérifiez la forme des données puis déléguez la règle métier :

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

Le Controller ne valide pas les règles spécifiques de nom et ne touche pas au stockage.

### 3.7 Étape 6 — Relier les classes à HTTP

Dans `public/index.php`, chargez les classes, acceptez uniquement `POST /api/categories` et transformez les résultats en réponses HTTP JSON :

```php
<?php

if (
    PHP_SAPI === 'cli-server'
    && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/index.html'
) {
    return false;
}

require_once __DIR__ . '/../src/Entity/Category.php';
require_once __DIR__ . '/../src/DAO/CategoryDAO.php';
require_once __DIR__ . '/../src/Service/BaseService.php';
require_once __DIR__ . '/../src/Service/CategoryService.php';
require_once __DIR__ . '/../src/Controller/CategoryController.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST'
    || parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) !== '/api/categories') {
    http_response_code(404);
    echo json_encode(['error' => 'Route introuvable.']);
    exit;
}

try {
    $body = file_get_contents('php://input');
    if ($body === false) {
        throw new RuntimeException('Impossible de lire la requête.');
    }

    $input = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($input)) {
        throw new InvalidArgumentException('Le corps JSON doit être un objet.');
    }

    $dao = new CategoryDAO(__DIR__ . '/../storage/categories.json');
    $service = new CategoryService($dao);
    $controller = new CategoryController($service);
    $category = $controller->store($input);

    http_response_code(201);
    echo json_encode($category, JSON_THROW_ON_ERROR);
} catch (JsonException $exception) {
    http_response_code(400);
    echo json_encode(['error' => 'Le JSON envoyé est invalide.']);
} catch (InvalidArgumentException $exception) {
    http_response_code(422);
    echo json_encode(['error' => $exception->getMessage()]);
} catch (Throwable $exception) {
    error_log((string) $exception);
    http_response_code(500);
    echo json_encode(['error' => 'Une erreur interne est survenue.']);
}
```

Le point d'entrée traduit les exceptions en statuts HTTP. Les erreurs internes sont journalisées plutôt que renvoyées au navigateur.

### 3.8 Étape 7 — Envoyer la catégorie avec Fetch

Dans `public/index.html`, créez un formulaire et envoyez son contenu au Controller :

```html
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Gestion des catégories</title>
</head>
<body>
  <h1>Créer une catégorie</h1>
  <form id="category-form">
    <label for="name">Nom</label>
    <input id="name" name="name" required>
    <button type="submit">Créer</button>
  </form>
  <p id="message" role="status"></p>

  <script>
    const form = document.querySelector('#category-form');
    const message = document.querySelector('#message');

    form.addEventListener('submit', async (event) => {
      event.preventDefault();
      const name = new FormData(form).get('name');

      try {
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

        message.textContent = `Catégorie créée : ${result.name}`;
        form.reset();
      } catch (error) {
        message.textContent = error.message;
      }
    });
  </script>
</body>
</html>
```

Ouvrez `http://127.0.0.1:8000/index.html` dans le navigateur. `fetch()` envoie le JSON, et `response.ok` permet de distinguer une réponse HTTP réussie d'une erreur.

### 3.9 Comprendre le flux de création

1. L'utilisateur entre `Design` dans le formulaire et clique sur **Créer**.
2. JavaScript envoie `{"name":"Design"}` avec une requête HTTP `POST`.
3. Le Controller décode le JSON et appelle `CategoryService::create()`.
4. Le Service nettoie et valide le nom, puis construit l'Entity `Category`.
5. Le DAO ajoute la catégorie à `storage/categories.json`.
6. Le Controller renvoie le JSON créé avec le statut `201`; le navigateur affiche le nom.

Après la création, le fichier contient par exemple :

```json
[
  {
    "id": "identifiant-genere",
    "name": "Design"
  }
]
```

### 3.10 Vérifier le résultat

- Créer `Design` : réponse HTTP `201`, message de succès et entrée dans le fichier JSON.
- Envoyer un nom vide ou des espaces : réponse HTTP `422`.
- Créer `Design`, puis `design` : la deuxième requête renvoie `422` pour doublon.
- Envoyer du JSON mal formé : réponse HTTP `400`.
- Vérifier le terminal PHP en cas d'erreur interne : le détail est dans le journal du serveur.

Les autres opérations CRUD suivraient la même direction `Controller → Service → DAO` :

- **Read :** le Service demande au DAO la liste avec `findAll()`.
- **Update :** le Service valide les nouvelles valeurs, puis demande au DAO de mettre à jour l'entrée ciblée.
- **Delete :** le Service vérifie les règles métier, puis demande au DAO de retirer l'entrée ciblée.

## 4. Fichiers et responsabilités

| Fichier | Responsabilité |
|---|---|
| `src/Entity/Category.php` | Représenter une catégorie |
| `src/DAO/CategoryDAO.php` | Lire et écrire le stockage JSON |
| `src/Service/BaseService.php` | Fournir des aides communes aux Services |
| `src/Service/CategoryService.php` | Appliquer les règles métier de catégorie |
| `src/Controller/CategoryController.php` | Recevoir les données et appeler le Service |
| `public/index.php` | Relier la requête HTTP au Controller et produire la réponse |
| `public/index.html` | Afficher le formulaire et envoyer la requête Fetch |
| `storage/categories.json` | Conserver les catégories de cet exemple |

## 5. Défi Sprint devant le formateur

### Démonstration en cinq minutes

1. Créer une catégorie depuis le formulaire.
2. Montrer la réponse JSON et le contenu du fichier.
3. Envoyer un nom vide et un doublon, puis expliquer les statuts HTTP.
4. Montrer le diagramme et expliquer le rôle de `BaseService`, `CategoryService` et `CategoryDAO`.

### Mini-défi

Ajouter une règle limitant le nom à 80 caractères. Placez la règle dans `CategoryService`, puis vérifiez qu'un nom trop long est refusé avec `422`.

### Intégration dans le projet fil rouge

Remplacez le fichier JSON par le stockage choisi pour le prototype, tout en gardant les responsabilités séparées. Dans une application avec plusieurs utilisateurs, préférez une base de données au fichier JSON.

## 6. À retenir

- L'Entity représente les données.
- Le DAO gère l'accès au stockage.
- Le Service contient les règles métier.
- Le BaseService partage quelques méthodes réutilisables par héritage.
- Le Controller fait le lien entre HTTP et les classes métier.
- La séparation réduit les duplications et facilite l'évolution du code.

## 7. Limites et prérequis techniques

- PHP 8.1+ est requis pour les propriétés `readonly` et `array_is_list()`.
- Les fichiers utilisent `require_once` pour rester simples dans ce lab; un projet plus grand peut utiliser Composer et l'autoloading PSR-4.
- Le fichier JSON ne gère pas de manière fiable plusieurs écritures concurrentes; il sert uniquement à comprendre la séparation des responsabilités.
- L'exemple ne met pas en place l'authentification, les protections CSRF, ni une configuration de production.
