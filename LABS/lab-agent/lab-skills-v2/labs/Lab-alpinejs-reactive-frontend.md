# Lab: Alpine.js — Reactive Frontend Development

> **Lab type:** Guided analysis and implementation. Keep Alpine.js in the presentation layer; do not move PHP business rules or data access into JavaScript.

## 1. Lab Overview

### 1.1 Information

- **Technology:** Alpine.js, HTML, Tailwind CSS, Fetch API, PHP
- **Level:** Beginner
- **Estimated duration:** 2–3 hours
- **Application:** Rayon Classification, PHP 3-tier architecture
- **Prerequisites:** Basic HTML, JavaScript functions and objects, HTTP request basics, and ability to run PHP locally
- **Starting point:** `rayon-classification-3tier/`
- **Reference implementation:** `rayon-classification-alpine/`
- **Presentation slides:** `Presentation-alpinejs-reactive-frontend.md`

### 1.2 Objective

Integrate Alpine.js into the Rayon application to manage reactive UI state and interactions while preserving the existing PHP API and its Controller → Service → BaseService / DAO → JSON storage workflow.

By the end of the lab, the learner should be able to:

- Explain what Alpine.js adds to a small HTML application.
- Use `x-data`, `x-show`, `x-model`, `x-for`, `x-text`, `x-transition`, `@click`, and `@submit.prevent`.
- Load, search, create, update, and delete Rayons through the existing API.
- Display loading states, validation/API errors, and success notifications.
- Explain how reactive state updates the page without direct DOM rendering code.
- Identify which responsibilities belong in the frontend and which stay in the PHP tiers.

### 1.3 Application architecture

```text
Presentation Layer
  frontend/index.html + frontend/assets/app.js
         │ Fetch API: GET, POST, PUT, DELETE
         ▼
PHP API Controller: controllerRayon.php
         ▼
RayonService ── extends ── BaseService
         │
         ▼
RayonDAO
         │
         ▼
backend/data/rayon.json
```

Alpine.js owns presentation state and user interactions only. The PHP service continues to validate and apply business rules; the DAO continues to read and write storage.

## 2. Explore Before Coding

From `rayon-classification-3tier/`, inspect:

1. `frontend/index.html` — existing layout and Tailwind classes.
2. `frontend/assets/app.js` — existing API calls, event listeners, and DOM rendering.
3. `backend/api/controllers/controllerRayon.php` — HTTP methods and JSON responses.
4. `backend/services/RayonService.php` and `backend/services/BaseService.php` — validation and business logic.
5. `backend/dao/RayonDAO.php` — persistence operations.

Complete this table:

| Question | Your answer |
|---|---|
| What endpoint handles Rayon requests? | [Your answer] |
| What does GET return? | [Your answer] |
| What fields does POST/PUT accept? | [Your answer] |
| How is an ID supplied for PUT/DELETE? | [Your answer] |
| Which PHP class validates and applies business rules? | [Your answer] |
| Which class reads and writes JSON storage? | [Your answer] |
| Which JavaScript operations directly manipulate the DOM today? | [Your answer] |

### API contract to preserve

- `GET /backend/api/controllers/controllerRayon.php` returns a JSON array of Rayons.
- `POST` to the same endpoint accepts `{ "nom": "...", "emplacement": "..." }` and returns a success response with `data`.
- `PUT ?id=<id>` accepts the same JSON fields and returns the updated Rayon in `data`.
- `DELETE ?id=<id>` returns a success response.
- Error responses retain the existing `{ "success": false, "message": "..." }` format.

Do not change the API contract to make the frontend easier.

## 3. Alpine.js Concepts

| Directive | Role in this lab |
|---|---|
| `x-data` | Defines the Rayon component’s reactive state and methods. |
| `x-model` | Keeps search and form inputs synchronized with component data. |
| `x-show` | Shows and hides the Add/Edit form and delete confirmation. |
| `x-for` | Renders one table row for each Rayon. |
| `x-text` | Displays data as text without building HTML strings. |
| `x-transition` | Adds a simple transition when forms, dialogs, and toasts appear. |
| `@click` | Connects buttons to component actions. |
| `@submit.prevent` | Handles form submission in Alpine without a browser page reload. |

Alpine expressions are used in HTML to connect interface elements to component state. Put request coordination and small UI methods in the component; keep business rules and storage operations in PHP.

## 4. Guided Implementation

### Step 1 — Load Alpine.js and define one component

1. Keep the existing HTML structure and Tailwind design.
2. Load Alpine.js and the frontend component script in the page.
3. Register a `rayonManager` Alpine data component.
4. Add state for the Rayon list, search term, loading status, form values, form mode, confirmation dialog, and notifications.
5. Initialize the list when the component starts.

