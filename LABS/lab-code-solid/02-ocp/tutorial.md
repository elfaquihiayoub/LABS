# OCP : étendre sans modifier

## Objectif

Le code doit accepter de nouvelles fonctions.
On évite de modifier le code déjà testé pour chaque ajout.

## Exemple du catalogue

`PodcastSearch` cherche les podcasts.
Il utilise des règles qui suivent `PodcastFilter`.
`CategoryFilter` et `TitleFilter` sont deux règles séparées.

On peut ajouter un autre filtre sans réécrire `PodcastSearch`.

## Test

```bash
php -d xdebug.mode=off 02-ocp/example.php
```

Les deux lignes `[OK]` confirment que les filtres se combinent et trouvent le podcast attendu.

## Exercice

Ajoutez un filtre par mot dans la description.
Laissez `PodcastSearch` inchangé.
