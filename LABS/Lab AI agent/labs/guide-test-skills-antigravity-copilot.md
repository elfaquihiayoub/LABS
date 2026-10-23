# Guide pratique : Tester les Skills avec Antigravity et GitHub Copilot dans VS Code

Ce guide présente la méthodologie pour tester, vérifier et valider le bon fonctionnement des Skills développés dans `.agent/skills/`.

---

## 1. Principes de fonctionnement dans VS Code

| Assistant IA | Mécanisme de détection | Méthode d'invocation |
| :--- | :--- | :--- |
| **Antigravity** | Découverte automatique dans `.agent/skills/<nom>/SKILL.md` (chargement progressif via le front matter YAML). | Mention du nom du Skill, syntaxe de déclenchement ou prompt ciblé correspondant à la description. |
| **GitHub Copilot** | Lecture du contexte de l'espace de travail VS Code. | Référence explicite dans le chat Copilot avec `@workspace #file:.agent/skills/<nom>/SKILL.md` ou instructions d'espace de travail. |

---

## 2. Protocoles de test par Skill

### Test 1 : `lab-presentation-creator`
- **Objectif :** Générer une présentation Marp conforme à la charte (Plan en 3 points, Problèmes puis Solutions, zéro paragraphe).
- **Test avec Antigravity :**
  ```text
  lab-agent : Créer une API REST sécurisée avec Laravel
  ```
  *Critères de succès :* Création d'un fichier `.md` Marp valide dans `labs/`, diapositive de plan respectée, pas de paragraphes, couleurs slate/teal.
- **Test avec GitHub Copilot :**
  ```text
  @workspace #file:.agent/skills/lab-creator/SKILL.md Génère une présentation Marp sur l'authentification Sanctum en suivant scrupuleusement les consignes de ce fichier.
  ```

---

### Test 2 : `task-prompt-creator`
- **Objectif :** Structurer un prompt pour une tâche de développement sans ambiguïté.
- **Test avec Antigravity :**
  ```text
  Utilise le skill task-prompt-creator pour : Créer un contrôleur de gestion des articles avec validation et pagination.
  ```
  *Critères de succès :* Restitution d'un gabarit complet (Rôle expert Laravel, Contexte, Actions ordonnées, Contraintes strictes dont Form Request, Format attendu).
- **Test avec GitHub Copilot :**
  ```text
  @workspace #file:.agent/skills/task-prompt-creator/SKILL.md Rédige le prompt pour configurer les tests d'intégration PHPUnit.
  ```

---

### Test 3 : `js-error-resolver`
- **Objectif :** Résoudre méthodiquement une erreur JavaScript fréquente.
- **Test avec Antigravity :**
  ```text
  Utilise le skill js-error-resolver sur l'erreur suivante :
  TypeError: Cannot read properties of undefined (reading 'titre') à la ligne 42 de main.js
  ```
  *Critères de succès :* Diagnostic clair, recommandation de la console Chrome DevTools, correctif avec chaînage optionnel `article?.titre ?? 'Sans titre'`.
- **Test avec GitHub Copilot :**
  ```text
  @workspace #file:.agent/skills/js-error-resolver/SKILL.md Comment résoudre "SyntaxError: Unexpected token '<' in JSON at position 0" lors d'un appel fetch vers mon API PHP ?
  ```

---

### Test 4 : `skill-creator`
- **Objectif :** Échafauder un nouveau Skill complet et prêt à l'emploi.
- **Test avec Antigravity :**
  ```text
  Utilise le skill skill-creator pour concevoir un skill nommé 'laravel-form-request-generator' dédié à la génération de Form Requests Laravel validées.
  ```
  *Critères de succès :* Création d'une arborescence `.agent/skills/laravel-form-request-generator/SKILL.md` avec front matter YAML valide et règles strictes.

---

## 3. Grille de validation des Skills

Pour chaque test, vérifier :
1. ✅ **Détection :** L'agent a identifié et activé la compétence sans erreur.
2. ✅ **Respect des contraintes :** Aucune modification de fichier non autorisée (ex. `.env`).
3. ✅ **Conformité du format :** Le livrable produit respecte exactement le gabarit imposé.
4. ✅ **Traçabilité :** L'agent liste bien les compétences utilisées en fin d'intervention.
