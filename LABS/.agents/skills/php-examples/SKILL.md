---
name: php-examples
description: Creates, adapts, and validates PHP examples with a step-by-step tutorial for each topic, following the project's PHP version and architecture. Use when asked for PHP exercises, lab examples, runnable snippets, or examples of exceptions, namespaces, traits, or Laravel conventions.
---

# PHP Example Creator

## Role

Create short, understandable, executable PHP examples that fit the user's real project context.

## When to use this skill

Use it to create or adapt PHP exercises, examples of language concepts, Laravel demonstrations, or practical lab content. Do not use it to rewrite a complete application without an explicit request.

## Inputs and context

- Read the provided README or brief and the nearby files in the target destination.
- Review `composer.json`, relevant instructions, and related code to identify the PHP version, framework, autoload setup, and real conventions.
- Check whether the example can reuse existing classes or services. Do not invent models, dependencies, versions, or past issues.
- If a detail is missing but a simple assumption allows progress, choose a self-contained example and clearly state what is simulated. Ask for clarification only if the choice would materially change the outcome.

## Procedure

1. Restate the expected deliverable and choose the requested path. Preserve existing files; do not replace them without checking their contents.
2. Infer the PHP version and dependencies from the project files. Use only compatible functions, syntax, and commands.
3. Create a subfolder for each concept or exercise when multiple examples are requested. In each subfolder, provide an executable PHP file named `example.php` and a related `tutorial.md`. If an existing structure requires different names, keep that structure and document the example path clearly.
4. In each tutorial, explain the example itself, not just the concept: walk through the important lines or blocks in execution order, define the role of the PHP elements used, and connect each step to its observable effect. Also include the objective, relevant files, the command to run from a specific directory, the expected result, the connection to the project architecture, and a limitation or follow-up exercise. Adjust the level of detail to the request.
5. Link each example to a concrete use case in the project. Clearly distinguish a self-contained demonstration from a feature that is actually integrated.
6. Keep the code small and pedagogical: explicit inputs, descriptive names, types when the project uses them, and observable output. Show exceptions handled at an appropriate boundary; use namespaces according to the actual autoload configuration; use a trait only for a shared behavior that genuinely fits it.
7. Add or update a parent README listing each concept, its example, and its tutorial, including startup commands when several folders are involved.
8. Validate the PHP files with `php -l` when PHP is available. Run the relevant targeted tests if the project has them. If the tools are missing, do not claim that the examples were executed; clearly state the verification that should be performed.
9. Summarize the created files, execution commands, validation results, and any limitations.

## Rules

- Respond in the language of the request while preserving the language and style of existing files. For this workspace, write the tutorials in simple French (A1 level): short sentences, common words, one idea per sentence.
- Do not include a framework demonstration when a simpler standalone version would be clearer; if it depends on Laravel, follow its conventions rather than simulating its APIs.
- Do not expose secrets and never modify `.env`.
- Avoid extra dependencies for simple language examples.
- Do not present fictional data as real data, nor a standalone exercise as already integrated code.
- Limit changes to the requested files and necessary execution documents.

## Example requests

- “Create a PHP example of an exception for the article creation form.”
- “Prepare three executable exercises on namespaces, traits, and exceptions.”
- “Adapt this PHP example to the PHP version and Composer autoload setup of my project.”

## Final verification

- Each requested concept has a subfolder with a PHP example and its associated tutorial, unless an existing documented convention says otherwise.
- Each tutorial concretely explains the important lines or blocks in the example and the path from execution to the result.
- The examples respect the observed version and conventions.
- The parent README references the examples, tutorials, and valid commands.
- Verification status is reported without exaggeration.