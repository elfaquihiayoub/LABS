# LSP : respecter le contrat parent

## Objectif

Une classe enfant doit pouvoir remplacer sa classe parent.
Elle doit garder les règles attendues par le code qui l'utilise.

## Exemple du catalogue

`AudioEpisode` définit les informations et la lecture d'un épisode.
`LocalEpisode` et `ImportedEpisode` sont deux types d'épisodes.
Le lecteur `playEpisode` accepte les deux sans connaître leur type exact.

Les deux classes gardent les mêmes règles : un titre, une durée positive et une URL valide.

## Test

```bash
php -d xdebug.mode=off 03-lsp/example.php
```

Trois lignes `[OK]` confirment que le lecteur et les deux types respectent le contrat.

## Exercice

Ajoutez un épisode venant d'un autre service.
Vérifiez qu'il fonctionne avec `playEpisode`.
