---
marp: true
theme: default
paginate: true
size: 16:9
---

<!-- _class: title -->

# Architecture PHP OOP

## Service, BaseService et DAO

| Information | Détail |
|---|---|
| **Apprenant** | EL Faquihi Ayoub |
| **Projet fil rouge** | Gestion de bibliothèque |
| **Prototype technique** | Gestion des catégories / thématiques |
| **Stack** | PHP natif et programmation orientée objet |


<!--
Bonjour, je présente mon lab.
Mon projet est une bibliothèque.
Je parle des catégories.
-->

---

# Plan de la présentation

- Contexte, objectif et problématique
- Concepts et responsabilités des classes
- Exemples PHP : BaseService, CategoryService et CategoryDAO
- Workflow entre Controller et stockage
- Bilan et mini-défi

<!--
Je présente le contexte du lab.
J'explique les rôles des classes.
J'analyse des exemples PHP.
-->

---

# Slide 1 — Présentation et contexte

- **Sujet :** comprendre l'architecture Service, BaseService et DAO
- **Projet fil rouge :** gestion de bibliothèque
- **Exemple métier :** catégories et thématiques
- **Objectif :** expliquer les responsabilités, l'héritage et le flux des données
- **Périmètre :** analyser des exemples; ne pas construire un CRUD complet

<!--
Mon projet est une bibliothèque.
Je travaille sur les catégories.
Je vais expliquer cette architecture.
-->

---

# Slide 2 — Problématique et position dans la stack

- Dans une page PHP, les règles métier et l'accès aux données peuvent être mélangés.
- Les méthodes communes peuvent être répétées.
- **Question :** comment séparer ces responsabilités ?

```text
Controller
    ↓
  Service ─── hérite de BaseService
    ↓
   DAO
    ↓
Data Storage
```

- Le type de stockage dépend des exemples PHP étudiés.

<!--
Une page peut mélanger les rôles.
Le code commun peut se répéter.
Nous cherchons une meilleure organisation.
-->

---

# Slide 3 — Concepts et responsabilités

- **Service :** applique les règles métier.
- **BaseService :** parent qui fournit des méthodes communes.
- **Héritage :** un Service spécifique réutilise les méthodes du parent.
- **DAO :** gère l'accès aux données.
- **Séparation des responsabilités :** chaque classe a un rôle défini.

```text
BaseService
     ▲ hérite
CategoryService ── utilise ── CategoryDAO ──► Data Storage
     ▲
Controller
```

<!--
Le service applique les règles.
Le parent partage des méthodes.
Le DAO accède aux données.
-->

---

# Slide 4 — Skill IA et analyse des exemples

- **Skill proposé :** `php-oop-architecture-tutor`
- **Mission :** aider à comprendre les exemples sans construire un CRUD complet
- **Exemples étudiés :** `BaseService`, `CategoryService`, `CategoryDAO`
- **Contexte commun :** catégories de livres dans une bibliothèque

Les exemples suivants illustrent les responsabilités; ils ne constituent pas une application complète.

<!--
Le skill aide à comprendre les exemples.
Je repère le rôle de chaque classe.
J'analyse le code de la bibliothèque.
-->

---

# Slide 5 — Exemple : BaseService

Une aide commune peut vérifier qu'un texte obligatoire n'est pas vide.

```php
abstract class BaseService
{
    protected function requireText(string $value, string $field): string
    {
        $value = trim($value);
        if ($value === '') {
            throw new InvalidArgumentException(
                "$field est obligatoire."
            );
        }

        return $value;
    }
}
```

- `abstract` : cette classe sert de parent.
- `protected` : les Services enfants peuvent appeler cette méthode.

<!--
BaseService est une classe parent.
Elle vérifie un texte obligatoire.
Les services enfants réutilisent cette méthode.
-->

---

# Slide 6 — Exemple : CategoryService

Le Service applique la règle métier des catégories de livres.

```php
final class CategoryService extends BaseService
{
    public function __construct(private CategoryDAO $dao) {}

    public function createCategory(string $name): string
    {
        $name = $this->requireText($name, 'Le nom');

        foreach ($this->dao->findAll() as $category) {
            if (strcasecmp($category['name'], $name) === 0) {
                throw new InvalidArgumentException(
                    'Cette catégorie existe déjà.'
                );
            }
        }

        $this->dao->save($name);
        return $name;
    }
}
```

- Hérite de `BaseService` pour réutiliser `requireText()`.
- Valide le nom et délègue le stockage au DAO.

<!--
CategoryService hérite du parent.
Il vérifie le nom de la catégorie.
Il demande au DAO de la sauvegarder.
-->

---

# Slide 7 — Exemple : CategoryDAO

Le DAO est le seul de ces exemples à lire ou écrire le fichier JSON.

```php
final class CategoryDAO
{
    public function __construct(private string $filePath) {}

    public function findAll(): array
    {
        if (!is_file($this->filePath)) return [];

        $json = file_get_contents($this->filePath);
        if ($json === false) {
            throw new RuntimeException('Lecture impossible.');
        }

        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }

    public function save(string $name): void
    {
        $categories = $this->findAll();
        $categories[] = ['name' => $name];
        $json = json_encode($categories, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);

        if (file_put_contents($this->filePath, $json, LOCK_EX) === false) {
            throw new RuntimeException('Écriture impossible.');
        }
    }
}
```

- `findAll()` lit les catégories existantes.
- `save()` ajoute le nom et enregistre la liste.

<!--
CategoryDAO lit les catégories.
Il écrit aussi dans le fichier JSON.
Le service ne touche pas au fichier.
-->

---

# Slide 8 — Du Controller au stockage

```text
Controller
    │ appelle
    ▼
CategoryService ── hérite de ──► BaseService
    │ valide                  méthode commune
    │ appelle
    ▼
CategoryDAO
    │ lit / écrit
    ▼
categories.json
```

- **Controller :** reçoit la demande.
- **Service :** applique les règles métier.
- **DAO :** accède au stockage.

<!--
Le contrôleur reçoit la demande.
Le service vérifie la catégorie.
Le DAO écrit les données.
-->

---

# Slide 9 — Bilan et mini-défi

- **Avantages :** réutilisation, moins de duplication et code mieux organisé
- **Maintenance :** chaque responsabilité est plus facile à retrouver
- **Comparaison :** PHP regroupé dans une page ou classes séparées
- **Limite :** cette architecture peut être excessive pour un petit script

**Mini-défi :** quelle classe modifier si la règle métier change ? Et si le stockage change ?

<!--
Chaque classe a un rôle.
Je peux expliquer le flux.
Je réponds au mini-défi du formateur.
-->
