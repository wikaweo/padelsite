<?php
    class Users extends Controller {
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function register(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $userRegInput = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];

                if(empty($userRegInput['email'])){
                    $userRegInput['email_error'] = 'Please enter email';
                } else {
                    if($this->userModel->findUserByEmail($userRegInput['email'])){
                        $userRegInput['email_error'] = 'Email is already taken';
                    }
                }

                if(empty($userRegInput['name'])){
                    $userRegInput['name_error'] = 'Please enter name';
                }

                if(empty($userRegInput['password'])){
                    $userRegInput['password_error'] = 'Please enter password';
                } elseif(strlen($userRegInput['password']) < 6) {
                    $userRegInput['password_error'] = 'Password must be at least 6 characters';
                }

                if(empty($userRegInput['confirm_password'])){
                    $userRegInput['confirm_password_error'] = 'Please confirm password';
                } else {
                    if($userRegInput['password'] != $userRegInput['confirm_password']) {
                        $userRegInput['confirm_password_error'] = 'Passwords do not match';
                    }
                }

                if(empty($userRegInput['email_error']) && empty($userRegInput['name_error']) 
                && empty($userRegInput['password_error']) && empty($userRegInput['confirm_password_error'])) {
                    
                    $userRegInput['password'] = password_hash($userRegInput['password'], PASSWORD_DEFAULT);
                
                    if($this->userModel->register($userRegInput)){
                        flash('register_succes', 'Du är nu registrerad och kan logga in');
                        redirect('/users/login');
                    } else {
                        die('Något gick fel');
                    }
                } else {
                    $this->view('users/register', $userRegInput);
                }

            } else {
                $userRegInput = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_error' => '',
                    'email_error' => '',
                    'password_error' => '',
                    'confirm_password_error' => ''
                ];

                $this->view('users/register', $userRegInput);
            }
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $userRegInput = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_error' => '',
                    'password_error' => ''
                ];

                if(empty($userRegInput['email'])){
                    $userRegInput['email_error'] = 'Please enter email';
                }

                if(empty($userRegInput['password'])){
                    $userRegInput['password_error'] = 'Please enter password';
                }

                if($this->userModel->findUserByEmail($userRegInput['email'])){

                } else {
                    $userRegInput['email_error'] = 'No user found';
                }

                if(empty($userRegInput['email_error']) && empty($userRegInput['password_error'])) {
                    // User is validated
                    $loggedInUser = $this->userModel->login($userRegInput['email'], $userRegInput['password']);

                    if($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                    } else {
                        $userRegInput['password_error'] = 'Felaktigt lösenord';

                        $this->view('users/login', $userRegInput);
                    }
                    
                } else {
                    $this->view('users/login', $userRegInput);
                }
                
            } else {
                $userLoginInput = [
                    'email' => '',
                    'password' => '',
                    'email_error' => '',
                    'password_error' => ''
                ];

                $this->view('users/login', $userLoginInput);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('shop');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }
    }