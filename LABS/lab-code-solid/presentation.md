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
    padding: 48px 64px;
    font-size: 22px;
  }
  h1, h2, h3 { color: #12304A; }
  h1 {
    font-size: 1.9em;
    border-bottom: 5px solid #16A6A1;
    padding-bottom: 10px;
  }
  h2 { font-size: 1.25em; }
  h3 { font-size: 1em; }
  strong { color: #087E8B; }
  ul, ol { line-height: 1.45; }
  li { margin-bottom: 7px; }
  code {
    background: #E8EEF5;
    color: #087E8B;
    border-radius: 4px;
    padding: 2px 6px;
  }
  pre {
    background: #E8EEF5;
    border-left: 5px solid #16A6A1;
    padding: 12px 16px;
    font-size: 0.78em;
  }
  table {
    width: 100%;
    font-size: 0.8em;
    border-collapse: collapse;
  }
  th {
    background: #12304A;
    color: #FFFFFF;
    text-align: left;
    padding: 8px 10px;
  }
  td { padding: 8px 10px; border: 1px solid #D6DEE8; }
  section.title {
    background: #12304A;
    color: #F7F9FC;
    text-align: center;
    justify-content: center;
  }
  section.title h1 {
    color: #FFFFFF;
    border-bottom-color: #16A6A1;
  }
  section.title h2 { color: #C7D7E5; }
  section.title strong { color: #16A6A1; }
  section.summary { background: #EAF7F6; }
---

<!-- _class: title -->

# LAB-CODE-SOLID

## Mieux organiser le code PHP

**Étudiant :** El Faquihi Ayoub  
**Encadrant :** ES-SARRAJ Fouad  
**Centre :** Solicode Tanger — OFPPT

---

# AUJOURD'HUI

- Comprendre une règle à la fois.
- Voir cette règle dans un catalogue de podcasts.
- Lancer un exemple PHP et vérifier son résultat.

---

# POURQUOI CES RÈGLES ?

- Un programme grandit avec le projet.
- Des classes trop liées sont difficiles à changer.
- Un petit changement peut alors casser une autre fonction.
- SOLID donne cinq repères pour organiser ce code.

---

# QUE VEUT DIRE « SOLID » ?

- **S** — Single Responsibility Principle
- **O** — Open/Closed Principle
- **L** — Liskov Substitution Principle
- **I** — Interface Segregation Principle
- **D** — Dependency Inversion Principle

Chaque lettre représente un principe de conception.

---

# S — UNE CLASSE, UN RÔLE

## SRP : Single Responsibility Principle

**Objectif :** une classe a une responsabilité principale.

Exemple : le catalogue reçoit les données d'un podcast.

- `Podcast` garde le titre, l'animateur et la durée.
- `PodcastValidator` vérifie les données du formulaire.

La validation peut changer sans changer l'objet `Podcast`.

---

# SRP — LE TEST

```php
$errors = $validator->validate($input);
$podcast = new Podcast('PHP simple', 'Ayoub', 600);
```

- Les données correctes donnent zéro erreur.
- Les données incorrectes donnent trois erreurs.
- L'objet `Podcast` garde les informations.

**À retenir :** séparer les rôles rend les changements plus simples.

Exemple : `01-srp/example.php`

---

# O — AJOUTER UNE RÈGLE

## OCP : Open/Closed Principle

**Objectif :** ajouter un comportement sans réécrire le code stable.

Dans le catalogue, on veut chercher par catégorie ou par titre.

- `PodcastSearch` effectue la recherche.
- Chaque filtre suit le contrat `PodcastFilter`.
- `CategoryFilter` et `TitleFilter` sont des filtres différents.

On peut ajouter un filtre sans modifier `PodcastSearch`.

---

# OCP — LE TEST

```php
$results = $search->find($podcasts, [
    new CategoryFilter('Développement'),
    new TitleFilter('Laravel'),
]);
```

Le moteur applique les deux règles.
Le résultat contient seulement « PHP et Laravel ».

**À retenir :** ajouter une règle ne demande pas de changer le moteur.

Exemple : `02-ocp/example.php`

---

# L — RESPECTER LE CONTRAT

## LSP : Liskov Substitution Principle

**Objectif :** une classe enfant peut remplacer sa classe parent.

Le catalogue peut lire un épisode local ou importé.

- `AudioEpisode` définit les informations et la lecture.
- `LocalEpisode` et `ImportedEpisode` respectent ce contrat.
- `playEpisode()` accepte un `AudioEpisode`.

Le lecteur n'a pas besoin de connaître le type précis.

---

# LSP — LE TEST

```php
function playEpisode(AudioEpisode $episode): string
{
    return $episode->getSourceName() . ' - ' . $episode->play();
}
```

Le même lecteur fonctionne avec les deux types d'épisodes.
Chaque épisode garde un titre, une durée positive et une URL valide.

**À retenir :** une classe enfant doit respecter les attentes de son parent.

Exemple : `03-lsp/example.php`

---

# I — UNE INTERFACE UTILE

## ISP : Interface Segregation Principle

**Objectif :** ne pas obliger une classe à utiliser des méthodes inutiles.

Le catalogue sépare deux actions :

- `PodcastReader` permet de lire les podcasts.
- `PodcastWriter` permet d'en ajouter.

La liste publique a seulement besoin de lire.
Elle n'a donc pas besoin d'une fonction d'écriture.

---

# ISP — LE TEST

```php
final class PodcastList
{
    public function __construct(
        private readonly PodcastReader $catalog
    ) {}
}
```

`PodcastList` reçoit un lecteur.
Il n'a pas besoin d'un catalogue qui sait modifier les données.

**À retenir :** créer de petites interfaces selon les besoins.

Exemple : `04-isp/example.php`

---

# D — DÉPENDRE D'UN CONTRAT

## DIP : Dependency Inversion Principle

**Objectif :** le service métier dépend d'une interface, pas d'un stockage précis.

- `PodcastCatalogService` utilise `PodcastRepository`.
- Le dépôt en mémoire respecte cette interface.
- Un dépôt de base de données peut aussi la respecter.

Le service n'a pas besoin de connaître le type de stockage.

---

# DIP — LE TEST

```php
$repository = new InMemoryPodcastRepository();
$catalog = new PodcastCatalogService($repository);

$catalog->add('PHP au quotidien', 'Ayoub');
```

Le service enregistre et relit le podcast via le contrat.
On peut remplacer le dépôt sans réécrire le service.

**À retenir :** le service connaît l'interface, pas les détails du stockage.

Exemple : `05-dip/example.php`

---

# LES PRINCIPES EN UN COUP D'ŒIL

| Principe | Question simple | Exemple |
| --- | --- | --- |
| SRP | La classe a-t-elle un seul rôle ? | Données et validation séparées |
| OCP | Peut-on ajouter une règle sans réécrire le moteur ? | Filtres de recherche |
| LSP | Le type enfant respecte-t-il le contrat ? | Épisode local ou importé |
| ISP | L'interface contient-elle seulement les actions utiles ? | Lire séparé d'écrire |
| DIP | Le service dépend-il d'un contrat ? | Dépôt défini par interface |

---

# LANCER ET VÉRIFIER

Depuis la racine du dépôt, lancez un exemple :

```bash
php -d xdebug.mode=off LABS/lab-code-solid/01-srp/example.php
```

- Vérifiez aussi les dossiers `02-ocp` à `05-dip`.
- Chaque ligne `[OK]` indique un test réussi.
- `resultats.md` résume les vérifications des cinq exemples.

---

<!-- _class: summary -->

# À RETENIR

- **SRP :** séparer les responsabilités.
- **OCP :** permettre d'ajouter des règles.
- **LSP :** respecter le contrat parent.
- **ISP :** créer des interfaces utiles et petites.
- **DIP :** dépendre d'une interface.

Les exemples sont dans `LABS/lab-code-solid/`.
