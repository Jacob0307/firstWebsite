<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=Oleo+Script:wght@700&family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet" />

</head>

<body>
  <header id="header">
    <div id="page-logo"> <a href="index.php">Jacobs Store</a></div>
    <form action="display_search_results.php" method="post">
      <input for="text" placeholder="Search for an item" name="query"></label>
      <button type="submit"> Search </button>
    </form>
    <form id="cartForm" action="display_cart.php" method="post">
      <img id="cart" src="/assignment1/images/cart.png">
    </form>
  </header>
  <main>
    <h1 id="page-title"> Your Cart </h1>
    <?php
    include 'establish_connection.php';
    session_start();
    echo '<div id="headerButtons">
            <form action="emptyCart.php" method="post">  
              <button type="submit" > Empty Cart </button> 
            </form>';
    if (count($_SESSION['cart']) > 0) {
      echo '<form action="checkout.php" method="post">  
                  <button type="submit"> Checkout </button> 
                   </form>
             </div>';
    } else {
      $_SESSION['cart'] = array();
      echo '  <form action="checkout.php" method="post">  
              <button class="disable" type="submit"> Checkout </button> 
          </form>
        </div>';
    }
    echo '<ul id="cartDisplay" >';
    foreach ($_SESSION['cart'] as $item) {
      echo '<li id="cartItem">
        <div onclick="singleItem(\'' . $item['product_name'] . '\')">
          <img id="cartImg"src="/A1/images/' . $item['product_name'] . '.png" alt=""> 
          <div id="info">
            <div>
              <h2 id="cartHeader">' . $item['product_name'] . '  $' . $item['unit_price'] . '</h2> 
            </div>
          </div>
          <div id="CartButtons"> 
            <button > Quantity: ' . $item['quantity'] . ' </button>
            
            <form action="removeFromCart.php" method="post">  
              <input type="hidden" name="product" value="' . $item['product_id'] . '">
              <button type="submit" > Remove From Cart </button> 
            </form>
            
            <button type="submit" > amount left in stock: ' . $item['in_stock'] . ' </button> 
            
            <form action="update_cart.php" method="post">';
              if (isset($item['cart'][$item['product_id']]['in_stock']) or $_SESSION['cart'][$item['product_id']]['in_stock'] <= 0) {
                echo '<button disabled class="disable" type="submit" > add to cart</button>';
              } else {
                echo '<button type="submit" > add to cart</button>';
              }         //below passes all item information to update_cart.php
              echo '
                  <input type="hidden" value="' . $item['product_id'] . '" name="product_id">
                  <input type="hidden" value="' . $item['product_name'] . '" name="product_name">
                  <input type="hidden" value="' . $item['unit_price'] . '" name="unit_price">
                  <input type="hidden" value="' . $item['in_stock'] . '" name="in_stock">
                  <input type="hidden" value="cart" name="cameFrom"> 
              </form>  

              </form>
            </div>
        </div>  
      </li>';
    }
    ?>
    </ul>
  </main>
</body>

</html>
<form action=""> </form>


<script>
  document.getElementById("cart").addEventListener("click", function() {
    document.getElementById("cartForm").submit();
  });

  function submitForm(element) {
    console.log("hi");
    element.querySelector('form').submit();
  }
</script>