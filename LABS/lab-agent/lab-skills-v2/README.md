# Lab Skills v2

Ce dépôt contient les compétences IA (Skills) pour assister le développement des prototypes techniques de nos projets fil rouge.

## 1. Rôle dans le Projet Fil Rouge
- Chaque apprenant développe un **Projet Fil Rouge** pour valider ses compétences.
- Pour construire ce projet, nous réalisons d'abord un **Prototype technique** par sprints.
- Chaque sprint est présenté en direct devant le formateur.
- Les **Labs** permettent de résoudre une problématique technique précise de notre stack (CRUD Laravel, dynamique Alpine.js, composants Preline UI).

## 2. Approche Méthodologique
- Nous analysons les compétences existantes dans la communauté (Anthropic, GitHub, agentskills.io).
- Nous créons nos propres skills selon les standards officiels d'Anthropic (format normé en 10 rubriques).
- Nous séparons les responsabilités :
  - Un skill de gouvernance globale (`plugin-dev`).
  - Un skill d'accompagnement de Lab (`lab-dev`).
  - Des skills techniques spécialisés créés pour chaque besoin de développement.

## 3. Outillage & Compétences IA

| Skill | Rôle | Commande | Problématique résolue |
| :--- | :--- | :--- | :--- |
| **`plugin-dev`** | Gouverne, conçoit et valide les skills IA selon les standards Anthropic | `/plugin-dev` | Créer et maintenir un skill propre et sans erreurs |
| **`lab-dev`** | Cadre, structure et valide la réalisation d'un Lab technique | `/lab-dev` | Préparer le Lab, le fichier Todo, et la présentation pour le formateur |

## 4. Démarrage & Validation
- Pour vérifier la conformité des skills présents dans ce dépôt :
  ```powershell
  node .agent/skills/plugin-dev/scripts/validate-skills.cjs
  ```
- Pour préparer un nouveau Lab avec l'agent :
  1. Remplir le fichier `README.md` de votre lab.
  2. Déclencher `lab-dev` pour créer le squelette, le plan de présentation et le fichier `Todo.md`.
  3. Créer le skill technique requis avec `plugin-dev`.

## 5. Labs disponibles
- [Lab PHP OOP : Service, BaseService et DAO](labs/Lab-php-oop-service-baseservice-dao.md) — Guide pratique pour créer une catégorie de bout en bout avec PHP, Fetch et JSON.
- [Présentation du lab](labs/php-oop-service-baseservice-dao.md) — Concepts, diagramme de classes et architecture.
- [Todo du lab](labs/Todo-php-oop-service-baseservice-dao.md) — Étapes de réalisation et de validation.
