<?php session_start(); ?>
  
<?php require_once '../classes/Order.php'; ?>
<?php require_once '../classes/Orderdetails.php'; ?>
<?php require_once '../classes/Products.php'; ?>
<?php require_once '../classes/Cat.php'; ?>
  <?php require_once '../classes/Validation/Validator.php'; ?> 
<?php

use validation\Validator;

if (isset($_POST['buy'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Address = $_POST['Address'];
    $v = new Validator();
    $v->rules('name', $name, ['required', 'string']);
    $v->rules('Email', $email, ['required', 'string']);
    $v->rules('Address', $Address, ['required', 'string']);
    $errors = $v->errors;
    $_SESSION['errors'] = $errors;
    
    if (true) {
        $data = [
            'CustomerName' => $name,
            'CustomerEmail' => $email,
            'CustomerPhone' => $phone,
            'CustomerAddress' => $Address,

        ];
        $prod = new Order();
        $result = $prod->store($data);

        foreach ($_SESSION['cart'] as $cart_id) {
            $prod = new Products();
            $products = $prod->getOne($cart_id);


            $ord = new Order();
            $order = $ord->getOne($email);
            $orderId = $order['order_id'];
             
            $productsId = $cart_id;
          
            $price = $products['price'];
            
             
            $data = [
                'order_id' => $orderId,
                'product_id' => $productsId,
                'pirceEach' => $price

            ];
            $details = new Orderdetails();
            $order_details = $details->store($data);
        }

        if ($result == true) {
            header('location:../index.php');
        } else {
        }
        //store in database
        // if stored in database
        if (true) {
            header('location:../index.php');
            session_destroy();
        } else {
        }
    } else {

        header('location:../buy.php');
    }
} else {
    header('location:../buy.php');
}
?>
 