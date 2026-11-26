# SRP : séparer les responsabilités

## Objectif

Une classe doit avoir un seul rôle.
Chaque classe devient alors plus simple à changer.

## Dans le catalogue de podcasts

Quand l'administrateur ajoute un podcast :

- `Podcast` garde son titre, son animateur et sa durée.
- `PodcastValidator` vérifie les informations du formulaire.

La classe `Podcast` ne vérifie pas le formulaire.
La classe `PodcastValidator` ne garde pas les podcasts.

## Lancer le test

Depuis la racine du dépôt :

```bash
php -d xdebug.mode=off LABS/lab-code-solid/01-srp/example.php
```

Le programme vérifie :

1. Un formulaire valide ne retourne pas d'erreur.
2. L'objet garde le titre du podcast.
3. Un formulaire invalide retourne trois erreurs.

Chaque résultat doit afficher `[OK]`.

## Exercice

Ajoutez une règle : la durée ne peut pas dépasser 180 minutes.
Ajoutez le test de cette règle dans `example.php`.
