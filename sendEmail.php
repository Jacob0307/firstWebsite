<?php

 
    include 'establish_connection.php';
    session_start();
     
    date_default_timezone_set('Australia/Sydney');
    $date = date('l, F j, Y g:i A'); 
    $recipiant = $_POST['email'];
    $subject = "Online order conformation";

    $price =  $_SESSION['totalPrice']; 
    $shoppingDetails="";
    foreach($_SESSION['cart'] as $item) { 
        $name = $item['product_name'];
        $quantity = $item['quantity'];
        $unit_price = $item['unit_price'];
        $shoppingDetails .= "$name, quantity of item:  $quantity - price of item: $unit_price each\n";
        // actually update the databases product with the quantity shown in checkout
     $query = "UPDATE products SET in_stock = in_stock - {$item['quantity']} WHERE product_id = {$item['product_id']}"; 
    $result = mysqli_query($mysqli, $query);
    }
   
    $email = $_POST['email'];
    $name = $_POST['name']; 
    $mailString = "";
    $mailString .= "Thank you $name, your order placed on the  $date, for  $shoppingDetails comes to a total price of $price. We will send your order out to you shortly! kind regards.";
    
    $header = "From: Jacob Basham <jacobbasham1@gmail.com>\r\n";
    $header .= "Reply-To: jacobbasham1@gmail.com\r\n";
    $header .= "Return-Path: jacobbasham1@gmail.com\r\n";
    $header .= "Content-Type: text/html; charset=UTF-8\r\n";
    $header .= "MIME-Version: 1.0\r\n";

    ini_set("SMTP","smtp.gmail.com");
    ini_set("smtp_port","25");

    $_SESSION['cart'] = array(); // empty cart 
   // mail($recipiant,$subject,$mailString,$header); have had a large deal of trouble trying to send an email out, hence why its commented out 
   header('Location: index.php'); 






?>