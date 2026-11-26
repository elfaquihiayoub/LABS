# DIP : dépendre d'une interface

## Objectif

Le service principal ne doit pas choisir une classe de stockage précise.
Il utilise une interface que plusieurs stockages peuvent respecter.

## Exemple du catalogue

`PodcastCatalogService` dépend de `PodcastRepository`.
`InMemoryPodcastRepository` est un dépôt de test en mémoire.
Un autre dépôt pourrait utiliser une base de données sans changer le service.

## Test

```bash
php -d xdebug.mode=off 05-dip/example.php
```

Deux lignes `[OK]` confirment que le service enregistre et relit un podcast.

## Exercice

Écrivez un autre dépôt qui lit les podcasts depuis un fichier.
Faites-le respecter `PodcastRepository`.
