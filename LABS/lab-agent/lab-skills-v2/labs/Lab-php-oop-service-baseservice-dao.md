# Lab : Comprendre l'architecture PHP OOP — Service, BaseService et DAO

> **Consigne :** ce lab porte sur la compréhension et l'explication de l'architecture. Analysez les responsabilités, les relations et le flux à partir d'exemples PHP. Vous n'avez pas à construire une application CRUD complète.

## 1. Présentation du Lab

### 1.1 Métadonnées

- **Technologie ciblée :** PHP natif et programmation orientée objet
- **Niveau :** débutant
- **Durée estimée :** [À compléter]
- **Apprenant :** [Nom et prénom]
- **Projet fil rouge :** [Nom du projet]
- **Prototype technique :** gestion des catégories / thématiques
- **Prérequis :** notions de classes, objets et syntaxe PHP

### 1.2 Introduction

[En 2 ou 3 phrases, présentez l'architecture Service, BaseService et DAO et expliquez pourquoi les responsabilités sont séparées.]

### 1.3 Contexte et objectif

- **Contexte :** une application doit gérer des catégories ou thématiques.
- **Objectif :** comprendre et expliquer le rôle du Service, du BaseService, du DAO et leurs relations avec le Controller et le stockage.

À la fin du lab, l'apprenant doit pouvoir :

- expliquer chaque responsabilité avec ses propres mots ;
- décrire comment l'héritage permet à des Services de réutiliser des méthodes communes ;
- suivre le flux `Controller → Service → BaseService / DAO → Data Storage` ;
- analyser des extraits PHP illustrant la gestion de catégories ;
- comparer cette organisation à du PHP regroupé dans une seule page.

**Hors périmètre :** réaliser une application CRUD complète ou construire une interface JavaScript.

### 1.4 Expression du besoin

Expliquez comment l'architecture répartit les responsabilités lorsqu'une catégorie est créée ou consultée :

- **Donnée métier :** catégorie / thématique.
- **Besoin d'organisation :** séparer logique métier, méthodes communes et accès aux données.
- **Résultat attendu :** pouvoir expliquer le trajet d'une demande jusqu'au stockage et le rôle de chaque classe.

### 1.5 Position dans la stack

Complétez le rôle de chaque élément dans vos mots :

```text
Controller [________________________]
      │
      ▼
Service [___________________________]
      │                 │
      │                 └── hérite de BaseService [__________]
      ▼
DAO [_______________________________]
      │
      ▼
Data Storage [______________________]
```

## 2. Explication théorique et analyse

### 2.1 Notions fondamentales

Complétez les définitions et donnez un exemple lié à la catégorie :

| Notion | Définition avec mes mots | Exemple |
|---|---|---|
| Classe | [À compléter] | [À compléter] |
| Objet | [À compléter] | [À compléter] |
| Encapsulation | [À compléter] | [À compléter] |
| Héritage | [À compléter] | [À compléter] |
| Service | [À compléter] | [À compléter] |
| BaseService | [À compléter] | [À compléter] |
| DAO | [À compléter] | [À compléter] |
| Séparation des responsabilités | [À compléter] | [À compléter] |

### 2.2 Responsabilités et relations

Pour chaque composant, précisez ce qu'il fait et ce qu'il ne fait pas :

- **Controller :** [À compléter]
- **CategoryService :** [À compléter]
- **BaseService :** [À compléter]
- **CategoryDAO :** [À compléter]
- **Data Storage :** [À compléter]

Complétez le diagramme avec les relations et les responsabilités :

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

### 2.3 Analyse des exemples PHP

Étudiez les exemples PHP de `BaseService`, `CategoryService` et `CategoryDAO` fournis par le formateur ou le skill technique associé. Collez ou référencez les extraits à analyser ci-dessous; ils servent de support de lecture et ne sont pas un exercice de création d'un CRUD complet.

#### Exemple `BaseService`

```php
[Insérer ici l'extrait fourni à analyser]
```

#### Exemple `CategoryService`

```php
[Insérer ici l'extrait fourni à analyser]
```

#### Exemple `CategoryDAO`

```php
[Insérer ici l'extrait fourni à analyser]
```

Pour chaque classe, répondez sans recopier une solution complète :

| Fichier / classe | Quelle est sa responsabilité ? | Quelle méthode ou ligne le montre ? | Quelles données entrent et sortent ? |
|---|---|---|---|
| `BaseService` | [À compléter] | [À compléter] | [À compléter] |
| `CategoryService` | [À compléter] | [À compléter] | [À compléter] |
| `CategoryDAO` | [À compléter] | [À compléter] | [À compléter] |

Questions d'analyse :

1. Quelle classe porte les règles métier ? [À compléter]
2. Quelle classe communique avec le stockage ? [À compléter]
3. Comment `CategoryService` réutilise-t-il `BaseService` ? [À compléter]
4. Pourquoi le Controller ne devrait-il pas accéder directement au stockage ? [À compléter]

### 2.4 Suivre le workflow

En vous appuyant sur les exemples, décrivez le chemin d'une opération de catégorie :

1. Le Controller reçoit ou prépare : [____________________________]
2. Le Service applique : [_______________________________________]
3. Le BaseService fournit : [____________________________________]
4. Le DAO réalise : [___________________________________________]
5. Le stockage conserve ou retourne : [__________________________]
6. Le résultat revient vers : [__________________________________]

### 2.5 Comparaison avec une architecture traditionnelle

| Critère | PHP regroupé dans une page | Service / BaseService / DAO |
|---|---|---|
| Emplacement des règles métier | [À compléter] | [À compléter] |
| Emplacement de l'accès aux données | [À compléter] | [À compléter] |
| Réutilisation des méthodes communes | [À compléter] | [À compléter] |
| Effet d'un changement de stockage | [À compléter] | [À compléter] |
| Lisibilité et maintenance | [À compléter] | [À compléter] |

### 2.6 Avantages et limites

- **Réutilisation :** [Donnez un exemple de méthode partagée.]
- **Moins de duplication :** [Expliquez où le code commun est placé.]
- **Organisation :** [Expliquez comment chaque classe a une responsabilité définie.]
- **Maintenabilité :** [Expliquez ce qui devient plus facile à changer.]
- **Limite :** [Expliquez pourquoi cette structure peut être excessive pour un très petit script.]

### 2.7 Skill IA technique proposé

- **Nom proposé :** `php-oop-architecture-tutor`
- **Mission :** aider à comprendre et analyser des exemples de Service, BaseService et DAO sans générer une application CRUD complète.
- **Prochaine étape :** utiliser `plugin-dev` pour concevoir ce skill si le lab le requiert.

## 3. Activité pratique — analyser, ne pas construire le CRUD

### 3.1 Préparation

- **Version PHP disponible :** [Facultatif, relever avec `php -v` si vous exécutez les extraits]
- **Exemples à étudier :** [Lister les fichiers PHP fournis par le formateur ou le skill technique]
- **Support d'analyse :** [Compléter les tableaux et schémas de ce document]

### 3.2 Parcours d'analyse

#### Étape 1 — Repérer les classes

- Identifiez `BaseService`, `CategoryService` et `CategoryDAO`.
- Relevez leurs propriétés, méthodes et dépendances.
- **Mes observations :** [À compléter]

#### Étape 2 — Identifier l'héritage

- Repérez la déclaration d'héritage de `CategoryService`.
- Nommez les méthodes héritées ou réutilisées.
- Expliquez pourquoi elles sont communes.
- **Mon explication :** [À compléter]

#### Étape 3 — Identifier la séparation des responsabilités

- Associez chaque action (validation, règles métier, stockage) à une classe.
- Repérez les responsabilités qui seraient mélangées dans une approche traditionnelle.
- **Mon tableau d'analyse :** [À compléter]

#### Étape 4 — Expliquer le workflow

- Suivez un exemple de création ou de lecture de catégorie dans les extraits.
- Tracez les appels entre Controller, Service, BaseService, DAO et stockage.
- **Mon schéma annoté :** [À compléter]

#### Étape 5 — Présenter les bénéfices

- Choisissez deux avantages de cette organisation.
- Donnez un exemple précis à partir des extraits.
- Citez une limite ou un coût de cette séparation.
- **Mon explication :** [À compléter]

### 3.3 Vérification de compréhension

Répondez sans consulter vos notes :

1. Quelle classe doit être modifiée si les règles métier d'une catégorie changent ? Pourquoi ?
2. Quelle classe doit être modifiée si la manière de stocker les données change ? Pourquoi ?
3. À quoi sert le BaseService ?
4. Quelle est la différence entre le Service et le DAO ?
5. Quel problème la séparation des responsabilités réduit-elle ?

**Mes réponses :** [À compléter]

### 3.4 Skill IA utilisé

- **Nom du skill :** `php-oop-architecture-tutor` [à confirmer ou modifier]
- **Aide reçue :** [Expliquer comment il a aidé à comprendre les extraits]
- **Vérification personnelle :** [Expliquer une notion que vous savez maintenant présenter sans aide]

## 4. Défi Sprint devant le formateur

### 4.1 Démonstration en cinq minutes

1. Présentez le besoin de gestion de catégories / thématiques.
2. Expliquez le diagramme de classes.
3. Suivez un exemple fourni du Controller au stockage.
4. Comparez brièvement cette organisation à une page PHP regroupant toutes les responsabilités.

### 4.2 Mini-défi

Le formateur choisit une classe dans les extraits. Expliquez :

- sa responsabilité ;
- les classes avec lesquelles elle communique ;
- une conséquence si elle prenait aussi en charge le rôle d'une autre classe.

### 4.3 Checklist de validation

- [ ] L'apprenant définit Service, BaseService et DAO avec ses mots.
- [ ] L'apprenant explique l'héritage entre CategoryService et BaseService.
- [ ] L'apprenant suit le workflow Controller → Service → BaseService / DAO → Data Storage.
- [ ] L'apprenant analyse des extraits PHP de CategoryService, BaseService et CategoryDAO.
- [ ] L'apprenant donne des avantages concrets de la séparation des responsabilités.
- [ ] La démonstration porte sur la compréhension de l'architecture, pas sur un CRUD complet.

### 4.4 Intégration dans le projet fil rouge

[Expliquez où ce découpage pourrait aider votre prototype et quelles classes de votre projet pourraient jouer ces rôles.]
