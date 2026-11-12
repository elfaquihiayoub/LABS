# Tutoriel : polymorphisme

## Objectif

Appeler la même méthode sur plusieurs types d'objets.

## Fichiers et commande

Le code est dans `lab-poo\04-polymorphisme\example.php`.
Depuis la racine du dépôt, lancez :

```powershell
php lab-poo\04-polymorphisme\example.php
```

## Lecture du code

1. `CatalogEntry` déclare la méthode commune `displayLine()`.
2. `Podcast` et `Episode` respectent ce contrat, mais chacun écrit son propre résultat.
3. `$entries` contient les deux objets différents.
4. La boucle appelle `displayLine()` sans tester le type de chaque objet.
5. PHP exécute la méthode de la classe réelle de chaque objet. C'est le polymorphisme.

## Résultat attendu

```text
Podcast : PHP et les objets
Épisode 2 : Les interfaces
```

## Lien avec le projet

Une page de catalogue peut afficher plusieurs types d'éléments avec un seul appel de méthode. Cet exemple est autonome.

## Limite et exercice

Chaque classe doit garder le même nom de méthode. Ajoutez une classe `Season` qui respecte `CatalogEntry`.