**Check:** The page initializes without errors and the records are loaded from the PHP API.

### Step 2 — Render and search reactively

1. Replace manual row creation and `innerHTML`/`appendChild` rendering with an `x-for` template.
2. Use `x-text` for IDs, names, locations, and notification text.
3. Bind a search input with `x-model`.
4. Filter the list by Rayon name or location using a component getter.
5. Show a loading message while GET is in progress and an empty state when no results match.

**Check:** Typing in search immediately filters the visible rows; clearing the input restores the list.

### Step 3 — Add and edit forms

1. Show the form with `x-show` and `x-transition`.
2. Bind its fields to reactive form data using `x-model`.
3. Use a nullable/current ID to distinguish Create from Edit.
4. Connect the submit event using `@submit.prevent`.
5. Send `POST` for a new Rayon and `PUT ?id=<id>` when editing.
6. On success, update the reactive list, reset the fields, close the form, and show a success notification.
7. On failure, keep the form open and show the API error.

**Check:** Opening Create starts with blank fields; opening Edit pre-fills the selected Rayon; canceling resets the form.

### Step 4 — Delete confirmation and loading states

1. Open a confirmation dialog from a Rayon row’s Delete button.
2. Display the selected Rayon’s name with `x-text`.
3. Send `DELETE ?id=<id>` only after confirmation.
4. Disable repeated submit/delete actions while requests are in progress.
5. Remove the Rayon from reactive state on success; preserve it and show an error on failure.
6. Add dismissible success and error toasts with a short transition.

**Check:** Cancel makes no request; confirming removes the row and produces a success notification.

### Step 5 — Remove replaced DOM manipulation

After Alpine controls the interface, remove JavaScript used only to:

- find elements by ID for display updates;
- create or remove table row elements;
- update field values and visibility imperatively;
- attach individual click and submit listeners.

Keep Fetch API calls and ordinary JavaScript data handling. Do not mix the Alpine rendering with a second renderer.

## 5. CRUD Request Walkthrough

Example: creating a Rayon.

1. The learner fills inputs bound to `form.nom` and `form.emplacement`.
2. `@submit.prevent` calls the component’s save method.
3. The method sends a Fetch `POST` request with a JSON body to the existing controller.
4. The Controller passes input to `RayonService`; the Service validates it and asks `RayonDAO` to persist it.
5. The Controller returns the existing JSON success response, including the created Rayon.
6. The component adds the returned record to the reactive `rayons` array and clears/closes the form.
7. Alpine re-renders the table from that array; no manual DOM update or page reload is needed.

For Update and Delete, identify how the request method and `?id=` parameter change while PHP continues to own validation and persistence.

## 6. Practice and Reflection

Complete the following:

1. Label each responsibility as **Presentation**, **Controller**, **Service**, or **DAO**:
   - Filter visible Rayons as the user types: [Your answer]
   - Validate that a Rayon name is not blank: [Your answer]
   - Convert an HTTP request into the expected service call: [Your answer]
   - Write the updated records to JSON storage: [Your answer]
2. Explain why the list is a reactive array rather than HTML assembled as a string.
3. Explain why successful Create, Update, and Delete operations update frontend state.
4. Describe what the loading state communicates to the user.
5. Name one behavior that should remain in PHP rather than being duplicated in JavaScript.
6. Identify one limitation of loading Alpine.js and Tailwind from a CDN.

### Mini-challenge

Add a clear-search control that appears only when the search field has content. It must use Alpine directives, preserve the current styling, and make no API request.

## 7. Validation Checklist

- [ ] The initial GET loads and displays existing Rayons.
- [ ] Searching filters by name and location without a page reload.
- [ ] Add creates a Rayon using POST and shows it in the list.
- [ ] Edit updates the selected Rayon using PUT and shows the new values.
- [ ] Delete requires confirmation and uses DELETE.
- [ ] Loading indicators are visible during requests.
- [ ] Success and error responses produce appropriate notifications.
- [ ] API error messages remain visible to the user.
- [ ] No PHP controller, service, BaseService, DAO, endpoint, or response contract was changed.
- [ ] Frontend rendering does not use manual DOM construction or a parallel vanilla-JavaScript renderer.
- [ ] `php backend/tests/RayonServiceTest.php` passes.

## 8. Deliverables and Demonstration

Submit the working application and a short explanation of:

1. Where Alpine.js is loaded and where its component is defined.
2. How the required directives are used.
3. How Fetch communicates with the existing PHP API.
4. How changing reactive state updates the UI.
5. One complete CRUD flow from button/form action through PHP and back to the rendered list.

Demonstrate one search, one Create or Update operation, and a canceled and confirmed Delete.
