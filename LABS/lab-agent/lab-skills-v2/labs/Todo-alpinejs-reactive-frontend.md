# Todo: Lab Alpine.js — Reactive Frontend Development

## Phase 1 — Discover the application

- [ ] Read the lab objective, scope, and architecture diagram.
- [ ] Inspect the existing HTML, Tailwind classes, JavaScript, and PHP API.
- [ ] Record the existing endpoint methods, parameters, and JSON response shapes.
- [ ] Trace a request through Controller → Service / BaseService → DAO → JSON storage.
- [ ] Identify DOM manipulation that Alpine.js can replace.

## Phase 2 — Alpine.js fundamentals

- [ ] Explain `x-data` and the component's reactive state.
- [ ] Bind search and form fields with `x-model`.
- [ ] Show and hide the form and confirmation dialog with `x-show`.
- [ ] Render Rayon records with `x-for` and `x-text`.
- [ ] Add transitions with `x-transition`.
- [ ] Connect user actions with `@click` and `@submit.prevent`.

## Phase 3 — Integrate the interface

- [ ] Load Rayons with Fetch and display a loading state.
- [ ] Filter records by name or location as the search term changes.
- [ ] Open, close, reset, and prefill the Add/Edit form.
- [ ] Create Rayons using the existing POST endpoint.
- [ ] Update Rayons using the existing PUT endpoint and ID query parameter.
- [ ] Confirm and delete Rayons using the existing DELETE endpoint.
- [ ] Display success and error notifications.
- [ ] Remove redundant DOM rendering and event listener code.

## Phase 4 — Preserve architecture and validate

- [ ] Keep Alpine.js in the Presentation Layer.
- [ ] Keep validation and business rules in PHP services.
- [ ] Keep data access and persistence in the DAO.
- [ ] Preserve API endpoints and JSON response formats.
- [ ] Verify Create, Read, Update, and Delete behavior in the interface.
- [ ] Run the existing PHP service tests.
- [ ] Complete the reflection questions and mini-challenge.
- [ ] Prepare the short demonstration and explain one end-to-end CRUD flow.
