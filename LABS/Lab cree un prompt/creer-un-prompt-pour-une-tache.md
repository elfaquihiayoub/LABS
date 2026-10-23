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

# Créer un prompt pour une tâche

## Structurer des consignes claires et exploitables pour l'IA

---

# PLAN

- Introduction
- Problèmes
- Solutions
- À RETENIR

---

# INTRODUCTION
## Définir le prompt de tâche

- Un **prompt de tâche** est une instruction ciblée guidant un agent d'IA vers un résultat précis
- Il formule le rôle attendu, le contexte technique, la tâche et le format de restitution
- Il s'applique aux agents d'IA, aux générateurs de code et aux assistants de développement
- Un cadrage rigoureux évite les malentendus et accélère le cycle de développement

---

# INTRODUCTION
## Les composants d'une consigne efficace

- **Le rôle :** Définir la posture et le niveau d'expertise de l'assistant
- **Le contexte :** Partager l'environnement technique, les dépendances et l'existant
- **L'action :** Expliciter les étapes de réalisation avec des verbes clairs
- **Le livrable :** Imposer un format précis et des contraintes strictes

---

# PROBLÈME 1
## Des demandes floues créent des réponses inexploitables

- L'utilisateur saisit une consigne courte sans préciser le besoin réel
- Le modèle comble les manques par des suppositions non désirées
- Le livrable produit s'éloigne des attentes fonctionnelles
- Les itérations manuelles successives entraînent une perte de temps

---

# PROBLÈME 2
## L'absence de contraintes engendre des formats inadaptés

- Le format de sortie souhaité n'est pas stipulé dans la demande
- L'agent ajoute des explications verbeuses et du texte superflu
- Les structures de fichiers ou de code attendues ne sont pas respectées
- L'intégration directe dans le projet devient fastidieuse

---

# PROBLÈME 3
## Le manque de contexte provoque des erreurs techniques

- Les versions du framework ou du langage ne sont pas indiquées
- L'agent propose des syntaxes obsolètes ou des bibliothèques incompatibles
- Les conventions de nommage et règles d'architecture locales sont ignorées
- Le code généré échoue lors des tests ou introduit des failles

---

<!-- _class: title -->

# SOLUTIONS

## Méthodologie et bonnes pratiques de structuration d'un prompt

---

<!-- _class: solution -->

# SOLUTION 1
## Définir le rôle et l'objectif fonctionnel

- Attribuer un rôle précis (ex. : développeur senior spécialisé)
- Énoncer le périmètre exact de la mission sans ambiguïté
- Découper les tâches complexes en étapes ordonnées
- Définir les critères d'acceptation du livrable attendu

---

<!-- _class: solution -->

# SOLUTION 2
## Verrouiller le format et appliquer des contraintes strictes

- Exiger le format exact du résultat (ex. : fichier source Markdown unique, code sans markdown)
- Formuler des règles négatives (ex. : ne jamais modifier le fichier .env)
- Spécifier un modèle type ou un gabarit de réponse
- Limiter la réponse au livrable attendu pour accélérer l'intégration

---

<!-- _class: solution -->

# SOLUTION 3
## Transmettre le contexte technique et un exemple type

- Mentionner la stack technique complète et les versions employées
- Fournir les extraits de code existants ou les interfaces requises
- Intégrer un exemple concret (few-shot prompting) entrée/sortie
- Demander une validation systématique avant finalisation

---

<!-- _class: title -->

# À RETENIR

- Un prompt de tâche efficace combine rôle, contexte, action et format
- Poser des contraintes strictes garantit un résultat directement exploitable
- Un cadrage technique précis élimine les incompatibilités et les erreurs
