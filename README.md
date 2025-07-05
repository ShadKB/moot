# Moot is an MVC framework and CMS
It implements an MVC system design following the opinions that controllers should not be responsible for determining which views are paired with which models. Instead, the concept of containers is used that construct and operate on the trio. The point of implementing MVC in this way is to promote easy model and controller reusability as demonstrated in the `Moot\Containers\UserContainer` container.

### SPA support
Moot enables wiring frontend containers to backend containers through the use of model serialization.

### The purpose of this project repo is to demonstrate PHP knowledge and skill.
PHP language features demonstrated in this project:
- OOP
- SPL autoloading
- Attributes
- Traits
  
Software development patterns demonstrated
- Singleton
- Flyweight
- Polymorphism
- Facade
- Factory

**Example actuation URL that unserializes the backend model and returns the serialized model**
`https://app.domain.com/actuate.php?container=Moot\Containers\AccountContainer&action=Moot\Actions\SaveUserAction&serialize=true&unserialize=true`

**Example actuation URL that unserializes the backend model and returns the container HTML output with the saved, unserialized model**
`https://app.domain.com/actuate.php?container=Moot\Containers\AccountContainer&action=Moot\Actions\SaveUserAction&serialize=true`
