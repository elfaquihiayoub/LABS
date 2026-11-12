---
marp: true
theme: default
paginate: true
size: 16:9
---

<!-- _class: title -->

# LAB-POO : APPROFONDIR LA POO EN PHP

## Des classes claires pour un annuaire de podcasts

**Étudiant :** El Faquihi Ayoub  
**Encadrant :** ES-SARRAJ Fouad

---

# PLAN

1. Introduction et stack technique
2. Définitions
3. Problème
4. Solution et démonstrations

---

# 1. INTRODUCTION ET STACK TECHNIQUE

- **Projet de référence :** Podcast Directory Management
- **Langage :** PHP en ligne de commande
- **Prérequis :** PHP 8.2 ou plus
- **But :** comprendre six notions de POO
- Les exemples sont autonomes.
- Ils ne sont pas intégrés au projet.

---

# 2. DÉFINITIONS : CLASSE ABSTRAITE ET INTERFACE

## Classe abstraite

- Elle donne un modèle à des classes enfants.
- Elle peut imposer une méthode.
- Exemple : `AudioContent` impose `getTypeLabel()`.

## Interface

- Elle définit un contrat de méthodes.
- Une classe peut appliquer ce contrat.
- Exemple : `Publishable` demande `publish()` et `isPublished()`.

---

# 2. DÉFINITIONS : HÉRITAGE ET POLYMORPHISME

## Héritage

- Une classe enfant réutilise une classe parent.
- Exemple : `Podcast extends Media`.
- L'enfant reprend le titre et la durée.

## Polymorphisme

- Le même appel peut avoir plusieurs résultats.
- Exemple : `displayLine()` affiche un podcast ou un épisode.

---

# 2. DÉFINITIONS : ENCAPSULATION ET STATIQUE

## Encapsulation

- `private` protège une propriété.
- Des méthodes contrôlent sa lecture et sa modification.
- Exemple : vérifier le titre du podcast.

## Éléments statiques

- Ils appartiennent à la classe.
- Les objets partagent une propriété statique.
- Exemple : compter les podcasts créés.

---

# 3. PROBLÈME

- Les notions de POO ne sont pas encore étudiées dans les tutoriels.
- Le lab doit montrer leur rôle dans un contexte technique.
- **Problème précis rencontré dans le projet :** à compléter par l'apprenant.

---

# 4. SOLUTION : DÉMARRAGE RAPIDE

Vérifier PHP :

```powershell
php -v
```

Tester un Hello World :

```php
<?php
echo "Hello World !" . PHP_EOL;
```

Les exemples du lab ne demandent ni serveur web ni base de données.

---

# 4. SOLUTION : EXEMPLES PRATIQUES

| Notion | Exemple de l'annuaire |
|---|---|
| Classe abstraite | Modèle de contenu audio |
| Interface | Contrat de publication |
| Héritage | Podcast enfant d'un média |
| Polymorphisme | Affichage commun du catalogue |
| Encapsulation | Contrôle du titre et des écoutes |
| Statique | Compteur partagé d'objets créés |

Chaque exemple a un script PHP et un tutoriel.

---

# 4. SOLUTION : EXÉCUTER UN EXEMPLE

Depuis la racine du dépôt :

```powershell
php lab-poo\01-classe-abstraite\example.php
```

- Lire le tutoriel du dossier.
- Lancer le script.
- Comparer la sortie avec le résultat attendu.
- Répéter pour les six notions.
