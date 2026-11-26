# lab-code-solid : Découvrir les principes SOLID

Ce lab présente cinq règles pour mieux organiser le code.
Les exemples utilisent un catalogue de podcasts.

- **Étudiant :** El Faquihi Ayoub
- **Encadrant :** ES-SARRAJ Fouad
- **Projet technique de référence :** Podcast Directory Management
- **Problème précis de l'étudiant :** À compléter.
- **Solution proposée par l'étudiant :** À compléter.

## Objectifs

À la fin de ce lab, vous pouvez :

- Expliquer les cinq principes SOLID.
- Lire un exemple PHP pour chaque principe.
- Lancer les exemples et vérifier les résultats.

## Prérequis

- PHP 8.2 ou une version plus récente.
- Un terminal.

Vérifiez PHP :

```bash
php -v
```

## Lancer les exemples

Depuis la racine du dépôt, lancez chaque exemple :

```bash
php -d xdebug.mode=off LABS/lab-code-solid/01-srp/example.php
php -d xdebug.mode=off LABS/lab-code-solid/02-ocp/example.php
php -d xdebug.mode=off LABS/lab-code-solid/03-lsp/example.php
php -d xdebug.mode=off LABS/lab-code-solid/04-isp/example.php
php -d xdebug.mode=off LABS/lab-code-solid/05-dip/example.php
```

Chaque exemple contient des vérifications. Le texte `[OK]` indique que le test a réussi.
Un test en échec arrête le programme avec une erreur.

## Les cinq principes

| Principe | Objectif | Exemple du catalogue |
| --- | --- | --- |
| **SRP** — Single Responsibility Principle | Une classe a une seule responsabilité. | Séparer les données du podcast et la validation du formulaire d'ajout. |
| **OCP** — Open/Closed Principle | Ajouter une règle sans modifier le code déjà testé. | Chercher les podcasts avec des filtres interchangeables. |
| **LSP** — Liskov Substitution Principle | Une classe enfant respecte le contrat de sa classe parent. | Afficher un podcast interview ou solo dans la même liste. |
| **ISP** — Interface Segregation Principle | Une classe utilise seulement les méthodes dont elle a besoin. | Donner la lecture à la page publique et l'écriture à l'admin. |
| **DIP** — Dependency Inversion Principle | Le service dépend d'une interface, pas d'une classe précise. | Ajouter au catalogue avec un dépôt interchangeable. |

## Résultats

Les résultats et les contrôles exécutés sont dans [`resultats.md`](resultats.md).
Chaque dossier contient le code et un petit tutoriel.
