# 1. Les trois composants de MVC

MVC signifie **Model – View – Controller** (Modèle – Vue – Contrôleur). C’est une architecture qui sépare une application en trois parties pour rendre le code plus clair et plus facile à maintenir.

## 1.1 Le Model (Modèle)

Le **Model** gère les données de l’application et leur accès, généralement depuis une base de données.

**Exemple :** dans une application de gestion de catégories, le modèle `Categorie` représente les catégories.

```php
// app/Models/Categorie.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    // Laravel peut gérer les opérations sur la table associée.
}
```

**Son rôle :**
- Représenter les données.
- Lire, ajouter, modifier ou supprimer des données via la base de données.
- Participer à la logique liée aux données.

## 1.2 La View (Vue)

La **View** s’occupe de l’affichage : c’est ce que l’utilisateur voit dans le navigateur. Avec Laravel, les vues utilisent généralement le moteur de templates **Blade**.

**Exemple :** afficher la liste des catégories.

```blade
<!-- resources/views/categories.blade.php -->
<h1>Liste des catégories</h1>

<ul>
    @foreach ($categories as $categorie)
        <li>{{ $categorie->nom }}</li>
    @endforeach
</ul>
```

**Son rôle :**
- Afficher les informations.
- Présenter les données de manière lisible.
- Fournir des éléments d’interface à l’utilisateur.

## 1.3 Le Controller (Contrôleur)

Le **Controller** reçoit la requête, coordonne le traitement et renvoie une réponse. Il peut demander des données au modèle, puis transmettre ces données à une vue.

**Exemple :** récupérer toutes les catégories et les envoyer à la vue.

```php
// app/Http/Controllers/CategorieController.php
namespace App\Http\Controllers;

use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();

        return view('categories', compact('categories'));
    }
}
```

**Son rôle :**
- Traiter la requête reçue.
- Appeler le modèle lorsque des données sont nécessaires.
- Choisir la vue à afficher ou retourner une autre réponse, comme du JSON.

## Résumé

| Composant | Rôle principal | Exemple |
|---|---|---|
| **Model** | Gérer les données | Récupérer les catégories depuis la base de données |
| **View** | Afficher les données | Afficher les catégories dans une page HTML |
| **Controller** | Coordonner le traitement | Récupérer les catégories et les transmettre à la vue |

**À retenir :** le Model s’occupe des données, la View de l’affichage et le Controller fait le lien entre la requête, les données et la réponse.
