<?php

    require './Animal.php';

    $dog = new Dog('Rex', 4, 'brown', false);

    // If we try to access a private property we will get an error
    //echo $dog->name;

    // If we try using the accessor method we will get the value
    echo $dog->sayName() . PHP_EOL;