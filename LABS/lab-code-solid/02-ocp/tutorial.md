# OCP : ajouter une règle de recherche

## Objectif

On doit pouvoir ajouter une fonction sans réécrire le code déjà testé.

## Dans le catalogue de podcasts

La page du catalogue peut chercher par catégorie et par titre.

- `PodcastDirectory` parcourt la liste.
- `PodcastFilter` décrit une règle de recherche.
- `CategoryFilter` cherche une catégorie.
- `TitleFilter` cherche un mot dans le titre.

La classe `PodcastDirectory` utilise chaque filtre de la même façon.
Pour ajouter un filtre, on crée une nouvelle classe qui suit `PodcastFilter`.
La classe `PodcastDirectory` reste inchangée.

## Lancer le test

Depuis la racine du dépôt :

```bash
php -d xdebug.mode=off LABS/lab-code-solid/02-ocp/example.php
```

La recherche demande la catégorie `Développement` et le mot `Laravel`.
Le résultat contient seulement le podcast `PHP et Laravel`.
Chaque résultat de test doit afficher `[OK]`.

## Exercice

Ajoutez un filtre par nom d'animateur.
Faites-le suivre `PodcastFilter`.
Ne changez pas `PodcastDirectory`.
