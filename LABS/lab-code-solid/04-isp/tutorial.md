# ISP : créer des interfaces simples

## Objectif

Une classe ne doit pas dépendre de méthodes inutiles.
On peut séparer une grande interface en interfaces plus petites.

## Exemple du catalogue

- `PodcastReader` permet de lire les podcasts.
- `PodcastWriter` permet d'en ajouter.
- `PodcastList` utilise seulement `PodcastReader`.

Un catalogue public peut donc afficher les podcasts sans offrir de fonction d'écriture.

## Test

```bash
php -d xdebug.mode=off 04-isp/example.php
```

Les lignes `[OK]` vérifient la lecture seule et l'ajout dans un catalogue éditable.

## Exercice

Ajoutez une interface pour supprimer un podcast.
Ne l'ajoutez pas au catalogue qui permet seulement la lecture.
