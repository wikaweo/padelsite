<?php
    class Charges extends Controller {

        public function __construct(){
            $this->shopingcartModel = $this->model('Shoppingcart');
        }

        public function index(){

            $shopingcartitems = $this->shopingcartModel->getItems();

            $data = [
                'shopingcartitems' => $shopingcartitems
            ];

            $this->view('shop/checkout', $data);
        }
    }