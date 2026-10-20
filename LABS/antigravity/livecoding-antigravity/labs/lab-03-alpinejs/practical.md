# Mise en pratique : démarrer avec Alpine.js

## Installation & Démarrage

### Installation des outils pour Alpine.js

Pour cet exercice, vous avez besoin :
* d'un éditeur de texte ;
* d'un navigateur web moderne ;
* d'une connexion Internet pour charger Alpine.js depuis son CDN.

PHP, Composer et MySQL ne sont pas requis pour cet exemple : ils ne font pas partie du démarrage d'une page Alpine.js autonome.

### Démarrage rapide : Hello World

1. Créez un fichier nommé `index.html`.
2. Ajoutez le contenu suivant :

```html
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Premier pas avec Alpine.js</title>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
  <h1 x-data="{ message: 'Bonjour Alpine.js !' }" x-text="message"></h1>

  <div x-data="{ count: 0 }">
    <button type="button" @click="count++">Incrémenter</button>
    <p>Compteur : <span x-text="count"></span></p>
  </div>
</body>
</html>
```

3. Enregistrez le fichier et ouvrez-le dans votre navigateur.
4. Vérifiez que le titre « Bonjour Alpine.js ! » apparaît, puis cliquez sur « Incrémenter ».

#### Résultat attendu

La page affiche le message de bienvenue et le compteur commence à `0`. Chaque clic sur le bouton augmente sa valeur de `1`.

#### Défi

Ajoutez un bouton « Réinitialiser » qui remet le compteur à `0`. Vérifiez que la valeur affichée change après le clic.

## Autoformation

Utilisez le tableau pour planifier la suite de votre apprentissage. Adaptez l'objectif à vos acquis et choisissez une échéance réaliste.

| Étape | Ce que je veux apprendre ou réaliser | Ressource à consulter | Activité ou preuve de réussite | Échéance |
| --- | --- | --- | --- | --- |
| Découverte | Expliquer à quoi sert Alpine.js | [Documentation officielle : Start Here](https://alpinejs.dev/start-here) | Décrire avec mes mots le rôle d'un framework et d'Alpine.js | |
| Directives | Utiliser `x-data`, `x-text` et `@click` | [Documentation officielle des directives](https://alpinejs.dev/directives/overview) | Construire une interaction et conserver une capture ou le fichier HTML | |
| Suite du parcours | Choisir une fonctionnalité Alpine à approfondir | [Documentation officielle](https://alpinejs.dev/) | Formuler un objectif vérifiable et une activité de pratique | |

À chaque bilan, notez ce que vous savez faire, la preuve obtenue, les difficultés rencontrées et la prochaine étape.
