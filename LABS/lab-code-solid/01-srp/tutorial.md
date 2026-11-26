# SRP : une responsabilité par classe

## Objectif

Une classe doit avoir un seul rôle important.
Ce rôle peut changer pour une seule raison.

## Exemple du catalogue

- `Podcast` contient le titre, le nom de l'animateur et la durée.
- `PodcastValidator` vérifie les données du formulaire.

La validation peut changer sans changer la classe qui garde les données.

## Test

```bash
php -d xdebug.mode=off 01-srp/example.php
```

Trois lignes `[OK]` indiquent que les données valides, les données invalides et le podcast ont été vérifiés.

## Exercice

Ajoutez une règle qui limite la durée à trois heures.
Ajoutez un test pour cette règle.
