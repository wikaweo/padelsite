<?php
    class User {
        private $database;

        public function __construct(){
            $this->database = new Database;
        }

        public function register($userRegInput){
            $this->database->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            $this->database->bind(':name', $userRegInput['name']);
            $this->database->bind(':email', $userRegInput['email']);
            $this->database->bind(':password', $userRegInput['password']);

            if($this->database->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password){
            $this->database->query('SELECT * FROM users WHERE email = :email');
            $this-> database->bind(':email', $email);

            $row = $this->database->single();

            $hashed_password = $row->password;

            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        public function findUserByEmail($email){
            $this->database->query('SELECT * FROM users WHERE email = :email');
            $this->database->bind(':email', $email);

            $row = $this->database->single();

            if($this->database->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
    }