# DIP : enregistrer un podcast via une interface

## Objectif

Le service de l'application dépend d'une interface.
Il ne dépend pas d'une classe de stockage précise.

## Dans le catalogue de podcasts

- `AddPodcastToDirectory` ajoute un podcast.
- Il utilise le contrat `PodcastRepository`.
- `InMemoryPodcastRepository` garde les données en mémoire pour le test.

Un autre dépôt pourrait enregistrer les podcasts dans une base de données.
Le service pourrait garder le même code.

## Lancer le test

Depuis la racine du dépôt :

```bash
php -d xdebug.mode=off LABS/lab-code-solid/05-dip/example.php
```

Le test ajoute `PHP pour débuter` et vérifie que le dépôt le contient.
Chaque résultat doit afficher `[OK]`.

## Exercice

Créez un dépôt qui enregistre les podcasts dans une base de données.
Faites-le respecter `PodcastRepository`.
N'ajoutez pas de code de base de données dans `AddPodcastToDirectory`.
