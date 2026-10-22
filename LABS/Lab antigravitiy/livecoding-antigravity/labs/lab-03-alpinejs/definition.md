# Définition : Alpine.js

## Def (Définitions)

### Qu'est-ce qu'un Framework ?

Un framework est un ensemble d'outils et de conventions qui aide à construire un logiciel. Il fournit des mécanismes réutilisables afin que l'on puisse se concentrer sur les besoins de son application plutôt que de tout réécrire.

### Qu'est-ce qu'Alpine.js ?

Alpine.js est un framework JavaScript léger pour ajouter du comportement interactif aux pages HTML. Il expose des directives sous forme d'attributs HTML, par exemple `x-data`, `x-text` et `x-show`.

#### Architecture et fonctionnement

`x-data` déclare l'état d'un composant. Les éléments descendants peuvent utiliser cet état avec d'autres directives. Quand une action modifie une valeur, Alpine met à jour les éléments qui en dépendent.

Par exemple, un bouton portant `@click="count++"` peut modifier la propriété `count` déclarée dans `x-data`, et `x-text="count"` affiche sa valeur actualisée. `@click` est la forme abrégée de `x-on:click`.

Alpine ne prescrit pas une architecture MVC comme celle souvent associée aux frameworks serveur. Il ajoute des comportements réactifs au HTML existant ; l'application peut organiser son code selon ses propres besoins.
