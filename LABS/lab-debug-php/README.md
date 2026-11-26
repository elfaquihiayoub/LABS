# lab-debug-php : Déboguer avec PHP

Ce lab apprend à trouver et corriger un bug en PHP.
Il utilise le terminal, VS Code et Xdebug.

- **Étudiant :** El Faquihi Ayoub
- **Encadrant :** ES-SARRAJ Fouad
- **Problème précis de l'étudiant :** À compléter.
- **Solution proposée par l'étudiant :** À compléter.

## Objectifs

À la fin de ce lab, vous pouvez :

- Lire un message d'erreur PHP.
- Vérifier la syntaxe d'un fichier.
- Poser un point d'arrêt dans VS Code.
- Lire la valeur d'une variable.
- Corriger un calcul incorrect.

## Outils

- PHP CLI 8.2 ou une version plus récente.
- Visual Studio Code.
- L'extension **PHP Debug** de VS Code.
- Xdebug 3.

## Démarrage rapide

Ouvrez un terminal à la racine du dépôt.

Vérifiez PHP :

```bash
php -v
```

Vérifiez la syntaxe des exemples :

```bash
php -l LABS/lab-debug-php/01-diagnostic/example.php
php -l LABS/lab-debug-php/01-diagnostic/solution.php
```

Lancez l'exemple avec le bug :

```bash
php -d xdebug.mode=off LABS/lab-debug-php/01-diagnostic/example.php
```

Le résultat est `20.00`. Le résultat attendu est `45.00`.

Lancez ensuite la solution :

```bash
php -d xdebug.mode=off LABS/lab-debug-php/01-diagnostic/solution.php
```

Le résultat corrigé est `45.00`.

## Déboguer avec VS Code et Xdebug

1. Installez l'extension **PHP Debug** dans VS Code.
2. Vérifiez que Xdebug est actif :

   ```bash
   php --ri xdebug
   ```

3. Ouvrez le dossier `LABS/lab-debug-php` dans VS Code.
4. Ouvrez `01-diagnostic/example.php`.
5. Cliquez à gauche de la ligne `$total += $item['price'];`.
   Un point rouge apparaît. C'est un point d'arrêt.
6. Ouvrez la vue **Exécuter et déboguer**.
7. Choisissez **Écouter Xdebug (PHP)** et démarrez.
8. Dans un terminal, lancez le fichier :

   ```bash
   php -d xdebug.mode=debug -d xdebug.start_with_request=yes 01-diagnostic/example.php
   ```

9. Dans VS Code, avancez ligne par ligne.
10. Regardez `item`, `total`, `price` et `quantity`.

Le fichier `.vscode/launch.json` contient la configuration d'écoute.
Xdebug doit pouvoir se connecter au port `9003`.
Si VS Code ne s'arrête pas sur le point d'arrêt, vérifiez que l'écoute est active.

## Fichiers

| Fichier | Rôle |
| --- | --- |
| `presentation.md` | Présenter les notions du lab |
| `01-diagnostic/tutorial.md` | Suivre les étapes de débogage |
| `01-diagnostic/example.php` | Exemple avec un bug volontaire |
| `01-diagnostic/solution.php` | Exemple corrigé |
| `.vscode/launch.json` | Écouter Xdebug dans VS Code |

## À retenir

- Lire le type et le message de l'erreur.
- Vérifier le fichier et la ligne indiqués.
- Observer les valeurs avant de changer le code.
- Ne pas afficher les erreurs aux visiteurs en production.
