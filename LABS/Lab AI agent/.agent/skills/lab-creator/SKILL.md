---
name: lab-presentation-creator
description: Creates concise, modern Marp lab presentations from a topic and optional prompt description. Use for technical topics, web development, IDEs, tools, and workflows.
argument-hint: <topic> [optional description]
---

# Lab Presentation Creator

Create one polished Marp **Markdown (`.md`) file only** from the topic in the user's prompt.

## Input and research

- Treat the topic/title as required; treat any prompt description, task text, or context as the preferred scope and source of intent.
- **If a description is provided:** follow it closely; do not broaden the topic or perform unnecessary research. Verify only important technical claims when needed.
- **If no description is provided:** search/research the topic by its title directly, prioritizing official documentation and reliable sources. Do not ask follow-up questions when sensible defaults suffice.
- Audience: beginner web developers doing practical labs. Default language: French, unless the prompt clearly requests another language.

## Required slide order

1. **Title** — topic name + short subtitle.
2. **Plan** — exactly three bullets: Introduction, Problèmes, Solutions.
3. **Introduction** — what it is, its purpose, and one relevant example.
4. **Problems** — one concrete problem per slide; explain only the problem and impact, not its solution.
5. **Solutions** — all solution slides after every problem slide; each solution must address a previously shown problem. Use practical steps, settings, commands, or short examples.
6. **Conclusion** — `À RETENIR` or `RÉSULTAT`, with 2–4 brief bullets.

Use only as many problem/solution slides as the topic genuinely needs. Never alternate between problem and solution slides.

## Content rules

- Bullets only; **no paragraphs**. Usually 2–4 short bullets per slide and one idea per slide.
- Be accurate and specific. Never invent features, commands, or claims. Prefer short code/syntax examples over long explanations.
- Keep the content focused on the prompt. Every problem must be relevant; every solution must map to a problem.

## Visual style

Use Marp Markdown with a modern, Tailwind-inspired visual system: clean cards/sections, generous spacing, strong hierarchy, restrained accents, consistent alignment, and accessible contrast. Do not use Tailwind utility classes directly; Marp slides need CSS.

Use this baseline in the Marp front matter:

```yaml
---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    box-sizing: border-box;
    padding: 56px 64px;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", sans-serif;
    background: #F8FAFC;
    color: #0F172A;
    font-size: 27px;
    line-height: 1.35;
  }
  h1 { color: #0F172A; font-size: 1.8em; font-weight: 750; letter-spacing: -0.03em; border-bottom: 4px solid #14B8A6; padding-bottom: 0.25em; }
  h2 { color: #334155; font-size: 1.15em; font-weight: 600; }
  strong { color: #0F766E; }
  ul { line-height: 1.5; }
  li { margin: 0.22em 0; }
  section.title { background: #0F172A; color: #F8FAFC; text-align: center; justify-content: center; }
  section.title h1 { color: #F8FAFC; border: 0; }
  section.title h2 { color: #CBD5E1; }
  section.solution h1 { color: #0F766E; }
```

- Palette: slate/navy `#0F172A`, teal `#14B8A6`, soft background `#F8FAFC`, body text `#0F172A`.
- Use `<!-- _class: title -->` for the title, optional section divider, and closing slide; use `<!-- _class: solution -->` for solution slides when useful.
- Keep slides uncluttered and consistent. Avoid decorative emojis, unnecessary images, dense text, and tiny fonts. Add a diagram only when it clearly improves understanding.

## Workspace and output limits

- Work **only in the currently opened workspace/folder**. Do not navigate into, inspect, or scan unopened folders, sibling folders, parent directories, or unrelated project areas.
- Create the presentation `.md` in the current workspace using a clear name such as `<topic-slug>-presentation.md`.
- If the same presentation already exists, update it only when the user clearly asks to modify it; otherwise choose a non-destructive filename.
- **Do not export or create PDF, PPTX, HTML, images, or other output formats. The sole deliverable is the Marp `.md` file.**

## Final check

Before responding, check the source only:

- Valid Marp front matter and `---` slide separators.
- Title is slide 1; plan is slide 2; sections follow the required order.
- Every problem has its own slide; all solutions follow all problems.
- Bullet-only text, concise content, readable styling, and matching problem/solution logic.
- Confirm the `.md` file exists. Do not render/export another format.

Reply briefly with a link to the `.md` file and mention only important assumptions or corrections.
