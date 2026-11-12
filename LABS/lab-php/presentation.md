---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    font-family: "Aptos", "Segoe UI", sans-serif;
    background: #F7F9FC;
    color: #172033;
    padding: 50px 60px;
    font-size: 22px;
  }
  h1, h2 {
    color: #12304A;
  }
  h1 {
    font-size: 2em;
    border-bottom: 5px solid #16A6A1;
    padding-bottom: 12px;
  }
  h2 {
    font-size: 1.4em;
    margin-bottom: 12px;
  }
  strong {
    color: #087E8B;
  }
  ul, ol {
    font-size: 1.05em;
    line-height: 1.6;
  }
  table {
    width: 100%;
    font-size: 0.85em;
    border-collapse: collapse;
    margin-top: 15px;
  }
  th {
    background: #12304A;
    color: #FFFFFF;
    text-align: left;
    padding: 8px 12px;
  }
  td {
    padding: 8px 12px;
    border: 1px solid #D6DEE8;
  }
  code {
    background: #E8EEF5;
    color: #087E8B;
    border-radius: 4px;
    padding: 2px 6px;
  }
  pre {
    background: #E8EEF5;
    border-left: 5px solid #16A6A1;
    padding: 14px;
    font-size: 0.78em;
  }
  section.title {
    background: #12304A;
    color: #F7F9FC;
    text-align: center;
    justify-content: center;
  }
  section.title h1 {
    color: #FFFFFF;
    border-bottom: 5px solid #16A6A1;
  }
  section.title h2 {
    color: #C7D7E5;
    font-weight: normal;
  }
  section.title strong {
    color: #16A6A1;
  }
---

<!-- _class: title -->

# LAB-PHP : APPROFONDIR LES BASES DE PHP

## Découverte des Exceptions, des Namespaces et des Traits

<br>

**Étudiant :** El Faquihi Ayoub  
**Encadrant :** ES-SARRAJ Fouad  

**Solicode Tanger — OFPPT**  
![Solicode Logo width:180px](solicode.png)
![OFPPT Logo width:45px](ofppt.png)

---

# PLAN DE LA PRÉSENTATION

- 1. Introduction et stack technique
- 2. Définitions
- 3. Problème
- 4. Solution

---

# 1. INTRODUCTION ET STACK TECHNIQUE

## Contexte et environnement de travail

- **Projet technique :** Podcast Directory Management
- **Objectif :** Découvrir des notions PHP non encore étudiées en cours
- **Version PHP :** PHP 8.5 (Mode CLI)
- **Environnement :** Terminal PowerShell et Visual Studio Code
- **Bénéfice :** Écrire un code robuste, lisible et bien découpé

---

# 2. DÉFINITIONS (1/3)

## Gestion des erreurs et Exceptions

- Une **erreur** est un dysfonctionnement qui peut bloquer l'application.
- Une **exception** est un objet PHP qui signale une erreur précise.
- L'instruction `throw` déclenche une exception quand une règle métier n'est pas respectée.
- Le bloc `try ... catch` capture l'exception pour afficher un message clair sans bloquer le script.

---

# 2. DÉFINITIONS (2/3)

## Les Namespaces (Espaces de noms)

- Un **namespace** est un dossier virtuel qui regroupe des classes liées.
- Il résout le problème des collisions de noms entre deux classes identiques.
- La déclaration `namespace` se place au tout début du fichier PHP.
- Le mot-clé `use` permet d'importer une classe et de lui donner un alias avec `as`.

---

# 2. DÉFINITIONS (3/3)

## Les Traits en PHP

- Un **trait** est un ensemble de méthodes réutilisables dans plusieurs classes.
- PHP n'autorise pas une classe à hériter de plusieurs classes mères.
- Le trait offre une solution simple pour partager du code sans créer une hiérarchie lourde.
- Une classe intègre un trait grâce au mot-clé `use`.

---

# 3. PROBLÈME

## Problème concret rencontré dans le projet

- **Problème de l'étudiant :** Il devient très difficile de trouver et d'identifier le type exact des erreurs dans le code.
- **Besoin de formation :** Nous voulons aussi être bien prêts pour aborder la section sur Laravel.
- **Conséquence observée :** Le débogage prend trop de temps et les erreurs bloquent le développement.

---

# 4. SOLUTION (1/5)

## Solution proposée et démarche adoptée

- **Solution proposée par l'étudiant :** Apprendre et manipuler ces notions avancées de PHP pour sécuriser le code et se préparer à Laravel.
- **Piliers techniques mis en place dans ce lab :**
  - Détecter et typer précisément les erreurs avec des exceptions personnalisées.
  - Isoler les classes locales et externes dans des namespaces distincts.
  - Partager du code métier réutilisable grâce aux traits.

---

# 4. SOLUTION (2/5)

## Quick Start & Hello World

Vérifier la version de PHP disponible :

```bash
php -v
```

Exécuter un Hello World simple dans le terminal :

```bash
php -r "echo 'Hello World : Environnement PHP prêt !' . PHP_EOL;"
```

- L'environnement PHP fonctionne immédiatement en ligne de commande.
- Tous les exemples du lab sont autonomes et sans dépendance lourde.

---

# 4. SOLUTION (3/5)

## Démonstration 1 : Les Exceptions (`01-exceptions/`)

```php
try {
    if ($durationInSeconds <= 0) {
        throw new InvalidPodcastException("La durée doit être positive.");
    }
    $podcast = new Podcast($title, $durationInSeconds);
} catch (InvalidPodcastException $e) {
    echo "Erreur attrapée : " . $e->getMessage();
}
```

- **Fichier :** `lab-php/01-exceptions/example.php`
- **Commande :** `php lab-php/01-exceptions/example.php`
- **Effet :** Le formulaire gère l'erreur sans planter.

---

# 4. SOLUTION (4/5)

## Démonstration 2 : Les Namespaces (`02-namespaces/`)

```php
use App\Models\Podcast as InternalPodcast;
use ExternalRss\Podcast as RemotePodcast;

$local = new InternalPodcast(101, "Découverte PHP", "Ayoub");
$remote = new RemotePodcast("Flux Radio", "https://example.com/audio.mp3");
```

- **Fichier :** `lab-php/02-namespaces/example.php`
- **Commande :** `php lab-php/02-namespaces/example.php`
- **Effet :** Deux classes nommées `Podcast` coexistent sans conflit.

---

# 4. SOLUTION (5/5)

## Démonstration 3 : Les Traits (`03-traits/`)

```php
trait HasSlug {
    public function slugify(string $text): string { ... }
}

class Podcast { use HasSlug; }
class Category { use HasSlug; }
```

- **Fichier :** `lab-php/03-traits/example.php`
- **Commande :** `php lab-php/03-traits/example.php`
- **Effet :** La fonction `slugify` est partagée sans duplication de code.

---

# LIVRABLES DU LAB

| Livrable | Fichiers associés | Rôle |
| :--- | :--- | :--- |
| **Documentation** | `lab-php/README.md` | Guide du lab, objectifs et commandes |
| **Présentation** | `lab-php/presentation.md` | Support de soutenance Marp |
| **Exceptions** | `01-exceptions/example.php`, `tutorial.md` | Code exécutable et explication ligne par ligne |
| **Namespaces** | `02-namespaces/example.php`, `tutorial.md` | Code exécutable et explication ligne par ligne |
| **Traits** | `03-traits/example.php`, `tutorial.md` | Code exécutable et explication ligne par ligne |

