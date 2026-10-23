---
name: task-prompt-creator
description: Structure et génère des prompts de tâche clairs, robustes et sans ambiguïté pour agents IA selon le cadre Rôle, Contexte, Action, Format et Contraintes.
argument-hint: <objectif-tache> [contexte-technique-ou-stack]
---

# Task Prompt Creator

Ce Skill structure un prompt de tâche hautement performant, conçu pour obtenir un résultat immédiat et conforme auprès d'un agent IA (Antigravity, GitHub Copilot, Claude, GPT).

## Démarche d'analyse et de structuration

À partir de l'objectif fourni dans la commande :

1. **Identifier le Rôle :** Définir la posture adéquate (ex. Développeur Backend Senior Laravel, Ingénieur DevOps, Développeur Front JavaScript).
2. **Établir le Contexte Technique :** Déterminer la stack, les versions, l'architecture existante et les dépendances.
3. **Formuler les Actions par étapes :** Rédiger des étapes claires avec des verbes d'action précis.
4. **Définir les Formats et Livrables :** Imposer les fichiers attendus, extensions, gabarits et conventions de nommage.
5. **Appliquer les Contraintes Strictes :** Poser des règles négatives claires (ex. ne jamais toucher au fichier `.env`, contrôleurs fins avec Form Requests, interdiction de packages superflus).

## Structure attendue du prompt généré

Le livrable final doit être un bloc de prompt prêt à être copié/collé, structuré comme suit :

```markdown
### RÔLE & POSTURE
[Définition précise du rôle expert]

### CONTEXTE TECHNIQUE
- Environnement : [Langage, Framework, Version]
- Fichiers cibles : [Chemins relatifs dans le projet]
- Architecture : [Conventions à respecter]

### OBJECTIF & ACTIONS
1. [Action 1 ordonnée]
2. [Action 2 ordonnée]
3. [Action 3 ordonnée]

### CONTRAINTES STRICTES
- [Contrainte 1 négative ou positive]
- [Contrainte 2 spécifique à la sécurité / propreté du code]
- Ne modifier aucun fichier hors du périmètre spécifié.

### FORMAT DE RESTITUTION
- [Code source complet sans balisage inutile / format Markdown / Form Requests]
```

## Règles de validation du prompt

Avant de restituer le prompt :
- Vérifier que chaque consigne est exploitable sans interprétation arbitraire.
- Supprimer les formulations vagues comme "faire au mieux" ou "ajouter du code propre".
- S'assurer que le livrable attendu est directement vérifiable et testable.
