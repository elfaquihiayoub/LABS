# Résultats du lab-code-solid

## Environnement de vérification

- PHP CLI 8.5.10.
- Exécution locale, sans base de données ni paquet externe.

## Tests

Les cinq scripts ont passé `php -l`.
Les cinq scripts ont été exécutés avec PHP 8.5.10.
Les douze vérifications affichent `[OK]`.

| Principe | Fichier exécuté | Vérifications réussies |
| --- | --- | --- |
| SRP | `01-srp/example.php` | 3 : formulaire valide, objet podcast et erreurs du formulaire. |
| OCP | `02-ocp/example.php` | 2 : catégorie et titre filtrés, podcast attendu. |
| LSP | `03-lsp/example.php` | 3 : liste partagée, format interview et format solo. |
| ISP | `04-isp/example.php` | 2 : lecture sur la page publique et ajout côté admin. |
| DIP | `05-dip/example.php` | 2 : ajout par le service et podcast présent dans le dépôt. |

## Commandes de vérification

Depuis la racine du dépôt :

```bash
php -l LABS/lab-code-solid/01-srp/example.php
php -l LABS/lab-code-solid/02-ocp/example.php
php -l LABS/lab-code-solid/03-lsp/example.php
php -l LABS/lab-code-solid/04-isp/example.php
php -l LABS/lab-code-solid/05-dip/example.php

php -d xdebug.mode=off LABS/lab-code-solid/01-srp/example.php
php -d xdebug.mode=off LABS/lab-code-solid/02-ocp/example.php
php -d xdebug.mode=off LABS/lab-code-solid/03-lsp/example.php
php -d xdebug.mode=off LABS/lab-code-solid/04-isp/example.php
php -d xdebug.mode=off LABS/lab-code-solid/05-dip/example.php
```
