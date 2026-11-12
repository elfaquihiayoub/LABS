# Tutoriel : héritage

## Objectif

Réutiliser les données et la méthode d'une classe parent.

## Fichiers et commande

Le code est dans `lab-poo\03-heritage\example.php`.
Depuis la racine du dépôt, lancez :

```powershell
php lab-poo\03-heritage\example.php
```

## Lecture du code

1. `Media` est la classe parent. Son constructeur reçoit un titre et une durée.
2. Les propriétés `protected` sont accessibles dans `Media` et dans ses classes enfants.
3. `getTitle()` est une méthode commune qui retourne le titre.
4. `Podcast extends Media` déclare que `Podcast` hérite de `Media`.
5. `parent::__construct(...)` appelle le constructeur du parent pour initialiser le titre et la durée.
6. `getDescription()` utilise `getTitle()` et ajoute le nom de l'animateur et la durée.
7. Le script crée un podcast et affiche sa description.

## Résultat attendu

```text
PHP au quotidien - Nadia - 900 secondes
```

## Lien avec le projet

Des classes comme `Podcast` ou `Episode` peuvent partager des données de média. L'héritage évite de réécrire ces éléments. Cet exemple ne modifie pas le projet.

## Limite et exercice

Une hiérarchie trop profonde devient difficile à suivre. Ajoutez une classe `Episode` qui hérite de `Media`.
