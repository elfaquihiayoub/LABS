---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    font-family: "Aptos", "Segoe UI", sans-serif;
    background: #F7F9FC;
    color: #172033;
    padding: 58px;
  }
  h1, h2 {
    color: #12304A;
  }
  h1 {
    font-size: 2.2em;
    border-bottom: 5px solid #16A6A1;
    padding-bottom: 14px;
  }
  h2 {
    font-size: 1.65em;
  }
  strong {
    color: #087E8B;
  }
  ul {
    font-size: 1.18em;
    line-height: 1.65;
  }
  section.title {
    background: #12304A;
    color: #F7F9FC;
    text-align: center;
    justify-content: center;
  }
  section.title h1 {
    color: #FFFFFF;
    border-bottom: 5px solid #16A6A1;
  }
  section.title h2 {
    color: #C7D7E5;
    font-weight: normal;
  }
  section.solution h1 {
    color: #087E8B;
  }
---

<!-- _class: title -->

# LAB STARTER

## Problèmes rencontrés • Solutions proposées



---

# PLAN

- Introduction : IDE
- Pourquoi utiliser un IDE ?
- Problems encountered during the lab
- Solutions to solve these problems 
- ENVIRONNEMENT PRÊT

---

# INTRODUCTION : IDE

- **IDE** : Integrated Development Environment
- Environnement de développement intégré
- Outil permettant d’écrire, modifier et organiser le code
- Exemple : **Visual Studio Code**

---

# POURQUOI UTILISER UN IDE ?

- Écrire et modifier le code facilement
- Organiser les fichiers d’un projet
- Utiliser des extensions pour ajouter des fonctionnalités
- Repérer les erreurs et améliorer la productivité

---

# PROBLÈME 1
## Extensions de fichiers invisibles

- Les extensions `.md`, `.php`, `.js`… ne sont pas visibles
- Difficulté à identifier le type de fichier

---

# PROBLÈME 2
## Fichiers cachés invisibles

- Le dossier `.git` n’est pas visible
- Les fichiers cachés sont difficiles à repérer

---

# PROBLÈME 3
## Aucun historique du code

- Pas d’historique des modifications
- Retour aux versions précédentes difficile
- Résolution des erreurs plus compliquée

---

# PROBLÈME 4
## Tâches et idées non documentées

- Les tâches à réaliser ne sont pas écrites
- Risque d’oublier des idées ou des actions

---

<!-- _class: title -->

# SOLUTIONS

## Actions à mettre en place

- Configurer Windows
- Initialiser Git
- Installer les extensions VS Code

---

<!-- _class: solution -->

# SOLUTION 1
## Afficher les extensions de fichiers

- Explorateur de fichiers → **Afficher**
- Activer **Extensions de noms de fichiers**

---

# SOLUTION 2
## Afficher les fichiers cachés

- Explorateur de fichiers → **Afficher**
- Activer **Éléments masqués**

---

# SOLUTION 3
## Créer un historique du code avec Git

- Initialiser Git dans le projet :
  - `git init`
- Enregistrer les modifications avec des commits

---

# SOLUTION 4
## Documenter les tâches et les idées

- Créer une liste de tâches
- Utiliser les commentaires `TODO` dans le code
- Installer **Todo Highlight** dans VS Code

---

# SOLUTION 5
## Installer les extensions VS Code

- **Live Server**
  - Lancer une page web localement
  - Actualiser le navigateur automatiquement
- **Todo Highlight**
  - Repérer les commentaires `TODO`
- **Markdownlint**
  - Vérifier la syntaxe et le formatage Markdown

---

<!-- _class: title -->

# ENVIRONNEMENT PRÊT

- Fichiers visibles
- Git initialisé
- Tâches documentées
- VS Code équipé
