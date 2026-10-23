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

# Comprendre Laravel et l'Architecture MVC

## Découverte et prise en main pratique en autonomie post-livecoding

---

# INTRODUCTION
## Mise en situation & Cadre pédagogique

- **Contexte :** Fin d'évaluation pratique de livecoding PHP
- **Opportunité :** Parcours d'approfondissement autonome pour les apprenants ayant validé leurs acquis
- **Finalité :** Transition immédiate vers un framework moderne sans attendre la fin des remédiations
- **Projet support :** Découverte du flux applicatif à travers un mini-projet fil conducteur

---

# PLAN DE LA PRÉSENTATION

- 1. Stack technique
- 2. Problématique
- 3. Définitions clés
- 4. Solutions architecturales
- 5. Séquence pratique (Quick Start & Hello World)
- 6. Validation

---

# STACK TECHNIQUE
## Environnement et composants requis

- **PHP (8.2+) :** Langage backend serveur moderne
- **Composer :** Gestionnaire officiel de dépendances pour l'écosystème PHP
- **Laravel (11.x) :** Framework applicatif basé sur le patron d'architecture MVC
- **Blade :** Moteur de gabarits (templates) intégré pour générer les vues HTML
- **Artisan CLI :** Outil en ligne de commande pour le scaffolding et le serveur de développement

---

# PROBLÉMATIQUE
## Défis pédagogiques & contraintes techniques

- **Hétérogénéité des rythmes :** Risque de perte de temps pour les étudiants ayant réussi le livecoding pendant la remédiation des autres
- **Code spaghetti en PHP natif :** Mélange de requêtes, de logique métier et de code HTML dans un fichier unique
- **Absence de conventions :** Difficulté de maintenance et manque de repères communs au sein d'une équipe
- **Besoin d'autonomie :** Nécessité d'une démarche balisée pour apprendre sans solliciter le formateur en continu

---

# DÉFINITIONS
## Vocabulaire fondamental du lab

- **Framework :** Structure logicielle préétablie apportant des bibliothèques et des conventions éprouvées
- **Laravel :** Framework PHP axé sur la productivité, le routage déclaratif et la sécurité
- **Architecture MVC :** Séparation en trois couches distinctes : Modèle (données), Vue (interface) et Contrôleur (aiguillage)
- **Contrôleur mince (*Thin Controller*) :** Contrôleur qui orchestre les requêtes sans contenir de logique lourde ni de HTML
- **Blade :** Moteur de templating compilé en PHP natif pour un rendu lisible et sécurisé

---

<!-- _class: solution -->

# SOLUTIONS
## Réponses pédagogiques et architecturales

- **Parcours en autonomie :** Montée en compétences sur Laravel pour rentabiliser le temps post-évaluation
- **Découplage MVC :** Les routes aiguillent, les contrôleurs minces orchestrent, Blade assure la présentation
- **Productivité Artisan :** Génération rapide du squelette applicatif sans configuration manuelle lourde
- **Code propre et maintenable :** Adoption immédiate des standards de l'industrie logicielle

---

# SÉQUENCE PRATIQUE
## 1. Quick Start : Initialisation du projet

- **Création du squelette Laravel :**
  ```bash
  composer create-project laravel/laravel:^11.0 task-tracker
  cd task-tracker
  ```
- **Démarrage du serveur de développement local :**
  ```bash
  php artisan serve
  ```
- **Résultat attendu :** L'application est immédiatement accessible sur `http://127.0.0.1:8000`

---

# SÉQUENCE PRATIQUE
## 2. Hello World : Route & Contrôleur mince

- **Génération du contrôleur avec Artisan :**
  ```bash
  php artisan make:controller HomeController
  ```
- **Action dans `app/Http/Controllers/HomeController.php` :**
  ```php
  public function index(): \Illuminate\View\View {
      $message = "Bienvenue dans l'architecture MVC avec Laravel !";
      return view('home', compact('message'));
  }
  ```
- **Déclaration de la route dans `routes/web.php` :**
  ```php
  use App\Http\Controllers\HomeController;
  Route::get('/', [HomeController::class, 'index'])->name('home');
  ```

---

# SÉQUENCE PRATIQUE
## 3. Hello World : Vue Blade

- **Création du template dans `resources/views/home.blade.php` :**
  ```blade
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <title>Mon Premier Lab Laravel MVC</title>
  </head>
  <body>
      <h1>{{ $message }}</h1>
      <p>Flux validé : Route -> Contrôleur mince -> Vue Blade.</p>
  </body>
  </html>
  ```
- **Résultat attendu :** Le navigateur affiche le titre dynamique injecté par le contrôleur mince

---

# VALIDATION
## Critères d'acceptation observables

- [ ] Le serveur local s'exécute correctement via `php artisan serve`
- [ ] La route principale `/` répond avec un code de statut HTTP `200`
- [ ] Le contrôleur `HomeController` respecte le principe de contrôleur mince sans HTML concaténé
- [ ] La vue `home.blade.php` restitue la variable `$message` via la syntaxe Blade `{{ }}`
- [ ] Le flux complet (Requête $\rightarrow$ Route $\rightarrow$ Contrôleur $\rightarrow$ Vue $\rightarrow$ Réponse) est vérifié
