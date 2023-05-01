<?php
    session_start(); 
    echo $_POST['product'];
    unset($_SESSION['cart'][$_POST['product']]);
    header('Location: display_cart.php');
?>
 