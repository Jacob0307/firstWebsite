<?php
    session_start(); 
     $_SESSION['cart'] = array();
  header('Location: display_cart.php');
?>
 