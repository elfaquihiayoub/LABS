# Rayon - architecture 3 tiers avec Alpine.js

Cette version autonome conserve l'entite `Rayon`, l'interface Tailwind et le stockage JSON. Alpine.js gere l'interactivite dans la couche Presentation (`frontend/`); les traitements et l'acces aux donnees restent dans le backend PHP. Les operations de modification et de suppression sont disponibles sans changer le contrat de l'API.

Support pedagogique : [presentation](../Presentation-alpinejs-reactive-frontend.md), [Lab Alpine.js](../Lab-alpinejs-reactive-frontend.md) et [checklist](../Todo-alpinejs-reactive-frontend.md).

## Structure

- `frontend/`: interface Tailwind, composant Alpine.js et appels Fetch vers l'API.
- `frontend/assets/app.js`: donnees reactives, recherche, formulaires, confirmation, notifications et requetes API.
- `backend/api/controllers/controllerRayon.php`: couche presentation, traite les requetes GET, POST, PUT et DELETE.
- `backend/services/BaseService.php`: validations et normalisation communes.
- `backend/services/RayonService.php`: regles metier du CRUD; herite de `BaseService`.
- `backend/dao/RayonDAO.php`: lecture et ecriture des donnees JSON.
- `backend/classes/Rayon.php`: entite et acces encapsule a ses proprietes.
- `backend/data/rayon.json`: stockage persistant utilise par ce module.
- `backend/tests/RayonServiceTest.php`: test du service et du DAO avec un fichier JSON temporaire.

## Lancer

Depuis ce dossier, demarrer le serveur PHP integre:

```powershell
php -S 127.0.0.1:8000 -t .
```

Ouvrir ensuite `http://127.0.0.1:8000/frontend/`. Tailwind CSS et Alpine.js sont charges depuis leurs CDN; une connexion Internet est necessaire. Les donnees utilisees sont celles de `backend/data/rayon.json`.

## Tester

```powershell
php backend/tests/RayonServiceTest.php
```

L'API accepte `GET` et `POST` sur `/backend/api/controllers/controllerRayon.php`. `PUT` et `DELETE` prennent l'identifiant avec `?id=<id>`; les requetes POST et PUT utilisent un objet JSON avec `nom` et `emplacement`.

## Interactivite Alpine.js

Le composant `rayonManager` est declare sur le conteneur de l'interface et gere ses donnees via Alpine.js. `x-model` lie la recherche et les champs aux donnees reactives; `x-for` et `x-text` rendent la liste; `x-show` et `x-transition` affichent les formulaires et la confirmation de suppression. Les evenements `@click` et `@submit.prevent` declenchent les methodes du composant. Les requetes Fetch appellent les endpoints existants; apres une reponse reussie, la liste reactive est mise a jour sans recharger la page.
