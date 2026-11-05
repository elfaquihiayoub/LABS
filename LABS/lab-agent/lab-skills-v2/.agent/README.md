Service: Handles business logic and validation.

BaseService: Parent class containing common reusable methods.

Inheritance: Specific Services extend BaseService to reuse functionality.

DAO (Data Access Object): Handles data access and storage operations.

Separation of Concerns: Each class has a specific responsibility.

Workflow: Controller → Service → BaseService / DAO → Data Storage.

Practical Example: Category / Thematique CRUD management.

PHP Code Examples: BaseService, CategoryService, and CategoryDAO.
## Lab Objective

**Main Objective:**

Understand and explain the PHP OOP architecture based on Service, BaseService and DAO, including their responsibilities, relationships, inheritance and workflow.

**Learning Outcomes:**

At the end of this Lab, the learner should be able to:

- Explain the role of Service, BaseService and DAO.
- Understand how inheritance allows Services to reuse common methods.
- Explain the principle of Separation of Concerns.
- Understand the workflow between Controller, Service, BaseService, DAO and Data Storage.
- Analyze and explain PHP code examples using CategoryService, BaseService and CategoryDAO.

**Practical Example:**

Use Category / Thematique management to illustrate how these components work together.

**Important Scope:**

The main purpose is learning, understanding and explaining the architecture. Code examples are used to illustrate the concepts. Building a complete CRUD application is not the primary objective.