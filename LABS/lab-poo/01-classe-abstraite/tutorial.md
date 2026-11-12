# Tutoriel : classe abstraite

## Objectif

Créer un modèle commun pour les contenus audio de l'annuaire.

## Fichiers et commande

Le code est dans `lab-poo\01-classe-abstraite\example.php`.
Depuis la racine du dépôt, lancez :

```powershell
php lab-poo\01-classe-abstraite\example.php
```

## Lecture du code

1. `abstract class AudioContent` crée une classe modèle. On ne peut pas créer directement un objet de cette classe.
2. Le constructeur garde le titre dans `$title`. Le mot `protected` autorise les classes enfants à lire cette propriété.
3. `abstract public function getTypeLabel()` impose une méthode aux classes enfants. La classe abstraite ne donne pas son résultat.
4. `getCardLabel()` réutilise le titre et appelle cette méthode imposée.
5. `Podcast extends AudioContent` crée un enfant. Il donne son résultat pour `getTypeLabel()`.
6. La dernière ligne crée un podcast et affiche son libellé.

## Résultat attendu

```text
Podcast : PHP et les objets
```

## Lien avec le projet

Un annuaire peut avoir plusieurs sortes de contenus audio. Une classe abstraite peut regrouper les règles communes. Cet exemple est autonome et n'est pas branché à l'application.

## Limite et exercice

L'exemple ne gère qu'un titre. Ajoutez une classe `Episode` qui hérite aussi de `AudioContent`.
