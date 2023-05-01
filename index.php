

<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <script src="script.js"></script>

      <link rel="stylesheet" href="styles.css" />
      <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=Oleo+Script:wght@700&family=Quicksand:wght@300;500;700&display=swap"
        rel="stylesheet"
      />
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;600&family=Zilla+Slab:wght@400;600&display=swap" rel="stylesheet">
  </head>
  <body>
      <header id="header">
          <div id="page-logo"> <a href="index.php">Jacobs Store</a></div>
          <form action="display_search_results.php" method="post">
                  <input for="text" placeholder="Search for an item" name="query"></label>
                  <button type="submit"> Search </button>
          </form>
          <form id="cartForm" action="display_cart.php" method="post">
              <img id="cart" src="/A1/images/cart.png">
          </form>
      </header>
          <div id="menu-bar">
            <ul id="items"> <form action=""></form>
                <li> 
                  <form action="display_sub_items.php" method="post">
                    <button id="r"  >Meat</button>
                    <input type="hidden" value="meat" name="product">
                  </form>
                </li>
                <li>
                  <form action="display_sub_items.php" method="post">
                    <button id="r"> Fruit and Vegetables</button>
                    <input type="hidden" value="fruitAndVegetables" name="product">
                  </form>
                </li>
                <li>
                  <form action="display_sub_items.php" method="post">
                    <button id="r"> Dairy and Eggs</button>
                    <input type="hidden" value="dairyAndEggs" name="product">
                  </form>
                </li>
                <li> 
                  <form action="display_sub_items.php" method="post">
                    <button id="r"> Bakery</button>
                    <input type="hidden" value="bakery" name="product">
                  </form>
                </li>

                <li>
                  <form action="display_sub_items.php" method="post">
                    <button id="r"> Confectionary</button>
                    <input type="hidden" value="confectionary" name="product">
                    </form>
                </li>  
              </ul>
          </div>
          <main> 
        <h1 id ="page-title"> todays specials</h1>
        <ul>
        
        <?php
        // NOTE - i read that items need to be stored in other structues than a list however to achive the styling 
        // i needed to use a list with the grid style in css 
          include 'establish_connection.php';
          session_start();
         if (!isset($_SESSION['cart'])){
          $_SESSION['cart'] = array();
         };
          $sql = "SELECT * FROM products WHERE product_name IN ('Apples','Bagel','Crumpet','Jelly Beans','Beef Mince','Mango')"; // hard code to get the specials for my index page
          $result = mysqli_query($mysqli,$sql);
          while($row = mysqli_fetch_assoc($result)){
              echo '<li id="sale-item">
          <div>
            <img src="/assignment1/images/'.$row['product_name'].'.png" alt="">
            <div id="info">
                <div>
                  <h2>'.$row['product_name'].'</h2>
                  <p id="strike">$'.round($row['unit_price'] * 1.5,2).'</p><p>$'.$row['unit_price'].'</p>
                </div>
              </div>
              <div id="Buttons">
                <form action="update_cart.php" method="post">';
                  if (isset($_SESSION['cart'][$row['product_id']]['in_stock']) and $_SESSION['cart'][$row['product_id']]['in_stock'] <= 0) {
                    echo '<button disabled class="disable" type="submit" > add to cart</button>';
                  }
                  else{ 
                      echo '<button type="submit" > add to cart</button>';
                    }
                    echo'
                    <input type="hidden" value="'.$row['product_id'].'" name="product_id">
                    <input type="hidden" value="'.$row['product_name'].'" name="product_name">
                    <input type="hidden" value="'.$row['unit_price'].'" name="unit_price">
                    <input type="hidden" value="'.$row['in_stock'].'" name="in_stock">
                    <input type="hidden" value="'.$row['unit_quantity'].'" name="unit_quantity">
                    <input type="hidden" value="Specials" name="cameFrom"> 
                </form>
              
                <form action="singleItem.php" method="post"> 
                  <button type="submit" > Item Info</button> 
                  <input type="hidden" value="'.$row['product_name'].'"  name="product" >
                </form>
                
                <button type="submit" > amount left in stock: ';
                if(isset($_SESSION['cart'][$row['product_id']]['in_stock'])) {
                echo $_SESSION['cart'][$row['product_id']]['in_stock'];}
                else{
                  echo $row['in_stock']; 
                }
                echo'
                </button>
            </div>  
        </div>  
      </li>';
      }
      ?>
      </ul>
    </main>
  </body>
</html>


<script>
    document.getElementById("cart").addEventListener("click", function() {
    document.getElementById("cartForm").submit();
  });

</script>

 

