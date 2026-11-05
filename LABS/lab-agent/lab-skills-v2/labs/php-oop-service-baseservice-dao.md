---
marp: true
theme: default
paginate: true
size: 16:9
---

<!-- _class: title -->

# Architecture PHP OOP

## Service, BaseService et DAO

| Information | À compléter |
|---|---|
| Apprenant | [Nom et prénom] |
| Projet fil rouge | [Nom du projet] |
| Prototype | Gestion des catégories / thématiques |
| Stack | PHP natif, POO |
| Date du sprint | [Date] |

<!--
Bonjour, je présente mon lab.
Mon sujet est l'architecture PHP.
Je parle des catégories.
-->

---

# Plan de la présentation

- Introduction et objectif
- Stack et problématique
- Définitions et responsabilités
- Solutions et workflow
- Bilan et validation

<!--
Je présente le sujet du lab.
Je montre les rôles des classes.
Je termine avec le workflow.
-->

---

# Introduction

- **Sujet :** organiser le code PHP avec Service, BaseService et DAO
- **Exemple métier :** catégories / thématiques
- **Objectif :** comprendre, analyser et expliquer cette architecture
- **Périmètre :** analyser des exemples, sans construire un CRUD complet

<!--
Le sujet est une architecture PHP.
Je travaille sur les catégories.
Je vais expliquer les rôles.
-->

---

# Stack technique

- **PHP natif :** classes et objets
- **Programmation orientée objet :** encapsulation et héritage
- **Stockage :** [indiquer le type utilisé dans les exemples]
- **Rôles :** Controller, Service, BaseService, DAO

<!--
Le lab utilise le langage PHP.
Les classes séparent les rôles.
Le stockage garde les données.
-->

---

# Problématique

- Une seule page peut mélanger plusieurs responsabilités.
- La logique métier et l'accès aux données deviennent difficiles à distinguer.
- Les méthodes communes peuvent être répétées.
- **Question :** comment organiser ces rôles pour mieux comprendre le code ?

<!--
Une page peut faire trop de choses.
Le code devient difficile à suivre.
Nous séparons les responsabilités.
-->

---

# Définitions

- **Service :** applique les règles métier.
- **BaseService :** parent avec des méthodes communes.
- **Héritage :** un Service spécifique réutilise le parent.
- **DAO :** accède au stockage des données.
- **Séparation des responsabilités :** chaque classe a un rôle précis.

<!--
Le service applique les règles.
Le DAO accède aux données.
Le parent partage des méthodes.
-->

---

# Relations entre les classes

```text
                 ┌─────────────────┐
                 │   BaseService   │
                 └────────▲────────┘
                          │ hérite
                 ┌────────┴────────┐        utilise       ┌─────────────┐
                 │ CategoryService ├─────────────────────►│ CategoryDAO │
                 └────────▲────────┘                      └──────┬──────┘
                          │ appelé                               │
                 ┌────────┴────────┐                             ▼
                 │   Controller    │                       Data Storage
                 └─────────────────┘
```

- **À compléter :** quelles méthodes communes pourraient être placées dans `BaseService` ?

<!--
Le service hérite du parent.
Le contrôleur appelle le service.
Le DAO parle au stockage.
-->

---

# Workflow et exemple Catégorie

- **Workflow :** Controller → Service → BaseService / DAO → Data Storage
- **Exemples PHP à analyser :** `BaseService`, `CategoryService`, `CategoryDAO`
- **CategoryService :** [expliquer son rôle d'après l'extrait PHP]
- **CategoryDAO :** [expliquer son rôle d'après l'extrait PHP]
- **Analyse :** [indiquer le trajet d'une opération catégorie]

<!--
Le contrôleur reçoit la demande.
Le service applique la règle.
Le DAO échange avec le stockage.
-->

---

# Solutions et avantages

- **Réutilisation :** méthodes communes dans `BaseService`
- **Organisation :** logique métier dans les Services
- **Accès aux données :** centralisé dans le DAO
- **Maintenance :** chaque responsabilité est plus facile à retrouver
- **Limite :** cette structure peut être excessive pour un petit script

<!--
Le code commun est réutilisé.
Chaque classe a un rôle.
Le projet est plus facile à maintenir.
-->

---

# Conclusion et validation

- Je sais expliquer les rôles de Service, BaseService et DAO.
- Je sais décrire l'héritage et la séparation des responsabilités.
- Je sais suivre le workflow jusqu'au stockage.
- **Skill proposé :** `php-oop-architecture-tutor`

<!--
Je peux expliquer cette architecture.
Je peux suivre le flux des données.
Je suis prêt pour le mini-défi.
-->
