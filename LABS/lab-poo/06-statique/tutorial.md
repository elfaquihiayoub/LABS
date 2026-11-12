# Tutoriel : méthodes et propriétés statiques

## Objectif

Partager une donnée liée à la classe plutôt qu'à un seul objet.

## Fichiers et commande

Le code est dans `lab-poo\06-statique\example.php`.
Depuis la racine du dépôt, lancez :

```powershell
php lab-poo\06-statique\example.php
```

## Lecture du code

1. `private static int $createdCount` est une propriété de la classe. Les objets partagent ce compteur.
2. Le constructeur ajoute un au compteur avec `self::$createdCount`.
3. `getTitle()` est une méthode normale. Elle lit le titre d'un objet.
4. `getCreatedCount()` est une méthode statique. Elle lit la propriété partagée.
5. `Podcast::getCreatedCount()` appelle la méthode avec le nom de la classe, sans créer un autre podcast.

## Résultat attendu

```text
PHP et les objets
Découvrir les interfaces
Podcasts créés : 2
```

## Lien avec le projet

Un compteur en mémoire peut servir à une démonstration ou à des statistiques simples. Il ne remplace pas un stockage durable dans le projet.

## Limite et exercice

Le compteur revient à zéro à chaque exécution. Expliquez pourquoi une base de données serait nécessaire pour garder ce total.
