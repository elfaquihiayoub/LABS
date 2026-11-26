# Tutoriel : Trouver un bug avec PHP

## Objectif

Le programme calcule le prix d'une commande.
Le résultat affiché est faux.
Le but est de trouver pourquoi.

## 1. Vérifier la syntaxe

Dans un terminal, lancez :

```bash
php -l 01-diagnostic/example.php
```

Le message `No syntax errors detected` signifie que la syntaxe est valide.
Cela ne garantit pas que le calcul est correct.

## 2. Reproduire le problème

Lancez :

```bash
php -d xdebug.mode=off 01-diagnostic/example.php
```

Le programme affiche :

```text
Total de la commande : 20.00
```

Calculez le résultat à la main :

- Deux carnets coûtent `15 × 2 = 30`.
- Trois stylos coûtent `5 × 3 = 15`.
- Le total attendu est `45`.

Le bug est donc dans le calcul du total.

## 3. Observer le programme dans VS Code

Ouvrez le dossier `lab-debug-php` dans VS Code.
Installez l'extension **PHP Debug**.
Xdebug 3 doit être installé et actif.

Ouvrez `01-diagnostic/example.php`.
Ajoutez un point d'arrêt sur la ligne du calcul :

```php
$total += $item['price'];
```

Démarrez **Écouter Xdebug (PHP)** dans la vue **Exécuter et déboguer**.
Puis lancez le programme dans le terminal :

```bash
php -d xdebug.mode=debug -d xdebug.start_with_request=yes 01-diagnostic/example.php
```

Quand le programme s'arrête, regardez les variables :

- `item['price']` contient le prix d'un article.
- `item['quantity']` contient le nombre d'articles.
- `total` doit contenir le prix de tous les articles déjà vus.

Avancez avec **Step Over** pour voir les changements.

## 4. Corriger le calcul

Le programme ajoute le prix une seule fois.
Il doit multiplier le prix par la quantité.

La ligne correcte est :

```php
$total += $item['price'] * $item['quantity'];
```

Comparez avec `01-diagnostic/solution.php`.

## 5. Vérifier la correction

Lancez la solution :

```bash
php -d xdebug.mode=off 01-diagnostic/solution.php
```

Résultat attendu :

```text
Total de la commande : 45.00
```

## Méthode à retenir

1. Reproduire le problème.
2. Lire le résultat et le comparer au résultat attendu.
3. Vérifier la syntaxe avec `php -l`.
4. Poser un point d'arrêt près du calcul.
5. Observer les variables.
6. Corriger une seule cause à la fois.
7. Relancer le programme.
