# Moot is an MVC framework and CMS
It implements an MVC system design following the opinions that controllers should not be responsible for determining which views are paired with which models. Instead, the concept of containers is used that construct and operate on the trio. The point of implementing MVC in this way is to promote easy model and controller reusability as demonstrated in the `Containers\UserContainer` container.

### SPA support
Moot enables wiring frontend containers to backend containers through the use of model serialization.

Frontend built with Vue 2.

### The purpose of this project repo is to demonstrate PHP knowledge and skill.
PHP language features demonstrated in this project:
- OOP
- SPL autoloading
- Attributes
- Traits
- Reflection
- Type hinting
- ArrayAccess
  
Software development patterns demonstrated
- Singleton
- Flyweight
- Polymorphism
- Facade
- Factory

## Development
- Download and install VS Code
- Clone repo
- Install Dev Container extensions
- Open in Dev Container

WSL2 supported.

Vue dev: `http://localhost:5173/`
CMS dev: `http://localhost/actuate.php?container=Containers\AccountContainer&action=Actions\SaveUserAction`
