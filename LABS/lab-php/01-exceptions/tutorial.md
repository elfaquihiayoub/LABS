# Tutoriel : Gestion des erreurs et des exceptions

## 1. Objectif du tutoriel

Ce tutoriel montre comment détecter et traiter une erreur en PHP.
Le code empêche la création d'un podcast invalide dans l'application.

## 2. Contexte dans le projet technique

Dans le projet **Podcast Directory Management**, un utilisateur ajoute des podcasts.
Un podcast doit avoir un titre non vide.
Un podcast doit aussi avoir une durée positive.
Sans exception, le programme plante ou enregistre des données fausses.
Avec une exception, le programme intercepte l'erreur et affiche un message clair.

## 3. Fichiers concernés

- Fichier exemple : `example.php`
- Emplacement : `lab-php/01-exceptions/example.php`

## 4. Explication pas à pas du code

Voici l'analyse du fichier `example.php` dans l'ordre d'exécution :

### Étape 1 : Créer une exception personnalisée (Lignes 9-10)
```php
class InvalidPodcastException extends Exception {}
```
- Le mot-clé `class` crée un nouveau type d'exception.
- `extends Exception` hérite de la classe de base de PHP.
- Cela permet de distinguer nos erreurs des autres erreurs du système.

### Étape 2 : Lancer une exception avec `throw` (Lignes 18-29)
```php
if ($cleanTitle === '') {
    throw new InvalidPodcastException("Le titre du podcast ne peut pas être vide.");
}

if ($durationInSeconds <= 0) {
    throw new InvalidPodcastException("La durée doit être supérieure à 0 seconde.");
}
```
- Le mot-clé `throw` déclenche une exception quand une condition est fausse.
- La création de l'objet s'arrête immédiatement.
- L'erreur contient un message en français simple pour l'utilisateur.

### Étape 3 : Surveiller le code avec `try` (Lignes 43-46)
```php
try {
    $podcast = new Podcast($title, $duration);
    echo "  [OK] " . $podcast->getDetails() . PHP_EOL;
}
```
- Le bloc `try` contient le code qui peut générer une erreur.
- Si tout est correct, le podcast est créé et le message de confirmation s'affiche.

### Étape 4 : Attraper l'erreur avec `catch` (Lignes 47-49)
```php
} catch (InvalidPodcastException $e) {
    echo "  [ERREUR] " . $e->getMessage() . PHP_EOL;
}
```
- Le bloc `catch` intercepte l'exception de type `InvalidPodcastException`.
- Le programme ne plante pas.
- La méthode `$e->getMessage()` donne le texte de l'erreur.

### Étape 5 : Exécuter le bloc de fin avec `finally` (Lignes 49-51)
```php
} finally {
    echo "  [INFO] Fin du traitement pour cette tentative." . PHP_EOL . PHP_EOL;
}
```
- Le bloc `finally` s'exécute toujours, avec ou sans erreur.
- Il sert souvent à fermer un fichier ou nettoyer des ressources.

## 5. Commande pour exécuter l'exemple

Ouvrez un terminal dans le dossier du tutoriel :
```bash
cd "lab-php/01-exceptions"
php example.php
```

## 6. Résultat attendu dans la console

```text
=== Test 1 : Données valides ===
Tentative d'ajout : 'PHP Moderne et Découverte' (1800s)...
  [OK] Podcast : 'PHP Moderne et Découverte' (1800 secondes)
  [INFO] Fin du traitement pour cette tentative.

=== Test 2 : Titre vide ===
Tentative d'ajout : '' (1200s)...
  [ERREUR] Le titre du podcast ne peut pas être vide.
  [INFO] Fin du traitement pour cette tentative.

=== Test 3 : Durée invalide ===
Tentative d'ajout : 'Podcast Tech Rapide' (-45s)...
  [ERREUR] La durée doit être supérieure à 0 seconde.
  [INFO] Fin du traitement pour cette tentative.
```

## 7. Lien avec l'architecture du projet

Dans une architecture MVC ou avec Laravel :
- Les contrôleurs reçoivent les formulaires des utilisateurs.
- Les modèles ou services vérifient les règles métier.
- Les exceptions évitent d'écrire des données corrompues en base de données.

## 8. Limite et exercice d'approfondissement

- **Limite actuelle :** L'exemple affiche l'erreur dans la console sans journaliser l'erreur dans un fichier.
- **Exercice suggéré :** Ajouter une nouvelle règle qui refuse un titre de plus de 100 caractères avec un message adapté.

