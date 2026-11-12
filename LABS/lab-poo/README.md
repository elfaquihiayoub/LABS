# lab-poo : Approfondir la POO en PHP

Ce lab présente six notions de la programmation orientée objet en PHP.
Chaque notion a un exemple simple à lancer dans le terminal.

- **Projet technique de référence :** Podcast Directory Management
- **Étudiant :** El Faquihi Ayoub
- **Encadrant :** ES-SARRAJ Fouad
- **Périmètre :** exemples autonomes inspirés du projet. Ils ne sont pas intégrés à son code.

## 1. Besoin du projet technique

Les notions de POO aident à organiser les classes d'un annuaire de podcasts.
Ce lab montre comment créer des modèles, partager des règles et protéger les données.

Le problème précis rencontré dans le projet est à compléter par l'apprenant.
Les exemples ci-dessous sont des démonstrations. Ils ne décrivent pas une panne réelle.

## 2. Notions et techniques à apprendre

| Notion | Rôle | Exemple dans l'annuaire |
|---|---|---|
| Classe abstraite | Donner un modèle commun à des classes enfants | Un contenu audio fournit une base à un podcast |
| Interface | Définir les méthodes qu'une classe doit fournir | Un podcast peut suivre le contrat de publication |
| Héritage | Réutiliser les méthodes et propriétés d'une classe parent | Un podcast reprend les données communes d'un média |
| Polymorphisme | Appeler la même méthode sur des objets différents | Chaque élément du catalogue prépare sa propre ligne |
| Encapsulation | Protéger les données et contrôler leur modification | Le titre et le nombre d'écoutes sont validés |
| Éléments statiques | Partager une méthode ou une propriété entre les objets d'une classe | Compter les podcasts créés |

## 3. Exemples du lab

Depuis la racine du dépôt, lancez un exemple avec `php` :

| Dossier | Exemple | Tutoriel | Commande |
|---|---|---|---|
| `01-classe-abstraite` | [example.php](01-classe-abstraite/example.php) | [tutorial.md](01-classe-abstraite/tutorial.md) | `php lab-poo\01-classe-abstraite\example.php` |
| `02-interface` | [example.php](02-interface/example.php) | [tutorial.md](02-interface/tutorial.md) | `php lab-poo\02-interface\example.php` |
| `03-heritage` | [example.php](03-heritage/example.php) | [tutorial.md](03-heritage/tutorial.md) | `php lab-poo\03-heritage\example.php` |
| `04-polymorphisme` | [example.php](04-polymorphisme/example.php) | [tutorial.md](04-polymorphisme/tutorial.md) | `php lab-poo\04-polymorphisme\example.php` |
| `05-encapsulation` | [example.php](05-encapsulation/example.php) | [tutorial.md](05-encapsulation/tutorial.md) | `php lab-poo\05-encapsulation\example.php` |
| `06-statique` | [example.php](06-statique/example.php) | [tutorial.md](06-statique/tutorial.md) | `php lab-poo\06-statique\example.php` |

## Démarrage rapide

Prérequis : PHP CLI 8.2 ou une version plus récente.
Ces exemples n'ont besoin ni de serveur web ni de base de données.

Vérifiez PHP :

```powershell
php -v
```

Testez PHP avec un Hello World :

```powershell
php -r "echo 'Hello World : PHP fonctionne !' . PHP_EOL;"
```

Exécutez ensuite les six exemples avec les commandes du tableau.
Pour vérifier leur syntaxe, lancez `php -l` sur chaque fichier `example.php`.

## Réalisation attendue

Pour chaque exemple, l'apprenant explique le rôle de la notion, lance le script et compare le résultat affiché.
Les données sont simulées. L'exercice suivant consiste à adapter une classe à une vraie fonctionnalité du projet.
