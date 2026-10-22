---
name: lab-presentation-creator
description: Creates concise, professional Marp lab presentations from a topic name alone. Uses the fixed structure Title → Plan → Introduction → Problems → Solutions, with one problem per slide and all solutions grouped after all problem slides. Use for web-development, IDE, tools, concepts, and technical lab topics.
argument-hint: <topic>
---

# Lab Presentation Creator

## Purpose

Create a ready-to-present Marp slide deck from the topic the user provides, even if the user gives only one word (for example, `Markdown`, `Git`, `IDE`, or `Laravel`). The deck should help learners understand the topic, the practical problems it addresses, and how to use it to solve those problems.

## Required workflow

1. **Identify the topic.** Treat the user's topic name as the only required input. Do not ask follow-up questions when a reasonable educational presentation can be created.
2. **Establish the learning context.** Assume beginner web developers and practical lab work unless the user's context says otherwise. Use concrete examples relevant to development, coding, documentation, teamwork, or the topic itself.
3. **Choose accurate content.** If the topic is unfamiliar, technical, version-sensitive, or easy to misrepresent, verify important facts with available reliable sources. Prefer official documentation. Never invent features, commands, or claims.
4. **Create the complete presentation.** Follow the exact slide order and content rules below.
5. **Save the deliverable.** Create exactly one presentation artifact: a `.md` file containing the complete Marp source in the current workspace. Use a clear filename such as `<topic-slug>-presentation.md`. If a presentation file for this topic already exists, update it only when the user clearly asks to modify that existing file; otherwise create a new, non-destructive filename.
6. **Validate the Markdown source only.** Check that the `.md` file exists, the Marp front matter is valid, every slide is separated with `---`, and the required sections appear in the right order. Do not render or export the deck to PDF, PPTX, HTML, images, or any other format. Do not run commands or workflows that create those exports. If a visual preview is unavailable without exporting another file, skip it and validate the source instead.
7. **Respond briefly.** Link only to the created `.md` file when the environment supports file links. Summarize the sections in one short line and mention only important assumptions or factual adjustments. Do not create or link a PDF.

## Output restriction — mandatory

- **The only presentation deliverable is the Marp Markdown source file (`.md`).**
- **Never export or generate a PDF.**
- Do not generate `.pptx`, `.html`, `.png`, `.jpg`, or other rendered/exported presentation files unless the user explicitly asks for one in a separate request.
- Do not interpret “ready-to-present” as permission to export. The `.md` file is the final deliverable.
- The final response must link to the `.md` file only; do not offer a PDF or mention that one was exported.

## Mandatory presentation structure

Keep these sections in this exact order:

1. **Title slide**
   - Show the topic name prominently.
   - Add a short subtitle explaining the subject's purpose.
   - Keep it visually clean; avoid long descriptions.
2. **Plan slide**
   - Use only these three main bullets:
     - Introduction
     - Problèmes
     - Solutions
3. **Introduction**
   - Normally one slide; use a second only if essential.
   - Explain what the topic is, its role, and one relevant usage or example.
   - For a tool, distinguish the tool itself from optional extensions or related tools where that distinction matters.
4. **Problems**
   - Identify practical problems that learners or developers can encounter without the topic or capability.
   - Give **each problem its own slide**.
   - State the problem and its observable impact only. Do not reveal the solution on these slides.
   - Use a short heading such as `PROBLÈME 1` plus a precise title.
5. **Solutions**
   - Place **all solution slides after all problem slides**. Never alternate problem/solution/problem/solution.
   - Add a simple `SOLUTIONS` transition slide before the detailed solution slides when it improves navigation.
   - Give each solution a clear action or method that addresses a problem already introduced.
   - Use practical steps, commands, settings, syntax, or a short example when useful.
   - Keep the solution numbering or titles clearly connected to the earlier problems.
6. **Closing slide**
   - Finish with a short `À RETENIR` or `RÉSULTAT` slide containing 2–4 concise bullets.
   - Do not add a new topic at the end.

## Content rules

- **Language:** French by default, matching the user's lab presentation context. Use another language only when the user requests it or the surrounding task clearly requires it.
- **Audience:** Beginner learners; explain technical terms simply.
- **Slide text:** Bullet points only. No prose paragraphs, long explanations, or dense blocks of text.
- **Brevity:** One idea per slide, usually 2–4 bullets per slide, and short bullet wording.
- **Scope:** Stay focused on the supplied topic and the lab context. Do not add unrelated technologies, extra sections, or filler slides.
- **Problem-solution logic:** Every problem must be relevant to the topic, and every solution must directly address one or more of the presented problems. Do not create artificial problems merely to reach a target slide count.
- **Accuracy:** Do not present assumptions as facts. For commands, settings, extensions, and tool capabilities, use correct names and syntax. If a topic does not solve a proposed problem directly, reframe the problem or omit it.
- **Examples:** Prefer short commands, filenames, or tiny syntax samples over lengthy code.
- **No unnecessary questions:** If the topic alone is enough, make sensible defaults and proceed.

## Visual and Marp requirements

Use Marp Markdown with this baseline configuration:

```yaml
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
    padding: 58px;
  }
  h1, h2 { color: #12304A; }
  h1 {
    font-size: 2.15em;
    border-bottom: 5px solid #16A6A1;
    padding-bottom: 14px;
  }
  h2 { font-size: 1.5em; }
  strong { color: #087E8B; }
  ul { font-size: 1.16em; line-height: 1.6; }
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
  section.title h2 { color: #C7D7E5; font-weight: normal; }
  section.solution h1 { color: #087E8B; }
---
```

Visual guidelines:

- Use a comfortable, high-contrast palette:
  - Navy: `#12304A`
  - Teal: `#16A6A1`
  - Light background: `#F7F9FC`
  - Main text: `#172033`
- Use a 16:9 layout and slide numbers.
- Use `<!-- _class: title -->` for the title, section-transition, and closing slides when appropriate.
- Use `<!-- _class: solution -->` for solution slides when appropriate.
- Keep slides spacious and consistent. Avoid large paragraphs, crowded slides, excessive decoration, emojis, and unnecessary images.
- Use diagrams or visuals only when they explain the topic more clearly than bullets; never add visuals just for decoration.
- Ensure code snippets and bullet lists fit on the slide.

## Recommended slide count

- Usually **8–12 slides**, depending on the topic.
- Prefer 3 clear problems and their corresponding solutions over a long list of weak examples.
- Allow more slides only when each additional slide adds necessary learning value.

## Final quality checklist

Before finishing, verify all items:

- [ ] Slide 1 clearly names the topic.
- [ ] Slide 2 contains the plan: Introduction, Problèmes, Solutions.
- [ ] The introduction defines the topic accurately.
- [ ] Each problem is on its own slide.
- [ ] All problem slides appear before every detailed solution slide.
- [ ] Every solution responds to a previously shown problem.
- [ ] Slides use concise bullet points and contain no paragraphs.
- [ ] The design uses the specified professional, comfortable palette.
- [ ] Marp front matter and slide separators are valid.
- [ ] Only the `.md` presentation source was created; no PDF or other export was generated.
- [ ] The presentation file was saved and its existence was checked.

## Invocation example

**User input:** `Markdown`

**Expected output:** A French Marp file with a title slide, a plan slide, a concise introduction to Markdown, separate slides describing practical documentation/formatting problems, solution slides showing how Markdown addresses them, and a short closing slide. All problems must appear before the solutions.
