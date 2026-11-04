# Guide de Validation & Audit de Lab (Checklist Binaire)

Ce document sert de référence au skill `lab-dev` pour auditer et valider le travail d'un apprenant avant son passage en sprint devant le formateur.

---

## 1. Audit de la Présentation (`Presentation-[Nom].md`)

### 1.1 Contrôle de la Page de Garde
| Critère | Validation | Règle obligatoire |
| :--- | :---: | :--- |
| **Titre du Lab** | [ ] OUI / NON | Précis et technique |
| **Nom de l'Apprenant** | [ ] OUI / NON | Renseigné |
| **Nom du Projet Fil Rouge** | [ ] OUI / NON | Renseigné |
| **Prototype Technique** | [ ] OUI / NON | Brique identifiée |
| **Stack Technique** | [ ] OUI / NON | Mentionne les technos (Laravel, Alpine, Preline, etc.) |
| **Date du Sprint** | [ ] OUI / NON | Renseignée |

### 1.2 Contrôle des Notes du Présentateur (Niveau Français A1)
Pour chaque slide (Slides 1 à 5) :
- [ ] La section « Notes du Présentateur » est présente.
- [ ] Il y a **exactement 3 phrases** simples.
- [ ] Les phrases sont au **niveau de français A1** (structure courte : Sujet + Verbe + Complément).
- [ ] Les phrases utilisent les **vrais mots techniques professionnels** (aucun mot puéril, pas de simplification enfantine).
- [ ] L'apprenant peut lire ces 3 phrases avec assurance devant le formateur.

### 1.3 Contrôle du Contenu Technique des Slides
- [ ] Le contenu technique reflète bien le code du lab.
- [ ] Le skill IA utilisé est explicitement cité (avec son rôle exact).

---

## 2. Audit du Document de Lab (`Lab-[Nom].md`)

### 2.1 Bloc 1 : Présentation du Lab
- [ ] **Introduction :** Présente clairement le lab en 2-3 phrases.
- [ ] **Contexte :** Explique la liaison avec le prototype du projet fil rouge.
- [ ] **Objectif :** Résultat attendu mesurable.
- [ ] **Besoin :** Problème métier ou technique précis.
- [ ] **Positionnement Stack :** Couche technique identifiée avec schéma de flux.

### 2.2 Bloc 2 : Explication Théorique & Solution
- [ ] **Théorie :** Concepts clés expliqués.
- [ ] **Solution :** Justification de l'approche technique choisie.
- [ ] **Fichiers :** Tableau des fichiers impactés.

### 2.3 Bloc 3 : Réalisation Pratique (Hands-on)
- [ ] **Étapes :** Étapes ordonnées et compréhensibles.
- [ ] **Code :** Snippets de code propres et commentés.
- [ ] **Skill IA :** Rôle du skill technique mentionné.
- [ ] **Tests :** Procédure de vérification dans le navigateur / console.

### 2.4 Bloc 4 : Défi Sprint
- [ ] Protocole de démo prêt (5 min).
- [ ] Mini-défi anticipé.
- [ ] Intégration fil rouge expliquée.

---

## 3. Audit du Fichier `Todo.md`
- [ ] Les cases des phases 1, 2, 3 et 4 sont cochées avant de se présenter au formateur.
- [ ] Les blocages éventuels ont été résolus.

---

## 4. Décision de Validation
- **Statut CONFORME :** Tous les critères ci-dessus sont validés. L'apprenant est autorisé à passer son sprint devant le formateur.
- **Statut NON CONFORME :** Indiquer à l'apprenant les points précis à corriger (ex: « Il manque la 3ème phrase de notes orales sur la slide 2 », ou « La page de garde n'a pas de date »).

