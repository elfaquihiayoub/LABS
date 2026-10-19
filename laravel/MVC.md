---
marp: true
theme: default
paginate: true
footer: "LARAVEL • ARCHITECTURE MVC • SOLICODE"
style: |
  section {
    font-family: 'Inter', 'Segoe UI', sans-serif;
    background: #0f172a;
    color: #f8fafc;
    padding: 48px 62px;
    font-size: 22px;
  }
  h1 {
    color: #ff5a5f;
    font-size: 1.9em;
    font-weight: 800;
  }
  h2 {
    color: #ff5a5f;
    font-size: 1.45em;
    border-bottom: 2px solid #334155;
    padding-bottom: 9px;
  }
  h3 {
    color: #ff777b;
  }
  strong {
    color: #ff777b;
  }
  code {
    color: #ffb4b6;
  }
  pre {
    background: #111827;
    border: 1px solid #334155;
    border-radius: 12px;
    padding: 16px 20px;
    font-size: 0.69em;
    line-height: 1.3;
  }
  section.cover {
    background: linear-gradient(135deg, #0f172a 40%, #30151f 100%);
    text-align: center;
    justify-content: center;
  }
  section.cover h1 {
    font-size: 3.1em;
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
    font-size: 0.9em;
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-top: 25px;
  }
  .card {
    background: #1e293b;
    border: 1px solid #334155;
    border-radius: 13px;
    padding: 17px;
  }
  .card h3 {
    margin-top: 0;
  }
  .card p {
    color: #cbd5e1;
    font-size: 0.78em;
  }
  .pill {
    display: inline-block;
    color: #ff999c;
    background: #3b202b;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.7em;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.8em;
  }
  th {
    background: #3b202b;
    color: #ff999c;
  }
  td, th {
    padding: 11px;
    border: 1px solid #334155;
  }
  section.final {
    text-align: center;
    justify-content: center;
  }
---

<!-- _class: cover -->

# L'ARCHITECTURE MVC

## Les trois composants de Laravel

<br>

<span class="pill">MODEL</span> &nbsp; <span class="pill">VIEW</span> &nbsp; <span class="pill">CONTROLLER</span>

<br><br>

**Comprendre comment organiser une application Web**

SOLICODE · Développement Web

---

# 01 — Qu'est-ce que MVC ?

MVC signifie **Model – View – Controller** (Modèle – Vue – Contrôleur).

C'est une architecture qui divise une application en trois composants ayant chacun une responsabilité précise.

<div class="grid">
<div class="card">

### 01 · Model

<span class="subtitle">Les données</span>

<p>Gère les données et leur accès.</p>

</div>
<div class="card">

### 02 · View

<span class="subtitle">L'affichage</span>

<p>Présente les informations à l'utilisateur.</p>

</div>
<div class="card">

### 03 · Controller

<span class="subtitle">Le traitement</span>

<p>Coordonne la requête, les données et la réponse.</p>

</div>
</div>

<br>

<span class="pill">OBJECTIF</span> Séparer les responsabilités pour faciliter la compréhension, la maintenance et l'évolution du code.

---

# 02 — Le Model (Modèle)

<span class="subtitle">Responsabilité : représenter et gérer les données.</span>

Le Model représente généralement une entité de l'application et permet d'interagir avec les données stockées dans la base de données.

### Exemple Laravel : `Categorie.php`

```php
// app/Models/Categorie.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    // Laravel fournit les opérations CRUD
    // grâce à Eloquent ORM.
}
```

<div class="card">

**Son rôle**

- Représenter les données de l'application.
- Lire, ajouter, modifier et supprimer des enregistrements.
- Participer à la logique métier liée aux données.

</div>

<span class="pill">EXEMPLE</span> Le modèle `Categorie` permet de récupérer les catégories enregistrées dans la base de données.

---

# 03 — La View (Vue)

<span class="subtitle">Responsabilité : afficher les informations.</span>

Dans Laravel, les vues utilisent généralement **Blade**, un moteur de templates qui permet de générer du HTML dynamique.

### Exemple : `categories.blade.php`

```blade
<!-- resources/views/categories.blade.php -->

<h1>Liste des catégories</h1>

<ul>
    @foreach ($categories as $categorie)
        <li>{{ $categorie->nom }}</li>
    @endforeach
</ul>
```

<div class="card">

**Son rôle**

- Afficher les informations reçues.
- Organiser les éléments de l'interface.
- Présenter les données de manière lisible.

</div>

<span class="pill">EXEMPLE</span> La vue parcourt les catégories reçues et affiche leur nom dans une liste HTML.

---

# 04 — Le Controller (Contrôleur)

<span class="subtitle">Responsabilité : coordonner le traitement d'une requête.</span>

Le Controller reçoit la requête, demande les données nécessaires au Model, puis choisit la réponse à retourner.

### Exemple : `CategorieController.php`

```php
// app/Http/Controllers/CategorieController.php

namespace App\Http\Controllers;

use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();

        return view(
            'categories',
            compact('categories')
        );
    }
}
```

<div class="card">

**Son rôle**

- Traiter la requête reçue.
- Appeler le Model pour obtenir les données.
- Transmettre les données à une View ou renvoyer une autre réponse, comme du JSON.

</div>

<span class="pill">EXEMPLE</span> `Categorie::all()` récupère les catégories et `view()` transmet les données à la vue.

---

# 05 — Comment les composants collaborent-ils ?

<span class="subtitle">Exemple : afficher la liste des catégories.</span>

<div class="card">

**01 · Utilisateur**

Demande la page `/categories`.

↓

**02 · Controller**

Reçoit la requête et appelle `Categorie::all()`.

↓

**03 · Model**

Récupère les catégories depuis la base de données.

↓

**04 · Controller**

Transmet les résultats à la vue `categories`.

↓

**05 · View**

Génère le HTML et affiche les catégories dans le navigateur.

</div>

<br>

**Important :** dans une application Laravel, la route associe généralement l'URL à la méthode du Controller.

---

# 06 — Résumé des trois composants

| Composant | Rôle principal | Exemple |
|:--|:--|:--|
| **Model** | Gérer les données | Récupérer les catégories |
| **View** | Afficher les données | Générer la liste HTML |
| **Controller** | Coordonner le traitement | Transmettre les catégories à la vue |

<br>

<div class="card">

### À retenir

**Model = données** · **View = affichage** · **Controller = coordination**

Chaque composant a une responsabilité distincte, ce qui rend l'application plus facile à maintenir et à faire évoluer.

</div>

---

<!-- _class: final -->

# MVC

## Une responsabilité par composant.

<br>

<span class="pill">MODEL · DONNÉES</span>

<br>

<span class="pill">VIEW · AFFICHAGE</span>

<br>

<span class="pill">CONTROLLER · COORDINATION</span>

<br><br>

<span class="subtitle">Prochaine étape : comprendre les routes Laravel et leur lien avec les Controllers.</span>
