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

# Apprendre à lire et résoudre des erreurs JavaScript

## Méthodologie et outils de débogage pour le développement web

---

# PLAN

- Introduction
- Problèmes (5 erreurs JavaScript fréquentes)
- Solutions (Résolution et outils de débogage)
- À RETENIR

---

# INTRODUCTION
## Comprendre et analyser les erreurs JavaScript

- Les erreurs font partie intégrante du cycle de développement d'un blog interactif
- Une erreur indique un dysfonctionnement précis : syntaxe, exécution ou communication réseau
- La console du navigateur fournit la description du problème et sa localisation exacte
- Savoir lire la pile d'exécution (*stack trace*) accélère considérablement le diagnostic

---

# INTRODUCTION
## La boîte à outils du débogueur moderne

- **Google Chrome DevTools (Console) :** Afficher les exceptions et inspecter les variables
- **Google Chrome DevTools (Network) :** Examiner les requêtes asynchrones et les réponses d'API
- **VS Code & Chrome Debugger :** Poser des points d'arrêt (*breakpoints*) et exécuter pas à pas
- **Serveur Backend (PHP) :** Diagnostiquer les réponses HTTP (codes 4xx, 500) et les formats JSON

---

# PROBLÈME 1
## TypeError: Cannot read properties of undefined (reading 'titre')

- **Situation :** Affichage d'un article de blog avant la fin du chargement des données
- **Lecture :** Le code tente d'accéder à la propriété d'un objet qui vaut `undefined` ou `null`
- **Origine :** La variable cible n'est pas encore initialisée ou la clé demandée n'existe pas
- **Impact :** Arrêt immédiat de l'exécution du script et écran blanc partiel

---

# PROBLÈME 2
## ReferenceError: submitComment is not defined

- **Situation :** Clic sur le bouton d'envoi d'un commentaire relié à une fonction JavaScript
- **Lecture :** Le moteur JavaScript ne trouve aucune déclaration correspondant à ce nom
- **Origine :** Faute de frappe dans le nom, problème de portée (*scope*) ou script non chargé
- **Impact :** L'action utilisateur reste muette et le formulaire ne réagit pas

---

# PROBLÈME 3
## SyntaxError: Unexpected token '<' in JSON at position 0

- **Situation :** Récupération de la liste des articles via `fetch()` et conversion avec `.json()`
- **Lecture :** Le parseur JSON attendait une chaîne JSON mais a reçu du HTML débutant par `<`
- **Origine :** Le serveur PHP a rencontré une erreur fatale 500 ou renvoyé une page d'erreur HTML
- **Impact :** Le traitement de la réponse plante lors de la désérialisation des données

---

# PROBLÈME 4
## Erreur HTTP 404 / 500 lors d'un appel API asynchrone

- **Situation :** Envoi d'une requête POST pour enregistrer un nouvel article de blog
- **Lecture :** L'appel réseau échoue avec un code d'erreur HTTP visible en rouge dans Network
- **Origine :** URL d'endpoint invalide (404) ou exception non capturée côté contrôleur PHP (500)
- **Impact :** L'article n'est pas persisté en base et l'interface n'affiche aucun retour

---

# PROBLÈME 5
## DOMException / TypeError: Cannot set property 'innerHTML' of null

- **Situation :** Mise à jour du conteneur de commentaires dès l'ouverture de la page
- **Lecture :** `document.querySelector('#comments-list')` a retourné `null`
- **Origine :** Le script JavaScript s'exécute avant que le navigateur ait construit le DOM
- **Impact :** L'élément HTML cible reste vide et les écouteurs d'événements échouent

---

<!-- _class: title -->

# SOLUTIONS

## Méthodes de correction et exploitation des outils de débogage

---

<!-- _class: solution -->

# SOLUTION 1
## Sécuriser l'accès aux objets et chaînage optionnel

- **Outil :** Console Chrome pour inspecter la structure réelle de l'objet retourné
- Utiliser le chaînage optionnel : `article?.titre` au lieu de `article.titre`
- Prévoir une valeur de secours : `article?.titre ?? 'Sans titre'`
- Conditionner le rendu tant que les données ne sont pas chargées

---

<!-- _class: solution -->

# SOLUTION 2
## Vérifier la portée, les imports et les déclarations

- **Outil :** Débogueur VS Code avec points d'arrêt pour visualiser les variables locales et globales
- Contrôler l'ordre d'importation des scripts dans la page HTML
- S'assurer que la fonction est accessible dans la portée d'exécution
- Corriger l'orthographe du gestionnaire d'événements et des paramètres

---

<!-- _class: solution -->

# SOLUTION 3
## Inspecter la réponse serveur dans l'onglet Network

- **Outil :** Onglet Network de Chrome DevTools, filtre Fetch/XHR, sous-onglet *Response*
- Lire le message d'erreur PHP réel retourné dans le corps HTML pour corriger le backend
- Côté serveur PHP, s'assurer de renvoyer l'en-tête `header('Content-Type: application/json')`
- Formater les erreurs serveur sous forme de JSON : `http_response_code(500); echo json_encode(...)`

---

<!-- _class: solution -->

# SOLUTION 4
## Gérer les statuts HTTP et sécuriser le bloc fetch

- **Outil :** Onglet Network (vérification de l'URL, de la méthode et du payload de la requête)
- Vérifier `response.ok` avant d'exécuter la conversion `response.json()`
- Encadrer l'appel avec `try { ... } catch (error) { ... }`
- Informer explicitement l'utilisateur via un message d'alerte en cas d'échec

---

<!-- _class: solution -->

# SOLUTION 5
## Attendre le chargement complet du DOM

- **Outil :** Console Chrome pour tester le sélecteur CSS manuellement
- Placer la balise `<script>` à la fin du `<body>` ou ajouter l'attribut `defer`
- Encapsuler le code dans l'événement : `document.addEventListener('DOMContentLoaded', ...)`
- Vérifier systématiquement que l'élément existe avant manipulation : `if (element) { ... }`

---

<!-- _class: title -->

# À RETENIR

- Lire attentivement le type d'erreur et le numéro de ligne dans la console
- Utiliser l'onglet Network pour analyser les réponses du serveur PHP
- Poser des breakpoints dans VS Code ou DevTools pour examiner l'état des variables
- Traiter systématiquement les cas limites (données absentes, erreurs serveur)
