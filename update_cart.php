
<?php
   session_start(); 

   // this was the hardest part of the assignemt as any time i would add a product to the cart i wouldnt know how to get back to that specific page
   // eg i was on a single item information and i added it it was very hard to get back to that item 

    $host = 'localhost';
    $user = 'jacob';
    $password = 'jacob';
    $database = 'assignment1';

    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        die('Failed to connect to MySQL: ' . $mysqli->connect_error);
    }


$in_stock = $_POST['in_stock'];
$unit_price = $_POST['unit_price'];
$unit_quantity = $_POST['unit_quantity'];
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];


if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]['quantity']++;
} 
else {
    // If it isn't, add the product to the cart
    $_SESSION['cart'][$product_id] = array(
        'product_id' => $product_id,
        'product_name' => $product_name,
        'unit_price' => $unit_price,
        'quantity' => 1,
        'in_stock' => $in_stock
    );
}

$_SESSION['cart'][$product_id]['in_stock']--;

// in each form for every page i added a post variable that told me where i came from. 
if($_POST['cameFrom'] == 'Single') {
    $_SESSION['lastItem'] = $product_name;
    header('Location: singleItem.php'); 
  }
  else if($_POST['cameFrom'] == 'Specials') {
  
    header('Location: index.php'); 
  }
  else if($_POST['cameFrom'] == 'cart') {
    header('Location: display_cart.php'); 
  }
  else if($_POST['cameFrom'] == 'searchQuery') {
    header('Location: display_search_results.php'); 
  }

  else{
  $_SESSION['subCategory'] = $_POST['cameFrom'];
   header('Location: display_sub_items.php'); 
  }


?>