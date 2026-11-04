# Todo : Lab PHP OOP Service, BaseService et DAO

## Phase 1 — Préparation

- [ ] Vérifier PHP 8.1 ou plus récent avec `php -v`.
- [ ] Créer l'arborescence du projet et le fichier `storage/categories.json` contenant `[]`.
- [ ] Relire le schéma et savoir expliquer le rôle du Controller, Service, DAO et Entity.

## Phase 2 — Architecture PHP

- [ ] Créer l'Entity `Category`.
- [ ] Créer `CategoryDAO` avec `findAll()` et `save()`.
- [ ] Créer `BaseService` avec les méthodes communes.
- [ ] Créer `CategoryService extends BaseService` et appliquer les règles métier.
- [ ] Créer `CategoryController` et lui faire appeler le Service.
- [ ] Vérifier que seul le DAO lit et écrit le fichier JSON.

## Phase 3 — Flux HTTP et navigateur

- [ ] Créer le point d'entrée HTTP `public/index.php`.
- [ ] Gérer les réponses `201`, `400`, `404`, `422` et `500`.
- [ ] Créer le formulaire dans `public/index.html`.
- [ ] Envoyer les données avec `fetch()` et afficher le résultat ou l'erreur.
- [ ] Lancer le serveur PHP et créer une catégorie depuis le navigateur.

## Phase 4 — Vérifications

- [ ] Vérifier que la catégorie est présente dans `storage/categories.json`.
- [ ] Vérifier qu'un nom vide reçoit une réponse `422`.
- [ ] Vérifier qu'un doublon sans différence de casse reçoit une réponse `422`.
- [ ] Vérifier qu'un JSON invalide reçoit une réponse `400`.
- [ ] Expliquer pourquoi le fichier JSON convient à l'exercice, mais pas à une application multi-utilisateur.

## Phase 5 — Présentation et défi

- [ ] Relire [la présentation](php-oop-service-baseservice-dao.md).
- [ ] Faire une démonstration de la création et du rejet d'un doublon.
- [ ] Expliquer l'héritage de `BaseService` par `CategoryService`.
- [ ] Réaliser le mini-défi : refuser un nom de plus de 80 caractères.
