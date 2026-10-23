# Lab : Comprendre Laravel et l'architecture MVC

---

## 1. Titre
Comprendre Laravel et l'architecture Modèle-Vue-Contrôleur (MVC)

---

## 2. Introduction / Mise en situation
Dans un cursus de développement web, la transition entre le PHP natif et un framework moderne constitue une étape charnière. 

Ce lab s'inscrit dans un scénario pédagogique de différenciation : à la suite d'une session de livecoding, les apprenants ayant validé leurs prérequis progressent en autonomie sur l'écosystème Laravel pour approfondir leurs compétences sans temps mort, pendant que la remédiation s'opère pour le reste du groupe.

Le projet fil conducteur est une application minimale de suivi de tâches (**Task Tracker**). Ce scénario permet d'isoler et d'expérimenter chaque maillon de la chaîne MVC (Route, Contrôleur, Modèle, Vue) sans être distrait par une complexité métier excessive.

---

## 3. Stack technique
- **PHP (8.2+)** : langage backend exécuté sur le serveur.
- **Composer** : gestionnaire de dépendances officiel de l'écosystème PHP.
- **Laravel (11.x)** : framework d'application web fournissant l'arborescence, le routeur et l'outillage MVC.
- **Blade** : moteur de gabarits (templating) intégré à Laravel pour le rendu HTML.
- **CLI Artisan & Serveur de développement** : outil en ligne de commande de Laravel (`php artisan serve`) pour générer les composants et exécuter le serveur local.

---

## 4. Définitions
- **Framework** : socle logiciel composé de bibliothèques et d'une structure standardisée + fournit le squelette prêt à l'emploi évitant de réécrire l'architecture technique de base.
- **Laravel** : framework PHP moderne axé sur une syntaxe expressive et des conventions éprouvées + cadre applicatif principal manipulé dans ce lab.
- **Architecture MVC (Modèle-Vue-Contrôleur)** : patron de conception qui sépare l'application en trois composants distincts (données, affichage, orchestration) + structure fondamentale guidant l'organisation du code dans Laravel.
- **Route (`routes/web.php`)** : point d'entrée associant une URL et un verbe HTTP (GET, POST, etc.) à une action applicative + intercepte la requête du navigateur et l'oriente vers le contrôleur approprié.
- **Contrôleur (`Controller`)** : classe PHP contenant des méthodes (actions) chargées de traiter la requête + joue le rôle de chef d'orchestre mince qui prépare les données et sélectionne la vue à retourner.
- **Vue Blade (`resources/views/`)** : fichier contenant la structure HTML et des directives spécifiques (`{{ }}`, `@foreach`) + assure le rendu visuel sécurisé destiné au navigateur sans intégrer de logique métier.
- **Modèle (`Model`)** : classe représentant une entité et interagissant avec les données + encapsule la manipulation des données (introduit conceptuellement dans ce lab pour finaliser le cycle MVC).

---

## 5. Problème(s)
1. **Hétérogénéité des rythmes après le livecoding** : Les apprenants ayant validé avec succès l'évaluation pratique risquent une perte de dynamique et d'engagement s'ils doivent attendre passivement la fin des sessions de rattrapage.
2. **Code « spaghetti » en PHP natif** : En PHP procédural classique, la gestion des URL, les requêtes SQL, la logique applicative et l'affichage HTML sont fréquemment fusionnés dans un même fichier (`index.php`), rendant le code difficile à lire, à tester et à maintenir.
3. **Absence de conventions d'équipe** : Sans structure imposée, chaque développeur structure son projet différemment, compliquant la collaboration et l'intégration des standards de l'industrie.

---

## 6. Solution(s)
1. **Parcours autonome guidé** : Mise à disposition d'un lab technique balisé permettant aux étudiants avancés d'entrer directement dans l'apprentissage de Laravel de façon autonome et productive.
2. **Séparation stricte des responsabilités (MVC)** :
   - **Route** : aiguille la requête HTTP sans exécuter de logique métier.
   - **Contrôleur mince** : coordonne les données nécessaires sans générer de balises HTML.
   - **Vue Blade** : se charge exclusivement de la présentation des données reçues.
3. **Conventions industrielles de Laravel** : Exploitation de l'arborescence native et des commandes Artisan pour garantir un code modulaire, lisible et conforme aux bonnes pratiques de l'industrie.

---

## 7. Séquence pratique

### Étape 1 : Initialiser le projet et repérer l'arborescence
1. Ouvrez un terminal dans votre dossier de travail et créez une nouvelle application Laravel :
   ```bash
   composer create-project laravel/laravel:^11.0 task-tracker
   cd task-tracker
   ```
2. Explorez les répertoires clés liés au modèle MVC :
   - `routes/web.php` : déclaration des routes web.
   - `app/Http/Controllers/` : contrôleurs de l'application.
   - `resources/views/` : vues Blade.
   - `app/Models/` : modèles de données.

*Résultat attendu :* Le projet est créé avec son arborescence standardisée.

---

### Étape 2 : Démarrer le serveur local
1. Lancez le serveur de développement intégré :
   ```bash
   php artisan serve
   ```
