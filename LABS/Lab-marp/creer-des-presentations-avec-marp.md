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
  h1, h2 { color: #12304A; }
  h1 {
    font-size: 2.15em;
    border-bottom: 5px solid #16A6A1;
    padding-bottom: 14px;
  }
  h2 { font-size: 1.5em; }
  strong { color: #087E8B; }
  ul { font-size: 1.16em; line-height: 1.6; }
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
  section.title h2 { color: #C7D7E5; font-weight: normal; }
  section.solution h1 { color: #087E8B; }
---

<!-- _class: title -->

# Créer des présentations avec Marp

## Des diapositives claires à partir de Markdown

---

# PLAN

- Introduction
- Problèmes
- Solutions

---

# INTRODUCTION
## Marp transforme Markdown en diapositives

- **Marp** est un outil de présentation basé sur Markdown
- Un fichier texte devient un diaporama avec des diapositives séparées
- Le contenu reste lisible et modifiable dans un éditeur de texte
- Marp peut produire des présentations HTML, PDF ou PowerPoint

---

# INTRODUCTION
## Trois éléments pour démarrer

- Un fichier de présentation, par exemple `presentation.md`
- **Marp for VS Code** pour prévisualiser le diaporama dans l’éditeur
- **Marp CLI** pour générer des fichiers depuis le terminal
- L’extension VS Code et l’outil en ligne de commande sont deux façons d’utiliser Marp

---

# PROBLÈME 1
## Les diapositives deviennent difficiles à maintenir

- Le texte est recopié dans plusieurs fichiers ou outils
- Une correction doit être répétée à plusieurs endroits
- Les versions partagées peuvent rapidement diverger

---

# PROBLÈME 2
## La mise en page manque de cohérence

- Chaque diapositive est mise en forme séparément
- Les titres, couleurs et espacements varient
- Les changements de design prennent du temps

---

# PROBLÈME 3
## Le partage nécessite plusieurs formats

- Les participants n’utilisent pas tous le même logiciel
- Une présentation doit parfois être fournie en PDF ou en PowerPoint
- Refaire manuellement le diaporama dans plusieurs outils crée des erreurs

---

<!-- _class: title -->

# SOLUTIONS

## Une source Markdown, un aperçu, plusieurs exports

---

<!-- _class: solution -->

# SOLUTION 1
## Écrire le contenu dans un fichier Markdown

- Activer Marp avec la directive `marp: true` dans le front matter
- Séparer les diapositives avec une ligne `---`
- Utiliser `#` pour un titre et `-` pour une liste
- Garder le texte source dans Git pour suivre les modifications

---

<!-- _class: solution -->

# SOLUTION 2
## Appliquer un thème commun

- Choisir un thème avec la directive `theme`
- Activer les numéros de diapositives avec `paginate: true`
- Définir les couleurs et la typographie dans `style`
- Prévisualiser chaque diapositive avant de partager le support

---

<!-- _class: solution -->

# SOLUTION 3
## Prévisualiser et exporter le diaporama

- Dans VS Code, installer l’extension **Marp for VS Code**
- Ouvrir l’aperçu Marp pour vérifier le rendu et les débordements
- Avec Marp CLI : `marp presentation.md --pdf`
- Remplacer `--pdf` par `--pptx` ou `--html` pour un autre format

---

<!-- _class: title -->

# À RETENIR

- Markdown sert de source unique aux diapositives
- Marp facilite l’aperçu et la cohérence visuelle
- Un même support peut être exporté en plusieurs formats
