<?php 
    require_once(APPROOT .'/vendor/autoload.php');

    \Stripe\Stripe::setApiKey('sk_test_51HJycfBU9hC24xX5Z04q8gyTJiAhD0eY4gm8BPAjh31eF5le1TApLe7WLWyQrUrNOzYB2OUA75w2alF5b9lzMcHA000suLRXhW');

    //$stripe = new \Stripe\StripeClient('sk_test_51HJycfBU9hC24xX5Z04q8gyTJiAhD0eY4gm8BPAjh31eF5le1TApLe7WLWyQrUrNOzYB2OUA75w2alF5b9lzMcHA000suLRXhW');
/*$customer = $stripe->customers->create([
    'description' => 'example customer',
    'email' => 'email@example.com',
    'payment_method' => 'pm_card_visa',
]);*/
//echo $customer;


$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];
$totalprice = $POST['totalprice'];


$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));


$charge = \Stripe\Charge::create(array(
    "amount" => $totalprice,
    "currency" => "sek",
    "description" => "padel",
    "customer" => $customer->id
));



$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email
];

$customer = new Customer();


$customer->addCustomer($customerData);

$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status 
];

$transaction = new Transaction();


$transaction->addTransaction($transactionData);



//print_r($charge);

header('Location: success');


//echo $token;

require APPROOT . '/views/increments/footer.php';?>