<?php 

    // Using the classic example of OOP subject
    // At this point of the book we must ensure property type and visibility
    class Animal {
        
        public function __construct(
            private string $name,
            private int $paws,
            private string $color,
        ) {

        }

        // Just to exemplify how to change a property with accessor method
        public function changeName(string $name): void {
            $this->name = $name;
        }

        public function sayName(): string {
            return $this->name . PHP_EOL;
        }

        public function makeSound(): string {
            return 'The animal makes a sound' . PHP_EOL;
        }

    }

    class Dog extends Animal {
        private bool $canClimbTrees = false;

        public function __construct(
            string $name,
            int $paws,
            string $color,
            bool $canClimbTrees
        ) {
            parent::__construct($name, $paws, $color);
            $this->canClimbTrees = $canClimbTrees;
        }
    }

?>