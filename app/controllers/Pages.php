<?php
    class Pages extends Controller {
    public function __construct() {

    }

    public function index(){
        if(isLoggedIn()){
            redirect('shop/checkout');
        }

        $input = ['title' => 'Välkommen', 'description' => 'Enkel betalningssida'];

        $this->view('pages/index', $input);
    }

    public function about() {
        $input = ['title' => 'Om oss', 'description' => 'Om betalningssidan'];
        $this->view('pages/about', $input);
    }
}