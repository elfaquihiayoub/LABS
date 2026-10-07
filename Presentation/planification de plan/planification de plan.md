---

marp: true
theme: gaia
paginate: true
--------------

# Projet de fin d'études

### Présentation du projet

**Équipe :** …
**Encadrant :** …
**Année :** 2026–2027

---

# Introduction générale

### Le projet en quelques mots

* Contexte
* Problématique
* Solution proposée
* Méthodologie
* Architecture
* Réalisation

---

# Contexte du projet

### Environnement

* Besoin d'une solution numérique
* Processus actuellement complexes
* Gestion de plusieurs acteurs
* Nécessité d'une plateforme centralisée

---

# Défis opérationnels

### Principales difficultés

* Gestion des ressources
* Gestion des clients
* Suivi des commandes
* Communication en temps réel
* Gestion des paiements

---

# Objectifs de la solution

### Objectifs principaux

* Centraliser les opérations
* Automatiser les tâches
* Améliorer l'expérience client
* Faciliter le travail du personnel
* Préparer une solution évolutive

---

# Définition du problème

### Problématique

**Comment concevoir une plateforme capable de centraliser les opérations, simplifier la gestion et améliorer l'expérience des différents acteurs ?**

---

# Scrum

### Méthodologie agile

* Travail en sprints
* Priorisation des fonctionnalités
* Livraisons progressives
* Feedback continu
* Adaptation aux besoins

![bg right:45%](figures/scrum.png)

---

# Design Thinking

### Approche centrée utilisateur

**Empathie → Définition → Idéation → Prototype → Test**

* Comprendre les utilisateurs
* Identifier leurs besoins
* Concevoir une solution adaptée

![bg right:45%](figures/design-thinking.png)

---

# 2TUP

### Processus de développement

* Branche fonctionnelle
* Branche technique
* Conception progressive
* Intégration des deux branches

![bg right:45%](figures/2tup.png)

---

# Gestion des tâches

### Organisation du projet

* Découpage des fonctionnalités
* Priorisation
* Attribution des tâches
* Suivi de l'avancement
* Respect des délais

![bg right:50%](figures/gantt.png)

---

# Empathie

### Comprendre les utilisateurs

* Identifier les besoins
* Comprendre les difficultés
* Observer les comportements
* Recueillir les attentes

---

# Profil : le client

### Besoins principaux

* Simplicité
* Rapidité
* Disponibilité
* Transparence
* Expérience fluide

---

# Profil : le personnel

### Besoins principaux

* Organisation
* Gestion efficace
* Informations en temps réel
* Réduction des tâches répétitives
* Outils centralisés

---

# Synthèse de la vision

### Une solution évolutive

**Vision :**

> Une plateforme scalable capable d'évoluer avec les besoins du projet.

* Architecture évolutive
* Fonctionnalités modulaires
* Expérience utilisateur adaptée
* Possibilité d'intégrer de nouveaux services

![bg right:45%](figures/empathy-map.png)

---

# Définition du problème

### Problème identifié

**Les utilisateurs ont besoin d'une solution centralisée, simple et rapide pour gérer leurs opérations.**

### Enjeu

Transformer les besoins identifiés en fonctionnalités concrètes.

---

# Idéation

### De l'idée à la solution

**Structure technique**

* Application web
* API
* Base de données
* Architecture modulaire

**Bénéfices business**

* Gain de temps
* Réduction des erreurs
* Meilleure expérience
* Scalabilité

---

# Les acteurs du système

### Acteurs principaux

* **Client**
* **Personnel / Staff**
* **Administrateur**
* **Système de paiement**
* **Assistant IA**

---

# Détail des cas d'utilisation

### Fonctionnalités principales

* Authentification
* Gestion des ressources
* Gestion des clients
* Gestion des commandes
* Paiement
* Assistance IA
* Administration

---

# Cas d'utilisation global

### Vue globale du système

![bg contain](figures/use-case-global.png)

---

# Stratégie de développement

### Développement par sprints

**Sprint 1**
Fondations + ressources

**Sprint 2**
Clients + commandes

**Sprint 3**
IA + paiements

---

# Sprint 1

### Fondations et gestion des ressources

* Authentification
* Gestion des utilisateurs
* Gestion des ressources
* Administration de base

![bg right:45%](figures/sprint1.png)

---

# Sprint 2

### Système client et commandes en temps réel

* Gestion du profil client
* Création des commandes
* Suivi en temps réel
* Notifications
* Gestion du statut

![bg right:45%](figures/sprint2.png)

---

# Sprint 3

### Assistant IA et paiements

* Assistant IA
* Assistance utilisateur
* Gestion des paiements
* Confirmation des transactions
* Sécurisation

![bg right:45%](figures/sprint3.png)

---

# Besoins techniques

### Contraintes principales

* Performance
* Sécurité
* Disponibilité
* Scalabilité
* Maintenabilité

---

# Analyse technique

### Choix techniques

* Architecture modulaire
* API REST
* Base de données
* Authentification sécurisée
* Communication client / serveur

---

# Conception générale

### Organisation du système

**Frontend**

Interface utilisateur

↓

**Backend**

Logique métier + API

↓

**Base de données**

Stockage des informations

---

# Architecture logicielle

### Architectures utilisées

* **MVC**
* **Architecture N-tiers**
* **Architecture globale**

![bg right:30%](figures/mvc.png)

![bg right:30%](figures/n-tiers.png)

![bg right:30%](figures/architecture-globale.png)

---

# Diagramme de classe

### Modélisation du système

* Entités principales
* Attributs
* Méthodes
* Relations
* Cardinalités

![bg contain](figures/class-diagram.png)

---

# Maquettes UI/UX

### Conception de l'interface

* Parcours utilisateur
* Hiérarchie visuelle
* Navigation
* Responsive design
* Expérience utilisateur

![bg contain](figures/mockups.png)

---

# Outils de développement

### Environnement de travail

* VS Code
* Git
* GitHub
* Figma
* Postman
* Outils de gestion de projet

---

# Technologies utilisées

### Stack technique

**Frontend**

HTML • CSS • JavaScript • React

**Backend**

PHP / Laravel • API REST

**Base de données**

MySQL

**Autres**

Git • GitHub • Figma

---

# Bilan d'implémentation des sprints

### Avancement

| Sprint   | Fonctionnalités         | État |
| -------- | ----------------------- | ---- |
| Sprint 1 | Fondations + ressources | ✓    |
| Sprint 2 | Clients + commandes     | ✓    |
| Sprint 3 | IA + paiements          | ✓    |

---

# Conclusion

### Résultats

* Besoin analysé
* Solution conçue
* Architecture définie
* Sprints réalisés
* Fonctionnalités implémentées

### Perspective

**Une solution évolutive et prête à accueillir de nouvelles fonctionnalités.**

---

# Merci pour votre attention

## Questions ?
