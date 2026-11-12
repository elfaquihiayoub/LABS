# Tutoriel : Les Namespaces (Espaces de noms)

## 1. Objectif du tutoriel

Ce tutoriel explique comment organiser les classes PHP avec des namespaces.
Il montre comment éviter les erreurs de noms identiques entre deux fichiers ou librairies.

## 2. Contexte dans le projet technique

Dans le projet **Podcast Directory Management**, nous créons une classe `Podcast`.
Cette classe gère les podcasts stockés dans notre base de données.
Plus tard, nous ajoutons une librairie externe pour lire des flux RSS.
Cette librairie possède aussi une classe nommée `Podcast`.
Sans namespace, PHP refuse d'exécuter le script avec une erreur fatale.
Avec les namespaces, les deux classes ont leur propre espace de rangement.

## 3. Fichiers concernés

- Fichier exemple : `example.php`
- Emplacement : `lab-php/02-namespaces/example.php`

## 4. Explication pas à pas du code

Voici l'analyse du fichier `example.php` dans l'ordre de lecture :

### Étape 1 : Déclarer le namespace local (Lignes 9-22)
```php
namespace App\Models {
    class Podcast { ... }
}
```
- Le mot-clé `namespace` indique le dossier virtuel de la classe.
- Le nom complet de cette classe devient `App\Models\Podcast`.
- Elle représente l'entité interne de notre projet.

### Étape 2 : Déclarer le namespace externe (Lignes 25-38)
```php
namespace ExternalRss {
    class Podcast { ... }
}
```
- Ce deuxième namespace isole la classe du flux RSS.
- Le nom complet de cette classe devient `ExternalRss\Podcast`.
- Même si le nom court est identique (`Podcast`), PHP sait qu'elles sont différentes.

### Étape 3 : Importer et renommer avec `use` et `as` (Lignes 42-45)
```php
use App\Models\Podcast as InternalPodcast;
use ExternalRss\Podcast as RemotePodcast;
```
- Le mot-clé `use` importe la classe dans notre script courant.
- Le mot-clé `as` crée un alias (un surnom).
- `InternalPodcast` désigne notre modèle local.
- `RemotePodcast` désigne le podcast distant.

### Étape 4 : Instancier les objets sans ambiguïté (Lignes 50-58)
```php
$local = new InternalPodcast(101, "Découverte de PHP", "Équipe Solicode");
$remote = new RemotePodcast("Flux Tech Radio", "https://example.com/audio/tech-101.mp3");
```
- PHP appelle chaque classe selon son alias.
- Aucune collision de nom n'a lieu.
- Le code reste très lisible.

## 5. Commande pour exécuter l'exemple

Ouvrez un terminal dans le dossier du tutoriel :
```bash
cd "lab-php/02-namespaces"
php example.php
```

## 6. Résultat attendu dans la console

```text
=== Démonstration des Namespaces en PHP ===

[1] Application locale :
    Podcast interne #101 : 'Découverte de PHP' par Équipe Solicode

[2] Librairie externe RSS :
    Podcast distant (Flux Tech Radio) -> URL : https://example.com/audio/tech-101.mp3

[OK] Les deux classes 'Podcast' coexistent sans erreur !
```

## 7. Lien avec l'architecture du projet

Dans les applications modernes et les projets Laravel :
- Le standard **PSR-4** relie les namespaces aux dossiers réels du disque.
- Par exemple, `App\Models\Podcast` se trouve dans `app/Models/Podcast.php`.
- Les contrôleurs se trouvent dans `App\Http\Controllers`.
- Cela permet à Composer de charger automatiquement les classes sans faire de `require`.

## 8. Limite et exercice d'approfondissement

- **Limite actuelle :** Les classes sont écrites dans un seul fichier avec la syntaxe par accolades pour faciliter la démo.
- **Exercice suggéré :** Séparer chaque classe dans son propre fichier physique et utiliser un `require_once` pour tester l'inclusion.

