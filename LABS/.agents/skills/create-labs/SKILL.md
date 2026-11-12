---
name: create-labs
description: "Create or adapt lab deliverables from a lab README and a generic plan. Use this when preparing a lab's content and its presentation outline."
---

# Lab creation

This skill coordinates the preparation of lab deliverables. For presentation formatting, also apply the `marp` skill. To create a file structure or a new skill, apply the `skill-creator` skill.

## When to use this skill

Use this skill when you need to generate, update, or adapt lab content based on an existing README and a generic presentation structure. It is especially useful when preparing teaching material, project labs, technical exercises, or presentation plans for a course.

## Inputs and context

- Read the target lab README and the available generic plan in the workspace.
- When creating a lab README, use the shared template at `assets/template-readme.md` as the starting structure; adapt its placeholders to the actual lab and keep its sections unless they do not apply.
- If a file named `template-plan.md` is missing, search for the workspace's generic plan and use it without claiming it has a different name.
- Keep the existing lab title/slug unchanged in the `lab-*` format. Do not replace it with a reformulated title.
- Adapt the wording to the real objectives, concepts, and constraints described in the README.

## Workflow

1. Review the existing lab README and identify the actual learning goals, stack, tasks, and technical constraints.
2. Find the generic presentation plan used by the project or workspace and reuse it as the basis for the lab structure.
3. Write the lab content in simple French (A1 level), adapting the generic sections to the real content and scope of the README. Use short sentences, common words, and one idea per sentence.
4. Place the presentation plan in `presentation.md` and do not duplicate it in the README.
5. For a technical lab, include a Quick Start section and a working Hello World example. Verify that the commands, versions, and setup match the actual project.
6. If the student problem or solution is not provided, do not invent it. Ask the user:
   - “What concrete problem are you encountering?”
   - “What solution are you proposing?”
   If the answers are missing, leave those sections as placeholders and do not present them as facts.
7. Keep the final structure focused and consistent with the repository's lab format.

## Rules

- Keep the existing lab title/slug exactly as it is, in the format `lab-*`.
- Do not duplicate the presentation plan inside the README.
- Do not add a conclusion or thank-you slide.
- Do not run Git commands if the user explicitly forbids it.
- Do not invent the student's problem, chosen solution, or project history.
- Write in simple French (A1 level) and align the content with what is actually present in the README.
- Always identify the student as `Mohammed Yassir Mesbahi` and the supervisor as `ES-SARRAJ Fouad` on the title slide of the presentation. Never leave a `[Name]` placeholder for them.
- Keep the README, the presentation, and the example tutorials in the same simple French register so the whole lab reads as one document.

## Completion checklist

- The lab title remains unchanged and uses the expected `lab-*` format.
- The README and the presentation plan are consistent with the actual lab scope.
- The presentation outline is placed in `presentation.md` only.
- The lab content is written in simple French (A1 level) and adapted to the real README content.
- The presentation names the student `Mohammed Yassir Mesbahi` and the supervisor `ES-SARRAJ Fouad`.
- The Quick Start and Hello World are included only when relevant to a technical lab.
- Unverified student-specific sections are clearly marked as to be completed rather than stated as fact.

