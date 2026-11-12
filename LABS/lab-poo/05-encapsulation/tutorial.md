# Tutoriel : encapsulation

## Objectif

Protéger les données d'un podcast et contrôler leur modification.

## Fichiers et commande

Le code est dans `lab-poo\05-encapsulation\example.php`.
Depuis la racine du dépôt, lancez :

```powershell
php lab-poo\05-encapsulation\example.php
```

## Lecture du code

1. `private` rend `$title` et `$downloadCount` accessibles seulement dans la classe.
2. Le constructeur appelle `setTitle()` pour vérifier le titre dès la création.
3. `setTitle()` retire les espaces au début et à la fin. Il lance une exception si le titre est vide.
4. `getTitle()` donne le titre sans permettre de modifier directement la propriété.
5. `addDownload()` augmente le compteur. Le code appelant ne peut pas lui donner une valeur négative.
6. Les méthodes `get...()` affichent les valeurs contrôlées.

## Résultat attendu

```text
Titre : PHP et les objets
Téléchargements : 2
```

## Lien avec le projet

Un modèle peut protéger un titre ou un compteur contre des valeurs invalides. Cet exemple est une démonstration et ne valide pas les données d'une base.

## Limite et exercice

Le compteur n'est pas sauvegardé après l'arrêt du script. Ajoutez une méthode qui refuse un titre de plus de 100 caractères.
