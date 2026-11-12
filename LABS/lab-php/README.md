# lab-php : Approfondir les bases de PHP

Ce lab permet de découvrir et pratiquer trois notions avancées de PHP : les exceptions, les namespaces et les traits.
Ces notions rendent le code du projet technique plus propre, plus solide et plus facile à organiser.

- **Étudiant :** El Faquihi Ayoub
- **Encadrant :** ES-SARRAJ Fouad
- **Projet technique de référence :** Podcast Directory Management

---

## 1. Besoin du projet technique

- **Le problème rencontré par l'étudiant :** Il devient très difficile de trouver l'origine et le type exact des erreurs dans le code. De plus, nous voulons être prêts pour le prochain module sur Laravel.
- **La solution proposée par l'étudiant :** Apprendre à utiliser les notions avancées de PHP (les exceptions, les namespaces et les traits) pour mieux organiser le code et être bien préparé pour Laravel.
- **Pourquoi ce lab est nécessaire :** Notre application grandit. Sans structure solide, des erreurs arrêtent le site et des classes peuvent avoir le même nom.
- **Ce que ça apporte au projet technique :**
  - Moins de pannes imprévues grâce à la gestion des exceptions.
  - Aucun conflit de noms grâce aux namespaces.
  - Moins de code dupliqué grâce aux traits réutilisables.

**L'IA peut apporter :**
- Des exemples simples et directement exécutables.
- Des explications claires mot par mot en français simple (niveau A1).
- Des commandes prêtes pour tester chaque concept dans le terminal.

---

## 2. Notions et techniques à apprendre

### Notions de base :
1. **Gestion des erreurs et exceptions :** Détecter une donnée invalide et arrêter le traitement proprement avec un message d'erreur.
2. **Namespaces (Espaces de noms) :** Ranger les classes dans des dossiers virtuels pour éviter les conflits de noms.
3. **Traits :** Partager des méthodes entre plusieurs classes sans utiliser d'héritage lourd.

### Techniques :
1. Utiliser les mots-clés `try`, `catch`, `finally` et `throw`.
2. Déclarer un `namespace` et importer des classes avec `use` et des alias (`as`).
3. Créer un `trait` et l'inclure dans une classe avec le mot-clé `use`.

**L'IA peut apporter :**
- Un tutoriel pas à pas pour chaque dossier.
- Des tests unitaires manuels faciles à reproduire.

---

## 3. Réalisation attendue

### Forme et structure des dossiers :
```text
lab-php/
├── README.md                      # Documentation principale du lab
├── presentation.md                # Support de présentation Marp
├── 01-exceptions/
│   ├── example.php                # Script PHP exécutable sur les exceptions
│   └── tutorial.md                # Tutoriel pas à pas
├── 02-namespaces/
│   ├── example.php                # Script PHP exécutable sur les namespaces
│   └── tutorial.md                # Tutoriel pas à pas
└── 03-traits/
    ├── example.php                # Script PHP exécutable sur les traits
    └── tutorial.md                # Tutoriel pas à pas
```

### Synthèse des notions et exemples du lab :

| Dossier | Notion | Rôle principal | Exemple dans le projet | Commande d'exécution |
| :--- | :--- | :--- | :--- | :--- |
| `01-exceptions/` | Exceptions | Détecter et traiter les erreurs | Valider le titre et la durée d'un podcast | `php lab-php/01-exceptions/example.php` |
| `02-namespaces/` | Namespaces | Ranger les classes sans collision | Séparer le podcast local et le flux RSS externe | `php lab-php/02-namespaces/example.php` |
| `03-traits/` | Traits | Partager du code réutilisable | Générer un slug d'URL pour podcasts et catégories | `php lab-php/03-traits/example.php` |

---

## Démarrage rapide (Quick Start) & Hello World

### Prérequis
- **PHP CLI :** PHP version 8.2 ou supérieure installée (Version vérifiée sur la machine : PHP 8.5).
- Aucun serveur web ni base de données requis pour ces tests.

### 1. Vérifier PHP
Ouvrez un terminal et tapez :
```bash
php -v
```

### 2. Exemple rapide "Hello World"
Créez ou exécutez un test rapide pour vérifier PHP :
```bash
php -r "echo 'Bienvenue dans le Lab PHP Approfondissement !' . PHP_EOL;"
```

### 3. Exécuter tous les exemples du lab
Depuis la racine du projet, lancez :
```bash
# Test 1 : Exceptions
php lab-php/01-exceptions/example.php

# Test 2 : Namespaces
php lab-php/02-namespaces/example.php

# Test 3 : Traits
php lab-php/03-traits/example.php
```

### Critères de succès :
- Chaque script PHP s'exécute avec le code de sortie `0`.
- Aucun avertissement ni erreur de syntaxe PHP (`php -l`).
- Les messages affichés dans la console confirment la bonne exécution des trois notions.

