---
name: marp
description: "Write, structure, and correct Markdown Marp presentations with readable slides and valid frontmatter."
---

# Marp Presentations

Use this skill to create or edit a Marp presentation file (`.md`).

## Structure

- Start with valid YAML frontmatter containing `marp: true`, a theme, pagination, and the `16:9` format.
- Separate each slide with `---`.
- For a lab, follow this order:
  1. Lab title, then the student `Mohammed Yassir Mesbahi` and the supervisor `ES-SARRAJ Fouad`.
  2. Presentation plan.
  3. Introduction and technical stack.
  4. Definitions of key concepts.
  5. Real problem provided by the student.
  6. Solution and demonstrations; add practical slides if needed.
- For a lab plan, use the sections: Introduction & Technical Stack, Definitions, Problem, Solution. In French: Introduction et stack technique, Définitions, Problème, Solution.
- Do not add a conclusion or acknowledgments; end with the solution or deliverable.

## Accuracy and content

- Write in simple French (A1 level) and adapt the content to the lab sources: short sentences, common words, one idea per sentence.
- Identify the student as `Mohammed Yassir Mesbahi` and the supervisor as `ES-SARRAJ Fouad` on the title slide. Never leave a `[Name]` placeholder for them.
- Do not invent the student's problem or solution. Ask for this information before drafting the corresponding slides; if unavailable, leave explicit placeholders to be completed.
- For a technical lab, include a Quick Start and a working Hello World example. Declare the language for each code block and verify that the commands and examples match the real environment.
- Clearly explain technical terms; do not assume the audience already knows them.

## Readability

- Maintain a consistent visual hierarchy, sufficient contrast, and an appropriate amount of text on each slide.
- Alternate dark and light slides when the theme allows it; use `<!-- _class: light -->` for a light slide.
- Declare the language for code blocks (`bash`, `php`, `html`, etc.) and align Markdown table columns explicitly.