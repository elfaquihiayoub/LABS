---
name: js-error-resolver
description: Diagnostique et résout les erreurs JavaScript fréquentes (TypeError, ReferenceError, SyntaxError JSON, erreurs HTTP, DOM null) à partir de la console, du réseau ou de la stack trace.
argument-hint: <message-ou-trace-erreur> [extrait-de-code]
---

# JavaScript Error Resolver

Ce Skill guide l'analyse et la résolution méthodique d'erreurs JavaScript côté client et lors des interactions avec une API ou un backend.

## Procédure d'analyse en 4 étapes

1. **Localisation et type d'exception :**
   - Identifier le type exact (`TypeError`, `ReferenceError`, `SyntaxError`, statut HTTP).
   - Extraire le fichier et le numéro de ligne fautif depuis la stack trace.

2. **Classification de la cause racine :**
   - **`TypeError: Cannot read properties of undefined` :** Accès à une clé d'un objet non initialisé ou en cours de chargement asynchrone.
   - **`ReferenceError: [nom] is not defined` :** Variable non déclarée, faute de frappe, import manquant ou problème de portée (*scope*).
   - **`SyntaxError: Unexpected token '<' in JSON at position 0` :** La réponse réseau est du HTML (ex. page d'erreur 500 du backend) au lieu du JSON attendu.
   - **Erreur HTTP 404 / 500 :** URL erronée, méthode HTTP inadaptée ou exception non interceptée côté backend.
   - **`Cannot set property 'innerHTML' of null` :** Manipulation du DOM avant le chargement complet ou sélecteur inexistant.

3. **Recommandation d'outillage :**
   - Indiquer le panneau approprié de Google Chrome DevTools (Console pour variables, Network/Fetch pour payloads API).
   - Préciser où positionner des points d'arrêt (*breakpoints*) dans VS Code ou le navigateur.

4. **Correction robuste du code :**
   - Appliquer le chaînage optionnel (`?.`) et l'opérateur de coalescence des nuls (`??`).
   - Encadrer les requêtes `fetch()` avec vérification de `response.ok` et bloc `try / catch`.
   - Attendre l'événement `DOMContentLoaded` ou placer le script avec l'attribut `defer`.
   - Sécuriser les réponses côté serveur avec l'en-tête `Content-Type: application/json`.

## Format de réponse

Chaque résolution doit comporter :
- **Diagnostic :** Explication claire en 2 phrases de la cause de l'erreur.
- **Outil d'inspection :** Commande ou manipulation DevTools/VS Code pour reproduire/observer.
- **Correctif de code :** Extrait corrigé minimal et sécurisé.
