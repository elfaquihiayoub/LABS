# ISP : séparer lecture et écriture

## Objectif

Une classe ne doit pas recevoir des méthodes dont elle n'a pas besoin.
On utilise de petites interfaces avec des rôles précis.

## Dans le catalogue de podcasts

- `PodcastReader` permet de lire la liste.
- `PodcastWriter` permet d'ajouter un podcast.
- La page publique utilise seulement `PodcastReader`.
- La partie admin utilise la lecture et l'écriture.

La page publique ne peut donc pas ajouter de podcast par erreur.

## Lancer le test

Depuis la racine du dépôt :

```bash
php -d xdebug.mode=off LABS/lab-code-solid/04-isp/example.php
```

Le premier test lit un titre sur la page publique.
Le second vérifie que la partie admin peut ajouter un podcast.
Chaque résultat doit afficher `[OK]`.

## Exercice

Ajoutez une interface `PodcastDeleter`.
Gardez-la séparée de `PodcastReader`.
