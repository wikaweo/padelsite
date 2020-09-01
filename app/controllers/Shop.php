<?php
    class Shop extends Controller {

        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->shopModel = $this->model('Shopitem');
        }


        public function index(){

            $shopitems = $this->shopModel->getItems();

            $data = [
                'shopitems' => $shopitems
            ];

            $this->view('shop/index', $data);
        }

        public function charge() {
            $input = ['title' => 'charge'];
            $this->view('shop/charge', $input);
        }

        public function success() {
            $input = ['title' => 'SUCCESS'];
            $this->view('shop/success', $input);
        }

        public function checkout(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'name' => trim($_POST['name']),
                    'description' => trim($_POST['description']),
                    'price' => trim($_POST['price'])
                ];

                if($this->shopModel->addItem($data)){
                    flash('post_message', 'Item added');
                    redirect('shop');
                } else {
                    die('Något gick fel');
                }

                $this->view('shop/add', $data);

            } else {
                $shopitems = $this->shopModel->getShoppingcartItems();

                $prices = array_column($shopitems, 'price');
                $sumprices = array_sum($prices);

                $data = [
                    'title' => 'Varukorg',
                    'checkoutItems' => $shopitems,
                    'totalsum' => $sumprices
                ];
    
                $this->view('shop/checkout', $data);
            }
        }
    }