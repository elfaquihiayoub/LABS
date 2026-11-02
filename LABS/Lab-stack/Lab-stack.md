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
    padding: 48px 58px;
    font-size: 22px;
  }

  h1, h2 {
    color: #12304A;
  }

  h1 {
    font-size: 2.05em;
    border-bottom: 5px solid #16A6A1;
    padding-bottom: 12px;
    margin-bottom: 22px;
  }

  h2 {
    font-size: 1.35em;
    margin-bottom: 12px;
  }

  strong {
    color: #087E8B;
  }

  ul, ol {
    line-height: 1.5;
  }

  li {
    margin-bottom: 7px;
  }

  table {
    width: 100%;
    font-size: 0.88em;
    border-collapse: collapse;
  }

  th {
    background: #12304A;
    color: white;
  }

  td, th {
    border: 1px solid #D9E1EA;
    padding: 10px;
  }

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

  section.title h2 {
    color: #C7D7E5;
    font-weight: normal;
  }

  section.title strong {
    color: #16A6A1;
  }

  section.title footer {
    color: #C7D7E5;
  }

  section.intro p {
    line-height: 1.55;
  }

  section.stack h2 {
    color: #087E8B;
    font-size: 1.1em;
    margin-bottom: 5px;
  }

  section.stack ul {
    font-size: 0.86em;
    line-height: 1.35;
    margin-top: 5px;
  }

  section.stack li {
    margin-bottom: 4px;
  }

  section.labs {
    padding: 35px 42px;
  }

  section.labs h1 {
    font-size: 1.8em;
    margin-bottom: 14px;
  }

  .phase-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
  }

  .phase-card {
    background: #FFFFFF;
    border-left: 5px solid #16A6A1;
    border-radius: 8px;
    padding: 10px 14px;
  }

  .phase-card h2 {
    font-size: 0.91em;
    color: #087E8B;
    margin: 0 0 5px 0;
  }

  .phase-card ol {
    font-size: 0.67em;
    line-height: 1.22;
    margin: 0;
    padding-left: 22px;
  }

  .phase-card li {
    margin-bottom: 2px;
  }

  section.thanks {
    background: #12304A;
    color: #F7F9FC;
    text-align: center;
    justify-content: center;
  }

  section.thanks h1 {
    color: #FFFFFF;
    border-bottom: 5px solid #16A6A1;
  }
---

<!-- _class: title -->
<!-- _paginate: false -->

<div style="display:flex; justify-content:center; align-items:center; gap:45px; margin-bottom:35px;">
  <img src="ofppt.png" width="115" alt="OFPPT Logo">
  <img src="solicode.png" width="115" alt="Solicode Logo">
</div>

# Labs & Stack Technique

## Technical Project

**Podcast Directory Management**

<br>

**Prepared by:** Ayoub Elfaquihi

**Supervisor:** [ES-Saraj Fouad]

**Training Center:** Solicode Tanger

**Institution:** OFPPT

---

<!-- _class: intro -->

# Projet Technique

## Introduction

A technical project is an opportunity to apply the knowledge and skills acquired during training to develop a real-world application.

Throughout this project, we explore different technologies, tools, and development methods to build a complete web application.

## Podcast Directory Management

The project focuses on developing a web application that provides a structured and centralized directory for podcast content.

It allows administrators to manage podcast hosts, topics, and episodes through an interactive interface, ensuring organized data and efficient management.

---

<!-- _class: stack -->

# Technical Stack

The project uses different technologies, each with a specific role in the development process.

<div style="display:grid; grid-template-columns:1fr 1fr; gap:18px 35px;">

<div>

## Markup & Styling

- **HTML** — Structures web pages.
- **CSS** — Controls visual presentation.
- **Tailwind CSS** — Utility-first CSS framework.

## Programming Languages

- **JavaScript** — Handles frontend interactions.
- **PHP** — Handles backend logic.

</div>

<div>

## Frameworks & Libraries

- **Laravel** — PHP backend framework.
- **Alpine.js** — Adds reactive frontend interactions.

## Database & ORM

- **MySQL** — Stores and manages application data.
- **Eloquent ORM** — Handles database operations and relationships in Laravel.

</div>
</div>

---

# Understanding Labs

## What is a Lab?

A Lab is a practical learning activity focused on exploring and experimenting with a specific technology, tool, or development concept.

## Why Do We Do Labs?

- Discover and understand new technologies.
- Test tools and solutions through practice.
- Develop technical skills.
- Solve specific development challenges.

## What Is the Link with the Technical Project?

Labs help us prepare for the technical project by allowing us to experiment with technologies, test solutions, and develop individual parts of the application before integrating them into the final project.

> A Lab connects learning with practical project development.

---

<!-- _class: labs -->

# List of Labs

<div class="phase-grid">

<div class="phase-card">

## Phase 1 — Tools & Technologies (1–10)

<ol>
<li>Qu'est-ce qu'un lab ? — Understanding Labs</li>
<li>Markdown — Syntax and documentation</li>
<li>GitHub Pages — Static hosting</li>
<li>Antigravity — Python project management</li>
<li>Marp — Markdown presentations</li>
<li>OpenCode — Development environment</li>
<li>Pandoc — Document conversion</li>
<li>OmniRoute — Advanced routing</li>
<li>Tailwind CSS — Utility-first CSS</li>
<li>Preline — UI components with Tailwind</li>
</ol>

</div>

<div class="phase-card">

## Phase 2 — Methodologies & Collaboration (11–16)

<ol start="11">
<li>2TUP — Development methodology</li>
<li>Design Thinking — User-centered approach</li>
<li>GitHub Issues — Ticket management</li>
<li>Scrum — Agile methodology</li>
<li>GitHub Copilot — AI-assisted development</li>
<li>ASCII — Text-based art and diagrams</li>
</ol>

</div>

<div class="phase-card">

## Phase 3 — Development & Languages (17–24)

<ol start="17">
<li>OOP — Object-oriented programming</li>
<li>PHP Native — PHP without a framework</li>
<li>Laravel — PHP framework</li>
<li>Kotlin — Modern programming language</li>
<li>ES7 JavaScript — Modern JavaScript features</li>
<li>Error JS — JavaScript error handling</li>
<li>Prompt-Agent-Skill — AI and automation</li>
<li>Communication avec IA — AI interaction</li>
</ol>

</div>

<div class="phase-card">

## Phase 4 — Project & Production (25–30)

<ol start="25">
<li>Veille technologique — Technology monitoring</li>
<li>Starter — Starter templates</li>
<li>Planning — Project planning</li>
<li>Git — Advanced version control</li>
<li>Lab Stack — Complete technical stack</li>
<li>Agent — AI agent automation</li>
</ol>

</div>
</div>

---

<!-- _class: thanks -->
<!-- _paginate: false -->

# Thank You!

## Questions?

**Labs & Stack Technique**

Ayoub Elfaquihi — Solicode Tanger
