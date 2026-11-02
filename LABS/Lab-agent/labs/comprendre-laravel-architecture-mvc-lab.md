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

## Parcours autonome post-livecoding pour apprendre Laravel sans perdre de temps

---

# PLAN DE LA PRÉSENTATION

- 1. Introduction / Mise en situation
- 2. Stack technique
- 3. Problématique
- 4. Définitions
- 5. Solutions
- 6. Quick Start
- 7. Hello World
- 8. Validation

---

# INTRODUCTION
## Contexte & Objectif pédagogique

- **Contexte :** Issue d'une session de livecoding créant deux niveaux d'avancement dans la classe
- **Opportunité formateur :** Offrir aux étudiants ayant validé l'évaluation l'opportunité de monter en compétences sur Laravel
- **Objectif :** Découvrir le framework Laravel et assimiler l'architecture Modèle-Vue-Contrôleur (MVC)
- **Utilité pratique :** Permettre un apprentissage immédiat, guidé et rentable sans perte de temps

---

# STACK TECHNIQUE
## Technologies issues du catalogue

- **Laravel :** Framework PHP professionnel pour implémenter l'architecture MVC et le routage
- **PHP natif :** Socle de programmation validé lors du livecoding et moteur d'exécution de Laravel
- **Tailwind CSS :** Outil de mise en page moderne pour styliser rapidement les vues du projet
- **MySQL :** Base de données relationnelle cible pour les futurs modèles de données

---

# PROBLÉMATIQUE
## Hétérogénéité post-livecoding et gestion du temps

- **Échec partiel au livecoding :** Plusieurs étudiants n'ont pas validé l'évaluation et mobilisent le formateur pour la remédiation
- **Risque d'inactivité (*wasting time*) :** Les étudiants ayant réussi risquent de stagner et de perdre leur temps sans activité dédiée
- **Indisponibilité du professeur :** Impossible de dispenser un cours magistral simultané pour les étudiants en avance
- **Besoin d'un support auto-porteur :** Nécessité d'un lab technique clair permettant d'apprendre Laravel et le MVC en pleine autonomie

---

# DÉFINITIONS
## Concepts clés pour progresser en autonomie

- **Framework :** Structure applicative standardisée évitant de réécrire la mécanique de base du web
- **Architecture MVC :** Organisation séparant les données (**Modèle**), l'interface (**Vue**) et l'aiguillage (**Contrôleur**)
- **Route :** Déclaration associant une URL demandée par l'utilisateur à une action du code
- **Contrôleur mince :** Classe intermédiaire coordonnant la requête et la vue sans contenir de code HTML
- **Blade :** Moteur de gabarits intégré à Laravel pour générer des vues propres et sécurisées

---

<!-- _class: solution -->

# SOLUTIONS
## Réponses au besoin d'apprentissage autonome

- **Exploitation optimale du temps :** Opportunité immédiate pour les étudiants reçus d'explorer Laravel sans attendre la fin des rattrapages
- **Apprentissage guidé du MVC :** Décomposition pas à pas du cycle Requête $\rightarrow$ Route $\rightarrow$ Contrôleur $\rightarrow$ Vue
- **Lab auto-apprenant :** Instructions détaillées et reproductibles ne nécessitant pas l'intervention continue du professeur
- **Transition vers le monde professionnel :** Mise en pratique concrète des standards modernes de développement backend

---

# QUICK START
## Prérequis et initialisation autonome

- **Création du projet avec Composer :**
  ```bash
  composer create-project laravel/laravel:^11.0 task-tracker
  cd task-tracker
  ```
- **Lancement du serveur local :**
  ```bash
  php artisan serve
  ```
- **Résultat attendu :** L'application est opérationnelle sur `http://127.0.0.1:8000`

---

# HELLO WORLD
## 1. Création de la Route et du Contrôleur mince

- **Génération du contrôleur via Artisan :**
  ```bash
  php artisan make:controller HomeController
  ```
- **Contrôleur mince (`app/Http/Controllers/HomeController.php`) :**
  ```php
  public function index(): \Illuminate\View\View {
      $message = "Hello World : Bienvenue sur Laravel MVC !";
      return view('home', compact('message'));
  }
  ```
- **Déclaration dans `routes/web.php` :**
  ```php
  use App\Http\Controllers\HomeController;
  Route::get('/', [HomeController::class, 'index'])->name('home');
  ```

---

# HELLO WORLD
## 2. Création de la Vue Blade

- **Création du fichier `resources/views/home.blade.php` :**
  ```blade
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <title>Hello World - Laravel MVC</title>
  </head>
  <body class="bg-slate-50 text-slate-800 p-8 font-sans">
      <h1 class="text-3xl font-bold text-teal-700">{{ $message }}</h1>
      <p class="mt-3 text-slate-600">Flux validé : Requête -> Route -> Contrôleur mince -> Vue Blade.</p>
  </body>
  </html>
  ```
- **Résultat attendu :** Accéder à `http://127.0.0.1:8000` affiche le titre dynamique sans erreur

---

# VALIDATION
## Critères d'acceptation observables en autonomie

- [ ] Le serveur de développement tourne avec succès via `php artisan serve`
- [ ] La page d'accueil `/` répond avec un code HTTP `200`
- [ ] Le contrôleur `HomeController` reste mince (délègue à la vue sans injecter de balises HTML)
- [ ] La variable `$message` est correctement affichée dans la vue Blade via `{{ }}`
- [ ] L'étudiant a validé par lui-même le flux MVC complet sans bloquer le formateur
