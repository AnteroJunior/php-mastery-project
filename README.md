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

### Magic method __construct()

This method allow us to create a instance of a class by passing arguments to it. 
It is important and helpfull, avoiding code duplication and saving effort. 

__construct is called when we invoke the class with `new` operator.

``` php
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

``` php
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


``` php
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