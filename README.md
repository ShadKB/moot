# Moot is an MVC framework and CMS
This system implements an MVC architectural design that follows the controversial opinion that controllers **should not** be responsible combining the views to models. Instead, the concept of containers is used which encapsulates and carries out this logic.

### SPA support
Moot enables the wiring of front containers, such as React containers, to backend containers using model serialization.

The frontend admin is an SPA application built with Vue 2.

### The purpose of this project is to demonstrate my PHP knowledge and skill.
Note: I disregarded PSR standards for this project.

PHP language features demonstrated:
- OOP
- SPL autoloading
- Attributes
- Traits
- Reflection
- Type hinting
- ArrayAccess
  
Software development patterns demonstrated:
- Singleton
- Flyweight
- Polymorphism
- Facade
- Factory

## Development
- Install VS Code
- Clone this repo
- Install the dev container extensions in VS Code (see manifest in `devcontainer.json`)
- Open the project in a dev container in VS Code

WSL2 supported.

- Vue dev: `http://localhost:5173/` - Frontend development (supports hot loading)
- CMS dev: `http://localhost:8080/actuate.php?container=Containers\AccountContainer&action=Actions\SaveUserAction` - Backend development
