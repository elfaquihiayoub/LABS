# Tutoriel : interface

## Objectif

Définir les actions attendues d'un objet qui peut être publié.

## Fichiers et commande

Le code est dans `lab-poo\02-interface\example.php`.
Depuis la racine du dépôt, lancez :

```powershell
php lab-poo\02-interface\example.php
```

## Lecture du code

1. `interface Publishable` définit un contrat. Elle annonce deux méthodes sans écrire leur code.
2. `publish(): void` indique qu'une classe doit pouvoir publier un élément.
3. `isPublished(): bool` indique qu'elle doit pouvoir donner l'état de publication.
4. `Podcast implements Publishable` accepte ce contrat. PHP demande alors à cette classe d'écrire les deux méthodes.
5. `$published` garde l'état courant. `publish()` le passe à `true`.
6. Le script affiche l'état avant et après l'appel à `publish()`.

## Résultat attendu

```text
Avant : brouillon
Après : publié
```

## Lien avec le projet

Un service de publication pourrait utiliser le même contrat pour plusieurs éléments du catalogue. Cet exemple est une simulation autonome.

## Limite et exercice

La publication ne vérifie aucune règle. Ajoutez une condition qui refuse de publier un titre vide.
