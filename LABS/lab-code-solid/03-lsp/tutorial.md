# LSP : utiliser les types de podcasts

## Objectif

Une classe enfant doit respecter les règles de sa classe parent.
Le code qui accepte le parent doit aussi accepter ses classes enfants.

## Dans le catalogue de podcasts

Le catalogue contient des podcasts interview et des podcasts solo.

- `Podcast` définit le titre, l'animateur et la ligne de catalogue.
- `InterviewPodcast` indique le format `Interview`.
- `SoloPodcast` indique le format `Solo`.
- `showPodcast()` accepte un objet `Podcast`.

La fonction de catalogue n'a pas besoin de connaître la classe exacte.
Les deux formats gardent les informations attendues.

## Lancer le test

Depuis la racine du dépôt :

```bash
php -d xdebug.mode=off LABS/lab-code-solid/03-lsp/example.php
```

Le test vérifie que la fonction affiche les deux formats.
Chaque résultat doit afficher `[OK]`.

## Exercice

Ajoutez la classe `NewsPodcast`.
Faites-la hériter de `Podcast`.
Vérifiez qu'elle fonctionne avec `showPodcast()`.
