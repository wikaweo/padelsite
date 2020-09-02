<?php
    class ShopItem {
        private $database;

        public function __construct(){
            $this->database = new Database;
        }

        public function getItems(){
            $this->database->query('SELECT * FROM items');

            $results = $this->database->resultSet();

            return $results;
        }

        public function getShoppingcartItems(){
            $this->database->query('SELECT * FROM shoppingcart WHERE user_id = :user_id');
            $this->database->bind(':user_id', $_SESSION['user_id']);
                
            $rows = $this->database->resultSet();
            return $rows;
        }

        public function addItem($data){
            $this->database->query('INSERT INTO shoppingcart (name, description, price, user_id) VALUES(:name, :description, :price, :user_id)');
            $this->database->bind(':name', $data['name']);
            $this->database->bind(':description', $data['description']);
            $this->database->bind(':price', $data['price']);
            $this->database->bind(':user_id', $_SESSION['user_id']);
            

            if($this->database->execute()){
                return true;
            } else {
                return false;
            }
        }
    }