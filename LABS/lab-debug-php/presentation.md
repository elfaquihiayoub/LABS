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
    padding: 55px 65px;
    font-size: 23px;
  }
  h1, h2 { color: #12304A; }
  h1 {
    font-size: 2.1em;
    border-bottom: 5px solid #16A6A1;
    padding-bottom: 12px;
  }
  h2 { font-size: 1.4em; }
  strong { color: #087E8B; }
  ul, ol { line-height: 1.55; }
  section.title {
    background: #12304A;
    color: #F7F9FC;
    text-align: center;
    justify-content: center;
  }
  section.title h1 {
    color: #FFFFFF;
    border-bottom-color: #16A6A1;
  }
  section.title h2 { color: #C7D7E5; }
---

<!-- _class: title -->

# LAB-DEBUG-PHP

## Trouver et corriger un bug en PHP

**Étudiant :** El Faquihi Ayoub  
**Encadrant :** ES-SARRAJ Fouad  
**Centre :** Solicode Tanger — OFPPT

---

# PLAN

- Le débogage
- Les outils PHP
- L'exemple du lab
- Les étapes de correction

---

# LE DÉBOGAGE

- Un bug est un problème dans un programme.
- Le résultat peut être faux.
- Un message peut aussi signaler une erreur.
- Le débogage aide à trouver la cause.

---

# LES OUTILS PHP

- `php -l` vérifie la syntaxe.
- Le terminal lance un script PHP.
- `var_dump()` affiche la valeur et le type.
- Xdebug permet de suivre le code dans VS Code.
- Un point d'arrêt arrête le programme sur une ligne.

---

# LE PROBLÈME DE L'EXEMPLE

- Une commande contient des articles.
- Chaque article a un prix et une quantité.
- Le programme affiche `20.00`.
- Le résultat attendu est `45.00`.

---

# OBSERVER LE CODE

1. Poser un point d'arrêt sur le calcul.
2. Lancer le programme avec Xdebug.
3. Regarder le prix et la quantité.
4. Suivre la valeur de `total`.

---

# CORRIGER ET TESTER

Le programme doit multiplier le prix par la quantité :

```php
$total += $item['price'] * $item['quantity'];
```

Le résultat attendu est `45.00`.

---

# À RETENIR

- Reproduire le bug.
- Lire le résultat.
- Observer les variables.
- Corriger une cause à la fois.
- Tester encore après la correction.
