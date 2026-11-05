---
marp: true
theme: default
paginate: true
size: 16:9
---

<!-- _class: title -->

# Alpine.js

## A Reactive Frontend for Rayon Management

**Lab:** PHP 3-Tier Application  
**Focus:** Alpine.js, Fetch API, and reactive UI

<!--
Today we study Alpine.js.
We use the Rayon application.
We keep the PHP layers.
-->

---

# Learning goals

- Understand Alpine.js and reactive state.
- Use core directives to control the interface.
- Connect the frontend to the existing PHP API.
- Preserve the Controller, Service, BaseService, and DAO layers.

**Key idea:** Alpine.js manages the presentation, not business rules or storage.

<!--
Alpine.js helps the page.
PHP keeps the business rules.
The DAO keeps the data.
-->

---

# The application architecture

```text
Presentation
index.html + app.js
      │ Fetch API
      ▼
Controller: controllerRayon.php
      ▼
RayonService ── extends ── BaseService
      │
      ▼
RayonDAO
      │
      ▼
rayon.json
```

- Alpine.js controls state and user interaction in the frontend.
- PHP receives requests, applies rules, and accesses storage.
- The API endpoints and JSON response formats stay the same.

<!--
The page sends a request.
The Controller calls the Service.
The DAO saves the data.
-->

---

# Alpine.js connects HTML and state

```html
<div x-data="rayonManager">
  <input x-model="search" placeholder="Search Rayons">

  <template x-for="rayon in filteredRayons" :key="rayon.id">
    <p x-text="rayon.nom"></p>
  </template>
</div>
```

- `x-data` creates the component and its state.
- `x-model` keeps the input and state in sync.
- `x-for` repeats a template; `x-text` displays text safely.

<!--
The component stores the data.
The input updates the search.
The list follows the data.
-->

---

# Directives for interaction

| Directive | Use in the Rayon interface |
|---|---|
| `x-show` | Show or hide a form or dialog |
| `x-transition` | Animate a form, dialog, or toast |
| `@click` | Open, cancel, edit, or confirm an action |
| `@submit.prevent` | Handle form submit without a page reload |
| `x-text` | Show Rayon values and messages |

Reactive state also controls loading indicators and success or error toasts.

<!--
Buttons call component methods.
The form prevents a page reload.
State controls what we see.
-->

---

# Search and dynamic rendering

1. The search box uses `x-model="search"`.
2. `filteredRayons` checks the Rayon name and location.
3. `x-for` renders the matching rows.
4. Alpine updates the list as the search value changes.

**No manual row creation. No page reload.**

<!--
I type a search word.
Alpine filters the Rayons.
The table updates at once.
-->

---

# One complete operation: Create

```text
User fills the form
        │ @submit.prevent
        ▼
Alpine sends Fetch POST with JSON
        │
        ▼
Controller → RayonService → RayonDAO → rayon.json
        │
        ▼
API returns the created Rayon
        │
        ▼
Alpine adds it to reactive state
        │
        ▼
The table updates and a toast appears
```

The Service validates the data. The frontend does not take over backend rules.

<!--
The user enters a Rayon.
PHP checks and saves it.
Alpine updates the table.
-->

---

# Read, Update, and Delete

- **Read:** Fetch `GET`; store the returned array in `rayons`.
- **Update:** Fetch `PUT ?id=<id>`; replace the matching reactive record.
- **Delete:** ask for confirmation, then Fetch `DELETE ?id=<id>` and remove the record.
- **All requests:** show loading state and report success or errors.

The existing controller continues to return its current JSON response shapes.

<!--
GET loads all Rayons.
PUT changes one Rayon.
DELETE needs confirmation.
-->

---

# Presentation-only responsibilities

**Alpine.js owns**

- Search text and visible records
- Form values and open or closed UI
- Loading state, confirmation, and notifications

**PHP owns**

- Request handling and JSON responses
- Validation and business rules
- Reading and writing stored data

<!--
Alpine.js manages the interface.
PHP applies the business rules.
The DAO accesses the storage.
-->

---

# Demo and mini-challenge

### Demonstrate

1. Search for a Rayon by name or location.
2. Open Add, submit a Rayon, and observe the reactive list.
3. Edit a Rayon and confirm the updated values.
4. Cancel one deletion, then confirm another.

### Mini-challenge

Add a clear-search button that appears only when the search field has text. Use Alpine directives and do not send an API request.

<!--
I can search the list.
I can create and edit Rayons.
I can explain the PHP flow.
-->
