<?php 

    class User {
        private $name ;
        private $email;
        private $password;

        // With this method, we can create an instance of the class and stop initiating
        // properties outside of the class
        public function __construct($name, $email, $password) {
            // Now we can initiate properties by passing them as arguments
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
        }

        public function getName() {
            echo $this->name;
        }

    }


    // But better then the previous class is to use constructor property promotion
    // by adding the visibility keyword before the argument name

    class User2 {

        
        public function __construct(public $name, public $email, public $password) {}

        public function getName() {
            echo $this->name;
        }
    }

    // Using named arguments
    class User3 {
        public function __construct(public $name = 'John', public $email = 'john@doe.com', public $password = '') {}

        public getName() {
            echo $this->name;
        }
    }

    // A new User3 obj specifying arguments
    $user3 = new User3(name: 'Antero', password: '123');

?>