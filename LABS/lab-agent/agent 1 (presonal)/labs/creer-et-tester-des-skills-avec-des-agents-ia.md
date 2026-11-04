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

# Créer et tester des Skills avec des agents IA

## Structurer des compétences modulaires pour Antigravity et GitHub Copilot

---

# PLAN

- Introduction
- Problèmes
- Solutions
- À RETENIR

---

# INTRODUCTION
## Qu'est-ce qu'un Skill pour agent IA ?

- Un **Skill** est une procédure outillée et documentée guidant un agent d'IA pas à pas
- Il encapsule les règles métier, les contraintes de code et les gabarits de restitution
- Il est chargé à la demande (*progressive disclosure*) pour préserver la fenêtre de contexte
- Exemple : génération automatique d'une présentation Marp ou résolution guidée de bugs

---

# INTRODUCTION
## Antigravity et GitHub Copilot dans VS Code

- **Antigravity :** Découvre automatiquement les Skills dans `.agent/skills/<nom>/SKILL.md`
- **GitHub Copilot :** Intègre les compétences via `@workspace` et les instructions personnalisées
- Les deux assistants bénéficient de consignes formelles pour éliminer les hallucinations
- Centraliser les Skills dans le dépôt assure l'alignement de toute l'équipe de développement

---

# PROBLÈME 1
## Répétition manuelle et oublis lors des tâches récurrentes

- Rédaction manuelle des mêmes consignes et contraintes à chaque sollicitation
- Oubli fréquent de règles critiques (ex. : ne jamais altérer le fichier `.env`)
- Réponses de l'agent disparates d'une session à l'autre selon la formulation du prompt
- Perte de temps substantielle et baisse d'efficacité du développeur

---

# PROBLÈME 2
## Livrables non conformes et intégration laborieuse

- Format de sortie imprévisible nécessitant un nettoyage manuel important
- Non-respect des standards d'architecture logicielle et de nommage du projet
- Présence de code parasite, commentaires superflus ou faux positifs
- Difficulté à automatiser la production de livrables reproductibles et fiables

---

# PROBLÈME 3
## Absence de méthode de validation et de test des agents

- Incertitude sur la bonne prise en compte du Skill par l'assistant d'IA
- Manque de visibilité sur les divergences entre Antigravity et GitHub Copilot
- Risque d'altération de fichiers hors périmètre par manque de garde-fous
- Absence de critères d'acceptation formalisés pour mesurer l'utilité du Skill

---

<!-- _class: title -->

# SOLUTIONS

## Méthodologie de conception, d'implémentation et de test de Skills

---

<!-- _class: solution -->

# SOLUTION 1
## Développer un Skill dédié par tâche réalisée

- Créer une structure standardisée : `.agent/skills/<nom-skill>/SKILL.md`
- Configurer les métadonnées YAML : `name`, `description` et `argument-hint`
- Détailler les étapes ordonnées d'exécution et les entrées attendues
- Documenter un Skill pour chaque besoin récurrent (prompts, débogage, présentations)

---

<!-- _class: solution -->

# SOLUTION 2
## Verrouiller les contraintes et les gabarits de sortie

- Imposer un format strict et exclusif (Markdown Marp, contrôleurs allégés, Form Requests)
- Fixer des interdictions explicites pour sécuriser l'environnement de travail
- Limiter les opérations au dossier du projet actif pour éviter les dérives
- Fournir des gabarits types (*templates*) directement exploitables par le modèle

---

<!-- _class: solution -->

# SOLUTION 3
## Tester et valider avec Antigravity et GitHub Copilot

- **Dans Antigravity :** Déclencher le Skill et vérifier l'affichage des Skills utilisés
- **Dans GitHub Copilot :** Solliciter le chat VS Code via `@workspace #file:SKILL.md`
- Contrôler le respect point par point des règles et des critères d'acceptation
- Affiner itérativement les instructions pour supprimer toute ambiguïté

---

<!-- _class: title -->

# À RETENIR

- Les Skills transforment un agent généraliste en expert adapté à votre projet
- Chaque tâche récurrente doit être capitalisée sous forme de Skill documenté
- Tester sous Antigravity et Copilot garantit la robustesse et l'interopérabilité
- Des contraintes claires et des formats verrouillés garantissent un code immédiatement exploitable
