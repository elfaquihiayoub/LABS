---
name: skill-creator
description: Crée, structure et normalise de nouveaux Skills pour agents IA compatibles avec Antigravity et GitHub Copilot dans VS Code.
argument-hint: <nom-du-skill> <description-et-workflow>
---

# Skill Creator

Ce Skill automatise la génération de nouveaux Skills standardisés dans `.agent/skills/<nom>/SKILL.md` pour outiller les agents d'IA de développement.

## Structure requise d'un Skill

Chaque nouveau Skill doit respecter la structure suivante :

```markdown
---
name: <slug-du-skill>
description: <Description concise indiquant le rôle et les cas d'activation du Skill>
argument-hint: <arguments-attendus>
---

# [Titre du Skill]

[Description du rôle et de la finalité du Skill]

## Démarche d'exécution
1. [Étape 1]
2. [Étape 2]
3. [Étape 3]

## Contraintes strictes
- Périmètre limité au dossier du workspace ouvert.
- Ne pas toucher aux fichiers de configuration sensibles (`.env`).
- Respecter les conventions de nommage et l'architecture du projet.

## Format de restitution
- [Spécification précise du livrable attendu]
```

## Règles de conception

- **Modularité :** Un Skill doit répondre à une tâche bien délimitée.
- **Progressive disclosure :** La description dans le front matter doit être précise car c'est elle qui permet à l'agent de décider de charger le Skill.
- **Interopérabilité :** Le contenu doit être directement exploitable par Antigravity et référençable par GitHub Copilot dans VS Code via `@workspace`.
- **Contrôle de validation :** Vérifier la présence du front matter YAML valide (délimité par `---`).
