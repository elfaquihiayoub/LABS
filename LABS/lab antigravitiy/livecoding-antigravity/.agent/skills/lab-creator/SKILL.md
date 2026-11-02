---
name: lab-creator
description: Creates organized educational labs from a requested mission and, when provided, a learning plan, preserving its relevant sections and objectives.
---

# Lab Creator Skill

## Purpose
Create well-organized educational labs in the repository. Each lab must focus on one specific subject and be stored in its own subdirectory.

## Rules
1. Create every lab inside the `labs/` directory.
2. Give each lab a unique, numbered directory name using this format: `lab-01-subject-name`.
3. Each lab must contain the following Markdown files:
   * `README.md`
   * `introduction.md`
   * `definition.md`
   * `practical.md`
   * `presentation.md`
4. Write content in clear, simple English unless another language is requested or the source plan uses another language.
5. Keep explanations concise, accurate, and suitable for students.
6. Do not invent technical facts or present unverified information as fact.
7. Avoid duplicating existing labs. Inspect the repository before creating a new lab.
8. Preserve existing files and never overwrite user content without permission.
9. When the user supplies or identifies an autoformation/course plan, read it before drafting and use it as the source of truth for the lab's structure and learning objectives.
10. Use only the plan sections, headings, and subtopics that support the user's requested mission. Do not expand the lab to cover every topic in the plan by default.
11. Treat examples, technologies, or exercises named in the plan as examples or practice context unless the user explicitly requests them as the lab's main subject. Do not mistake an example (such as Laravel in an autoformation exercise) for the plan's overall subject.
12. Keep the plan's section order, heading hierarchy, and terminology in the generated content. The standard lab files below are the output format, not a replacement curriculum: distribute the selected plan content across them where appropriate, and do not add unrelated curriculum sections.

## Lab Structure

The files below are the standard lab format. If a plan is provided, its selected headings and subtopics determine what the lab teaches and how that content is organized within these files.

### 1. Introduction
* Introduce the requested mission and its relevance.
* State concise learning objectives grounded in the selected plan sections and subtopics.

### 2. Definition
* Present the relevant conceptual sections from the plan using its headings and subtopics.
* Explain necessary terminology and distinguish related concepts where useful.
* Use examples to clarify concepts, without turning illustrative examples into required topics.

### 3. Practical
* Follow relevant practical or procedural sections in the plan, retaining their headings and subtopics.
* Provide step-by-step instructions or exercises appropriate to the requested mission.
* Give expected results.
* Include a challenge exercise when appropriate.
* Provide solutions separately when requested.

### 4. Presentation
* Create a `presentation.md` for the lab.
* Summarize the content actually covered, reflecting the selected plan headings and terminology.
* Use a presentation-friendly format (e.g., Marp directives).

## README.md Requirements
The lab README must include:
* Lab title and number.
* Subject.
* Learning objectives aligned with the selected plan content and requested mission.
* Links to `introduction.md`, `definition.md`, `practical.md`, and `presentation.md`.

## Main Repository README
Maintain the root `labs/README.md` as an index of all labs. Include each lab's number, subject, short description, and link to its directory README.

## Workflow
1. Inspect the repository, existing labs, and the relevant plan before drafting. If no plan is supplied or identifiable, ask the user for it when plan-based structure is required.
2. Identify the requested mission and select only the plan sections, headings, and subtopics that serve it. Separate the plan's main subject from illustrative examples and practice exercises.
3. Derive learning objectives from the selected plan content; do not add objectives that introduce unrelated topics.
4. Select the next available lab number and create the lab directory and required files using the existing naming convention.
5. Write the introduction, definition, practical, and presentation. Preserve the selected plan content's order and heading hierarchy across the standard files.
6. Update the main lab index.
7. Verify that all files exist and all relative links work.
8. Summarize the files created and any checks performed.

## Important
Create actual files in the repository rather than only displaying their contents in the chat. If the subject is missing, ask the user which subject the lab should cover.
