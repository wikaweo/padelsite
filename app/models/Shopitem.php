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
            $this->database->query('SELECT * FROM shoppingcart');

            $results = $this->database->resultSet();

            return $results;
        }

        public function addItem($data){
            $this->database->query('INSERT INTO shoppingcart (name, description, price) VALUES(:name, :description, :price)');
            $this->database->bind(':name', $data['name']);
            $this->database->bind(':description', $data['description']);
            $this->database->bind(':price', $data['price']);

            if($this->database->execute()){
                return true;
            } else {
                return false;
            }
        }
    }