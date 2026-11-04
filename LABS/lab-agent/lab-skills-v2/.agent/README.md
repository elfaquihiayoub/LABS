Service: Handles business logic and validation.

BaseService: Parent class containing common reusable methods.

Inheritance: Specific Services extend BaseService to reuse functionality.

DAO (Data Access Object): Handles data access and storage operations.

Separation of Concerns: Each class has a specific responsibility.

Workflow: Controller → Service → BaseService / DAO → Data Storage.

Practical Example: Category / Thematique CRUD management.

PHP Code Examples: BaseService, CategoryService, and CategoryDAO.