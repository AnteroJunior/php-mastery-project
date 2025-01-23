<?php 

    class User {
        private $name = 'John Doe';
        private $email = 'a@a.com';
        private $password = '12345';

        public function getName() {
            echo $this->name;
        }

    }

?>