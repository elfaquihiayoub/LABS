---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

  :root {
    --primary: #4F46E5;
    --primary-light: #818CF8;
    --accent: #EC4899;
    --dark-bg: #0F172A;
    --dark-surface: #1E293B;
    --light-bg: #F8FAFC;
    --light-surface: #FFFFFF;
    --text-light: #F1F5F9;
    --text-dark: #1E293B;
    --muted: #94A3B8;
  }

  section {
    background: radial-gradient(circle at top right, #1e1b4b, var(--dark-bg));
    color: var(--text-light);
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    padding: 45px 65px;
    font-size: 20px;
  }

  section.light {
    background: linear-gradient(135deg, #F8FAFC, #EEF2F6);
    color: var(--text-dark);
  }

  h1 {
    font-size: 2.6em;
    font-weight: 800;
    letter-spacing: -0.02em;
    background: linear-gradient(120deg, #818CF8, #F472B6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 0.2em;
  }

  h2 {
    font-size: 1.85em;
    font-weight: 700;
    color: var(--primary-light);
    border-bottom: 3px solid var(--primary);
    padding-bottom: 8px;
    margin-bottom: 0.5em;
  }

  section.light h2 {
    color: var(--primary);
    border-bottom-color: var(--primary);
  }

  h3 {
    font-size: 1.25em;
    font-weight: 600;
    color: #F472B6;
    margin-top: 0.6em;
    margin-bottom: 0.3em;
  }

  section.light h3 {
    color: #BE185D;
  }

  p, li {
    line-height: 1.6;
    font-size: 1.05em;
  }

  li::marker {
    color: var(--primary-light);
  }

  strong {
    color: #F472B6;
    font-weight: 600;
  }

  section.light strong {
    color: #BE185D;
  }

  .meta-box {
    margin-top: 35px;
    padding: 16px 24px;
    background: rgba(30, 41, 59, 0.7);
    border: 1px solid rgba(129, 140, 248, 0.3);
    border-radius: 12px;
    display: inline-flex;
    gap: 40px;
  }

  .meta-item {
    display: flex;
    flex-direction: column;
  }

  .meta-label {
    font-size: 0.8em;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--muted);
  }

  .meta-value {
    font-size: 1.15em;
    font-weight: 600;
    color: #FFFFFF;
  }

  code {
    background: rgba(99, 102, 241, 0.18);
    color: #E0E7FF;
    padding: 2px 7px;
    border-radius: 5px;
    font-size: 0.9em;
  }

  section.light code {
    background: rgba(99, 102, 241, 0.12);
    color: #3730A3;
  }

  pre code {
    background: transparent;
    padding: 0;
  }

  blockquote {
    border-left: 4px solid var(--accent);
    padding: 8px 18px;
    background: rgba(236, 72, 153, 0.08);
    border-radius: 0 8px 8px 0;
    margin: 15px 0;
    font-style: italic;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-size: 0.9em;
  }

  th {
    background: var(--primary);
    color: white;
    padding: 10px 14px;
    text-align: left;
    font-weight: 600;
  }

  td {
    padding: 8px 14px;
    border-bottom: 1px solid rgba(148, 163, 184, 0.2);
  }

  section.light td {
    border-bottom: 1px solid rgba(148, 163, 184, 0.3);
  }

  .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }

  .card {
    background: rgba(30, 41, 59, 0.6);
    border: 1px solid rgba(129, 140, 248, 0.25);
    border-radius: 10px;
    padding: 16px 20px;
  }

  section.light .card {
    background: #FFFFFF;
    border: 1px solid rgba(99, 102, 241, 0.2);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
  }

---

# 📑 Lab Planning : Standardisation des Labs

> Guide méthodologique et plan commun pour toutes nos présentations de labs

<div class="meta-box">
  <div class="meta-item">
    <span class="meta-label">👨‍💻 Réalisé par</span>
    <span class="meta-value">Mohammed Yassir Mesbahi</span>
  </div>
  <div class="meta-item">
    <span class="meta-label">👨‍🏫 Encadré par</span>
    <span class="meta-value">Fouad Essarraj</span>
  </div>
</div>

---

<!-- _class: light -->

## Plan de Présentation

1. **Introduction & Stack Technique**
   - Contexte de notre classe et panorama technologique
2. **Définitions Clés**
   - Différence entre labs techniques et labs méthodologiques
3. **Problème Rencontré**
   - Pourquoi ce lab planning est indispensable pour notre groupe
4. **Solution & Plan d'Action**
   - La structure unifiée et le template à appliquer

---

## 🛠️ Stack Technique de Nos Labs

Nos futurs labs porteront sur l'ensemble de notre cursus technique :

<div class="grid-2">
<div>

### 🌐 Backend & Données
- **PHP** : Langage backend serveur
- **Laravel** : Framework applicatif backend robuste
- **MySQL / JSON** : Base de données relationnelle et gestion JSON

</div>
<div>

### 📱 Mobile & 🎨 Frontend
- **PHP Native (NativePHP)** : Librairie pour applications mobiles natives avec PHP
- **Kotlin (Android)** : Développement mobile natif Android
- **Alpine.js** : Réactivité front-end et logique client légère
- **Tailwind CSS & Preline UI** : Framework CSS utilitaire et framework de composants UI

</div>
</div>

---

<!-- _class: light -->

## 📖 Définitions Clés : Deux Types de Labs

Pour structurer efficacement notre travail, nous distinguons 2 catégories :

<div class="grid-2">
<div class="card">

### ⚙️ 1. Les Labs Techniques
- *Exemples* : **Laravel, Kotlin, Alpine.js, PHP, PHP Native (Mobile)**
- *Objectif* : Installer, coder, exécuter.
- *Règle obligatoire* : **Doivent impérativement inclure un Quick Start & un Hello World fonctionnel**.

</div>
<div class="card">

### 📋 2. Les Labs Méthodologiques
- *Exemples* : **Lab Planning, Architecture, Conception**
- *Objectif* : Organiser, cadrer, modéliser.
- *Règle* : **Pas de Hello World de code requis**, mais des règles, des processus et des livrables concrets.

</div>
</div>

---

## ⚠️ Problème : Pourquoi ce Lab Planning ?

### 😵 Le constat en classe : *« Chacun fait ce qu'il veut »*

| Problème Actuel | Conséquence Directe |
|:---|:---|
| **Aucune structure commune** | Chaque étudiant invente son propre plan de présentation |
| **Pas de définitions des notions** | L'audience ne comprend pas les termes spécifiques |
| **Absence d'explication du besoin** | On présente des solutions sans expliquer le problème résolu |
| **Labs techniques sans Hello World** | Les camarades ne peuvent pas tester rapidement |
| **Confusion entre technique et méthode** | On mélange code et méthodologie sans cohérence |

> *« Ce manque d'harmonisation freine la progression collective de notre classe. »*

---

<!-- _class: light -->

## 💡 Solution : La Règle d'Or de Chaque Lab

Désormais, chaque lab présenté en classe suit rigoureusement ces 6 étapes :

1. 🏷️ **Slide 1 — Titre, Étudiant & Encadrant** (*Mesbahi Mohammed Yassir / Fouad Essarraj*)
2. 📋 **Slide 2 — Plan de Présentation** (*Intro & Stack, Définitions, Problème, Solution*)
3. 🛠️ **Slide 3 — Stack Technique** (*Rôle précis des technologies mobilisées*)
4. 📖 **Slide 4 — Définitions** (*Explication de ce que tout développeur ne sait pas*)
5. ⚠️ **Slide 5 — Problème** (*Pourquoi ce lab précis est nécessaire*)
6. 🚀 **Slide 6+ — Solution Adaptée** :
   - *Si Lab Technique* ➔ **Quick Start + Hello World obligatoire**
   - *Si Lab Méthodologique* ➔ **Processus, règles et modèles concrets**

---

## 📦 Livrable Pratique : `template-lab.md`

Pour que toute la classe applique la solution sans difficulté, un template universel est mis à disposition :

- 📁 **Fichier ressource** : `template-lab.md` (disponible à la racine du projet)
- ⚙️ **Adaptabilité automatique** :
  - Section technique avec zone *Quick Start / Hello World* pré-configurée
  - Variantes prévues pour les labs méthodologiques
- ⏱️ **Gain de temps** : Prêt en 2 minutes pour n'importe quel sujet (Laravel, Kotlin, Alpine...)
