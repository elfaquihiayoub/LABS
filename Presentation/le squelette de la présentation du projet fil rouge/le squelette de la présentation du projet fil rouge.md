---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  :root {
    --bg-dark: #07111f;
    --bg-panel: #0f1d30;
    --bg-soft: #12233d;
    --text: #eaf2ff;
    --muted: #a8bbd9;
    --accent: #58d3c8;
    --accent-2: #7c9cff;
    --accent-3: #f4c95d;
    --line: rgba(168, 187, 217, 0.18);
  }

  html, body {
    background: radial-gradient(circle at top left, #122742 0%, #0b1425 28%, #050b13 100%);
    color: var(--text);
    font-family: 'Segoe UI', Arial, sans-serif;
  }

  section {
    background: linear-gradient(135deg, rgba(8, 14, 26, 0.95), rgba(14, 26, 42, 0.92));
    color: var(--text);
    padding: 48px 60px 40px;
    border-top: 4px solid var(--accent);
    box-shadow: inset 0 0 0 1px var(--line);
    line-height: 1.45;
  }

  h1, h2, h3, h4 {
    color: #f8fbff;
    font-weight: 700;
    letter-spacing: 0.02em;
    margin-top: 0;
  }

  h1 {
    font-size: 2.1em;
    color: #ffffff;
    margin-bottom: 0.4em;
  }

  h2 {
    font-size: 1.55em;
    color: var(--accent);
    margin-bottom: 0.35em;
  }

  h3 {
    font-size: 1.22em;
    color: var(--accent-2);
    margin-bottom: 0.3em;
  }

  p, li {
    color: var(--text);
    font-size: 0.9em;
  }

  strong {
    color: var(--accent-3);
  }

  ul, ol {
    padding-left: 1.3em;
  }

  li {
    margin-bottom: 0.25em;
  }

  blockquote {
    background: rgba(17, 31, 49, 0.8);
    border-left: 4px solid var(--accent-2);
    padding: 0.6em 0.8em;
    color: var(--muted);
    border-radius: 0.35em;
  }

  section::after {
    content: attr(data-marpit-pagination) "/" attr(data-marpit-pagination-total);
    color: rgba(234, 242, 255, 0.75);
    font-size: 0.62em;
    right: 36px;
    bottom: 20px;
  }
---

# Plan de présentation

---

# — Page de garde

---

# — Introduction générale

---

# 1. Contexte du projet
---

##  Contexte du projet

---

##  Défis opérationnels

---

##  Objectifs de la solution

---

##  — Définition du problème

---

# 2. Méthode de travail

---

## — Scrum

**Figure 1 — Méthodologie Scrum**

---

## — Design Thinking

**Figure 2 — Design Thinking**

---

## — 2TUP

**Figure 3 — Processus 2TUP**

---

# 3. Gestion des tâches
---

## — Gestion des tâches

**Figure 4 — Diagramme de Gantt**

---

# 4. Branche fonctionnelle
---

## — Empathie

---

## — Profil : le client

---

## — Profil : le personnel (staff)

---

## — Synthèse de la vision (scalabilité)

![](Carte%20d’empathie%20du%20bibliothécaire.png)

---

# 5. Définition du problème
---

  The bibliothécaire has difficulty managing and accessing library information quickly and reliably, which causes time loss and increases the risk of errors in daily operations.
  
![alt text](content.png)

---

##  — Idéation

- Structure technique
- Bénéfices business

---

# 6. Architecture des cas d’utilisation (UML)
---

## — Les acteurs du système

---

##  — Détail des cas d’utilisation

---

##  — Cas d’utilisation global

**Figure 6 — Cas d’utilisation global**

---

# 7. Planification agile : sprints et cas d’utilisation
---

## — Stratégie de développement

---

## — Sprint 1 : fondations et gestion des ressources

**Figure 7 — Cas d’utilisation du Sprint 1**

---

## Sprint 2 : système client et commandes en temps réel

**Figure 8 — Cas d’utilisation du Sprint 2**

---

## Sprint 3 : assistant IA et opérations de paiement

**Figure 9 — Cas d’utilisation du Sprint 3**

---

# 8. Branche technique et diagramme de classe
---

##  Besoins techniques

---

##  Analyse technique

---

##  Conception générale

---

##  — Architecture logicielle

- Figure 10 — MVC
- Figure 11 — Architecture N-tiers
- Figure 12 — Architecture globale

---

# 9. Conception
---

## — Diagramme de classe

**Figure 13 — Diagramme de classe**

---

# 10. Maquettes (UI/UX)
---

##  — Maquettes (UI/UX)

**Figure 14 — Maquettes (UI/UX)**

---

# 11. Réalisation et développement
---

##  — Outils de développement

---

##  — Technologies utilisées

---

##  — Bilan d’implémentation des sprints

---

##  — Conclusion

---

#   Merci pour votre attention