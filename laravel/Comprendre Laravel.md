---
marp: true
theme: default
paginate: true
footer: "DÉCOUVERTE DE LARAVEL • SOLICODE"
style: |
  section {
    font-family: 'Inter', 'Segoe UI', sans-serif;
    background: #0f172a;
    color: #f8fafc;
    padding: 55px 65px;
    font-size: 23px;
  }
  h1 {
    color: #ff5a5f;
    font-size: 2.1em;
    font-weight: 800;
  }
  h2 {
    color: #ff5a5f;
    font-size: 1.6em;
    border-bottom: 2px solid #334155;
    padding-bottom: 10px;
  }
  h3 {
    color: #f8fafc;
  }
  strong {
    color: #ff777b;
  }
  section.cover {
    background: linear-gradient(135deg, #0f172a 40%, #30151f 100%);
    text-align: center;
    justify-content: center;
  }
  section.cover h1 {
    font-size: 3.1em;
    margin-bottom: 10px;
  }
  section.cover h2 {
    color: #cbd5e1;
    font-size: 1.15em;
    border: none;
  }
  section.lead {
    justify-content: center;
  }
  .subtitle {
    color: #94a3b8;
    font-size: 1.1em;
  }
  .accent {
    color: #ff5a5f;
    font-weight: bold;
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
    margin-top: 25px;
  }
  .card {
    background: #1e293b;
    border: 1px solid #334155;
    border-radius: 14px;
    padding: 18px 22px;
  }
  .card h3 {
    margin: 0 0 8px 0;
    color: #ff777b;
    font-size: 1.05em;
  }
  .card p {
    margin: 0;
    font-size: 0.8em;
    color: #cbd5e1;
  }
  .pill {
    display: inline-block;
    color: #ff777b;
    background: #3b202b;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.7em;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.82em;
  }
  th {
    background: #3b202b;
    color: #ff999c;
  }
  td, th {
    padding: 12px;
    border: 1px solid #334155;
  }
  section.final {
    text-align: center;
    justify-content: center;
  }
---

<!-- _class: cover -->

# DÉCOUVERTE<br>DE LARAVEL

## Le framework PHP pour développer des applications Web

<br>

<span class="pill">PHP</span> &nbsp; <span class="pill">BACKEND</span> &nbsp; <span class="pill">MVC</span>

<br><br>

**SOLICODE** · Développement Web

---

<!-- _class: lead -->

# 01 — Qu’est-ce que Laravel ?

<span class="subtitle">Un framework pour mieux développer avec PHP.</span>

<br>

<div class="card">

Laravel est un **framework open source écrit en PHP** qui permet de développer des applications Web de manière plus rapide, organisée et sécurisée.

</div>

<br>

- **Framework :** un ensemble d'outils et de règles pour structurer une application.
- **Open source :** son code source est accessible et sa communauté contribue à son évolution.
- **PHP :** le langage utilisé principalement pour exécuter la logique côté serveur.

---

# 02 — Quel est son rôle ?

<span class="subtitle">Laravel agit principalement sur la partie backend.</span>

<div class="grid">
<div class="card">

### 01 · Recevoir

Le navigateur envoie une requête HTTP au serveur.

</div>
<div class="card">

### 02 · Traiter

Laravel exécute la logique métier et valide les données.

</div>
<div class="card">

### 03 · Communiquer

Il peut lire ou modifier les données dans la base de données.

</div>
<div class="card">

### 04 · Répondre

Il renvoie une page HTML, des données JSON ou une autre réponse HTTP.

</div>
</div>

<br>

**Exemple :** un utilisateur demande la liste des livres d'une bibliothèque. Laravel récupère les livres et renvoie les résultats.

---

# 03 — Les avantages de Laravel

<div class="grid">
<div class="card">

### ⚡ Développement rapide

Des outils intégrés évitent de réécrire les fonctionnalités courantes.

</div>
<div class="card">

### 🧩 Code organisé

L'architecture MVC sépare les responsabilités et facilite la maintenance.

</div>
<div class="card">

### 🛡️ Sécurité

Des mécanismes aident à protéger les formulaires, gérer l'authentification et valider les données.

</div>
<div class="card">

### 🔧 Maintenance facilitée

Un code structuré est plus simple à comprendre, tester et faire évoluer en équipe.

</div>
</div>

---

# 04 — Laravel et le développement Web

<span class="subtitle">Un même framework, plusieurs types d'applications.</span>

| Type d’application | Exemple concret |
|:--|:--|
| **Site dynamique** | Blog, site d’actualités |
| **Application de gestion** | Bibliothèque, gestion scolaire |
| **E-commerce** | Catalogue, panier, commandes |
| **API REST** | Backend pour React ou une application mobile |
| **Plateforme SaaS** | Gestion de projets, facturation |

<br>

<div class="card">

**À retenir :** Laravel peut servir à créer des applications Web complètes ou uniquement leur backend, selon les besoins du projet.

</div>

---

<!-- _class: final -->

# LARAVEL

## Organiser. Développer. Faire évoluer.

<br>

<span class="subtitle">Prochaine étape : comprendre l’architecture MVC.</span>

<br><br>

<span class="pill">MODEL</span> &nbsp; <span class="pill">VIEW</span> &nbsp; <span class="pill">CONTROLLER</span>
