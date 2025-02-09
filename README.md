# PHP Mastery Project

This project aims to implement advanced PHP 8 concepts, exploring OOP and modern design patterns. Each feature developed throughout the project reflects the lessons learned from the book PHP 8: Objects, Patterns, and Practice, with continuous improvements, refactoring, and the application of best development practices.

Here, experiments and hands-on projects form the foundation for mastering PHP code architecture, using best practices for code organization, scalability, and efficiency.

### Exploring OOP (Object-Oriented Programming)

The first part of the project focuses on understanding and applying fundamental Object-Oriented Programming (OOP) concepts, with an emphasis on good practices in using classes, attributes, and methods.

### Visibility of Attributes and Methods

It's crucial to define the appropriate visibility for class attributes and methods:

    private attributes and methods: Can only be accessed within the class itself.
    public attributes and methods: Can be accessed from outside the class, allowing interaction with the class instance.

### Best Practices in OOP Usage

Correct use of visibility and encapsulation ensures the integrity and security of class data, making the code more maintainable and scalable.

### Magic method \_\_construct()

This method allow us to create a instance of a class by passing arguments to it.
It is important and helpfull, avoiding code duplication and saving effort.

\_\_construct is called when we invoke the class with `new` operator.

```php
class User {
    public $name;
    public $surname;
    public $age;

    public function __construct($name, $surname, $age) {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    public function getFullName() {
        return "$this->name $this->surname";
    }

}
```

It is also good to remember that PHP 8 brought us a new feature called constructor property promotion: by providing the visibility keyword for the constructor arguments we can combine them with property declarations and assign at the same time. Let's check it out.

```php
class User {

    public function __construct(public $name, public $surname, public $age) {}

    public function getFullName() {
        return "$this->name $this->surname";
    }

}

```

Now we have a compact class and we are able to focus on the logic.

### Named arguments

As our class grow in complexity we might need to create default values to some parameters as it follows:

```php
class User {

    public function __construct(public $name = '', public $surname = 'Junior', public $age = 18) {}

    public function getFullName() {
        return "$this->name $this->surname";
    }

}
```

With this, we can only call `new User()` and we would have a object with name = '', surname = Junior and age = 18. If we want to initiate the class with different values we must pass the values we want.

What if we want to leave $surname as it is? Easy! PHP 8 have introduced named arguments which means we can call them directly in the class call:

`new User(name: 'Antero', age: 26);`

With that we created an User object with name = Antero, age = 26 and surname still Junior.

## Types 

### Parameter Typing

In the parameters of methods and functions, we can add types so that PHP detects them at runtime and informs us.
The types are:
    string
    boolean
    object
    integer
    float
    array
    and many more. 

PHP 8 also introduced the concept of mixed types, which is equivalent to "any" in TypeScript.

By passing the type inside the function parameters, we can ensure that it will be of that type.

    We can tell PHP to perform type conversion directly on the parameter by declaring, in the file that CALLS the function: declare(strict_types=1);

### Union Types

We use this implementation to indicate that the parameter can accept different types, but still valid for the operation.

`function x(string|bool $param) {}`

Here, we know that $param can be either a string or a bool. We can also specify the class type as a type hint, since we are creating a new object.

`function x(ClassX|string|bool $param) {}`

**Return Typing**

We can also add the return type to our function/method. The types are the same as those already mentioned.

There is one type that can be used in the return but not in the function parameters: void.
This type indicates that the function does not return anything, meaning it can be basically a set function — for example, setPrice.

## Inheritance

When we create a class, we can extend its functionality to another, which is called inheritance.
See:

`class B extends A {}`

Our class is inheriting all the methods — public and protected — from the parent class, since private methods cannot be accessed by the child class.

In case of any changes to the constructor of the child class, we call the parent's constructor:
`parent::__construct()`
We are responsible for passing the correct information to the parent class.

We must call it before defining our methods and parameters.

### Security

To ensure the security of a class's information, we must properly manage the visibility of its properties and methods — public, private, or protected.

Public and protected can be accessed from outside the parent class, unlike private.

By doing this, we can also add accessor methods, which do not allow direct access to the methods and properties.