2. Ouvrez votre navigateur sur `http://127.0.0.1:8000`.

*Résultat attendu :* La page d'accueil par défaut de Laravel s'affiche avec succès.

---

### Étape 3 : Créer une route web dédiée
1. Ouvrez le fichier `routes/web.php`.
2. Ajoutez une route simple pour prévisualiser l'URL `/tasks` :
   ```php
   use Illuminate\Support\Facades\Route;

   Route::get('/tasks', function () {
       return 'Bienvenue sur la liste des tâches !';
   });
   ```
3. Visitez `http://127.0.0.1:8000/tasks` dans le navigateur.

*Résultat attendu :* Le texte brut s'affiche dans le navigateur, confirmant la prise en charge de la route.

---

### Étape 4 : Générer un contrôleur mince
1. Dans votre terminal, utilisez l'outil Artisan pour générer un contrôleur dédié :
   ```bash
   php artisan make:controller TaskController
   ```
2. Ouvrez le fichier créé `app/Http/Controllers/TaskController.php` et définissez la méthode `index` avec un jeu de données simulé :
   ```php
   <?php

   namespace App\Http\Controllers;

   use Illuminate\Http\Request;
   use Illuminate\View\View;

   class TaskController extends Controller
   {
       /**
        * Affiche la liste des tâches.
        */
       public function index(): View
       {
           $tasks = [
               ['id' => 1, 'title' => 'Comprendre le rôle des Routes', 'done' => true],
               ['id' => 2, 'title' => 'Créer un contrôleur mince', 'done' => true],
               ['id' => 3, 'title' => 'Afficher les données avec Blade', 'done' => false],
           ];

           return view('tasks.index', compact('tasks'));
       }
   }
   ```
3. Reliez ce contrôleur dans `routes/web.php` en remplaçant la fermeture précédente :
   ```php
   use App\Http\Controllers\TaskController;

   Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
   ```

*Résultat attendu :* La route délègue désormais le traitement au contrôleur. Une erreur de vue manquante `View [tasks.index] not found` apparaît si vous visitez l'URL : c'est le comportement attendu avant l'étape 5.

---

### Étape 5 : Créer la vue Blade
1. Créez le dossier `resources/views/tasks/`.
2. Créez le fichier `resources/views/tasks/index.blade.php` avec le contenu suivant :
   ```blade
   <!DOCTYPE html>
   <html lang="fr">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Task Tracker - Architecture MVC</title>
       <style>
           body { font-family: system-ui, sans-serif; margin: 40px; background-color: #f8fafc; color: #1e293b; }
           h1 { color: #0f172a; border-bottom: 2px solid #0d9488; padding-bottom: 8px; }
           ul { list-style: none; padding: 0; }
           li { background: #fff; padding: 12px 16px; margin-bottom: 8px; border-radius: 6px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
           .badge-done { color: #15803d; font-weight: bold; }
           .badge-pending { color: #b45309; font-weight: bold; }
       </style>
   </head>
   <body>
       <h1>Liste des tâches (Vue Blade)</h1>
       <p>Données fournies par <code>TaskController</code> via l'architecture MVC.</p>
       
       <ul>
           @foreach ($tasks as $task)
               <li>
                   <span>{{ $task['title'] }}</span>
                   - 
                   @if ($task['done'])
                       <span class="badge-done">Terminée</span>
                   @else
                       <span class="badge-pending">En cours</span>
                   @endif
               </li>
           @endforeach
       </ul>
   </body>
   </html>
   ```
3. Rafraîchissez la page `http://127.0.0.1:8000/tasks`.

*Résultat attendu :* La liste des tâches s'affiche avec la mise en page HTML propre générée par le moteur Blade.

---

### Étape 6 : Synthèse du cycle de vie de la requête
Tracez mentalement le parcours d'une requête HTTP dans Laravel :
1. **Requête HTTP** : L'utilisateur accède à `/tasks`.
2. **Route (`routes/web.php`)** : La route intercepte la méthode `GET /tasks` et appelle `TaskController@index`.
3. **Contrôleur (`TaskController`)** : Prépare la liste des tâches et appelle `view('tasks.index', ...)`.
4. **Vue (`resources/views/tasks/index.blade.php`)** : Compile le HTML dynamique avec les données reçues.
5. **Réponse HTTP** : Laravel renvoie la page HTML compilée au navigateur (code 200).

---

## 8. Validation

### Critères d'acceptation observables
- [ ] Le serveur de développement s'exécute localement avec la commande `php artisan serve`.
- [ ] La route `GET /tasks` est enregistrée dans `routes/web.php` et accessible avec un code HTTP `200`.
- [ ] Le contrôleur `TaskController` reste **mince** : aucune balise HTML n'y est concaténée.
- [ ] La vue `resources/views/tasks/index.blade.php` utilise la syntaxe Blade (`@foreach`, `@if`, `{{ }}`) pour afficher la collection.
- [ ] L'apprenant est capable d'expliquer oralement ou sous forme de schéma les 5 étapes du cycle de vie d'une requête MVC dans Laravel.
