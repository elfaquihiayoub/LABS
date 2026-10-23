---
name: lab-technique-creator
description: Creates a structured, beginner-friendly technical lab plan from a topic, with the real problem confirmed by the user before drafting.
argument-hint: <topic> [optional context or task description]
---

# Lab Technique Creator

Create one clear technical lab plan in Markdown (`.md`) for beginner web-development learners. Default language: French, unless the user asks for another language.

## Mandatory workflow: confirm the problem first

1. Identify the lab topic/title and read any context or task description provided.
2. **Before drafting, confirm the problem that motivated the lab.** If the user has not already explained it, ask one concise question such as:  
   **« Quel problème ou besoin le formateur vous a-t-il demandé de résoudre avec ce lab ? »**
3. Stop and wait for the user's answer before producing the lab plan. Do not guess the teacher's intention or replace the real problem with generic disadvantages of the technology.
4. If the user already gave the problem clearly, do not ask again. If the wording is rough, preserve its meaning and clarify it in the final plan without changing its intent.

## Scope and research

- The topic/title is required. Use any description, assignment text, or context supplied by the user as the primary source of scope.
- If a description is provided, follow it closely and avoid broad, unnecessary research.
- If no description is provided, use the topic/title directly to determine the scope. Check reliable, preferably official documentation when technical accuracy or current details matter.
- Do not invent project requirements, technologies, teacher expectations, commands, or features. State an assumption briefly only when unavoidable.
- Audience: beginner web developers doing practical labs. Explain unfamiliar terms simply and only to the depth needed for the lab.

## Required lab structure

Generate the sections below **in this exact order**:

1. **Titre** — A short, specific title naming the technique, tool, or concept being studied.
2. **Introduction / Mise en situation** — Explain the context, the goal, and where the technique is useful. Use the given project or scenario (for example, a blog) here, not as an item in the stack.
3. **Stack technique** — List only technologies and tools genuinely needed for this lab, grouped where useful (language, framework/library, database, tools). Add a short role for each item. Do not list the management project itself as part of the stack, and do not add technologies just because they are commonly used alongside the topic.
4. **Définitions** — Define the important unfamiliar terms needed to understand the lab. Use the format `Terme : simple definition + its role in this lab`. Explain prerequisite terms too when understanding them is necessary (e.g. explain “framework” before or alongside “Laravel”). Avoid a glossary of irrelevant terms.
5. **Problème(s)** — State the specific problem or need supplied by the user/formateur. Keep the focus on why this lab was assigned and what must be improved, solved, or tested. Do not turn this section into a generic list of technology limitations.
6. **Solution(s)** — Explain how the chosen technique addresses the stated problem. Map each solution clearly to the problem it solves. Keep claims accurate and practical.
7. **Séquence pratique** — Include this section only when hands-on practice is useful or required. Provide ordered, actionable steps from setup to completion. For each substantial step, state what to do and the expected intermediate result. Include concise code or commands only when useful; never invent commands. If the topic is purely conceptual and no meaningful exercise is required, omit this section rather than forcing a practice sequence.
8. **Validation** — Provide observable acceptance criteria or a checklist to confirm that the lab succeeded. Each criterion must be testable and related to the original problem or lab objective. Mention the expected final result.

## Content rules

- Keep the lab concise, structured, and easy to scan. Prefer headings, bullets, short definitions, numbered steps, and small code examples over long paragraphs.
- Use precise beginner-friendly French by default; keep technical terms in their usual form and explain them on first use.
- Keep the problem, solution, practical steps, and validation aligned: every solution must address a stated problem, practical work must implement or test the solution, and validation must verify the result.
- Distinguish the **project/scenario** from the **stack**: the project belongs in the introduction; the stack contains technologies and tools.
- Do not include optional sections such as a long conclusion, quiz, installation guide, or bibliography unless they are needed for the requested lab.
- Do not pad the plan with generic content. If a required section has no relevant content yet, say what information is missing rather than fabricate it.

## Output and workspace rules

- Produce one Markdown (`.md`) lab-plan file only, unless the user explicitly asks for another format.
- Use a clear filename such as `<topic-slug>-lab.md`.
- Work only in the currently opened workspace/folder when workspace tools are available. Do not inspect, scan, or navigate into unopened folders, sibling folders, parent directories, or unrelated project areas.
- If the same lab file already exists, modify it only when the user clearly requests an update; otherwise choose a non-destructive filename.
- Do not export PDF, PPTX, HTML, or other formats by default.

## Final check

Before returning the file, verify:

- The user-provided problem is represented faithfully; no invented motivation is presented as fact.
- All eight structural rules above were followed, with the practical sequence included only when appropriate.
- The stack contains only relevant technologies/tools and excludes the project name itself.
- Definitions are accurate and understandable for beginners.
- Every solution maps to a problem; validation criteria are observable.
- The output is concise, well-formatted Markdown and the file exists.

Reply briefly with a link to the `.md` file and mention only important assumptions or missing information.
