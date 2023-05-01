
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="styles.css" />
      <link
        href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=Oleo+Script:wght@700&family=Quicksand:wght@300;500;700&display=swap"
        rel="stylesheet"
      /> 
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
          <div id="menu-bar">
            <ul id="items"> <form action=""></form>
                <li> 
                  <form action="display_sub_items.php" method="post">
                    <button id="r"  >Meat</button>
                    <input type="hidden" value="meat" name="product">
                  </form>
                    <ul id="normal">
                        <a href="">Product 1</a></li>
                      <li><a href="#">Product 2</a></li>
                      <li><a href="#">Product 3</a></li>
                    </ul>
                </li>
                <li>
                  <form action="display_sub_items.php" method="post">
                    <button id="r"> Fruit and Vegetables</button>
                    <input type="hidden" value="fruitAndVegetables" name="product">
                  </form>
                  <ul id="normal">
                    <li><a href="#">Product 1</a></li>
                    <li><a href="#">Product 2</a></li>
                    <li><a href="#">Product 3</a></li>
                  </ul>
                </li>
                <li>
                  <form action="display_sub_items.php" method="post">
                    <button id="r"> Dairy and Eggs</button>
                    <input type="hidden" value="dairyAndEggs" name="product">
                  </form>
                  <ul id="normal">
                    <li><a href="#">Product 1</a></li>
                    <li><a href="#">Product 2</a></li>
                    <li><a href="#">Product 3</a></li>
                  </ul>
                </li>
                <li> 
                  <form action="display_sub_items.php" method="post">
                    <button id="r"> Bakery</button>
                    <input type="hidden" value="bakery" name="product">
                  </form>
                  <ul id="normal">
                    <li><a href="#">Product 1</a></li>
                    <li><a href="#">Product 2</a></li>
                    <li><a href="#">Product 3</a></li>
                  </ul>
                </li>
                <li>
                  <form action="display_sub_items.php" method="post">
                    <button id="r"> Confectionary</button>
                    <input type="hidden" value="confectionary" name="product">
                    </form>
                  <ul id="normal">
                    <li><a href="#">Product 1</a></li>
                    <li><a href="#">Product 2</a></li>
                    <li><a href="#">Product 3</a></li>
                  </ul>
                </li>  
              </ul>
          </div>
        <main>
          <?php
          include 'establish_connection.php';
          session_start();
          echo '<ul id="k">';
            if(isset($_SESSION['searchQuery'])and !isset($_POST['query'])) {
              $searchItems = $_SESSION['searchQuery'];
            }
            else{
            $searchItems = $_POST['query'];
            }
            $_SESSION['searchQuery'] = $searchItems;
            $keywords = explode(" ", $searchItems);

            $query = ""; 

            foreach ($keywords as $keyword) {
              $query .= "product_category LIKE '%" . $keyword . "%' OR "; // looks for products with the same product name as the keywords
              $query .= "product_name LIKE '%" . $keyword . "%' OR ";     // // looks products for with the same category as the keywords
            }
            $query = rtrim($query, " OR ");

            $runQuery = "SELECT * FROM products WHERE $query"; 

            $result = mysqli_query($mysqli, $runQuery);
            if (mysqli_num_rows($result) == 0) { 
              echo '<h2> Sorry there are no results found for '.$searchItems.'</h2>';
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                  echo '<li id="sale-item">
                  <div onclick="singleItem(\''.$row['product_name'].'\')">
                    <img src="/A1/images/'.$row['product_name'].'.png" alt=""> 
                    <div id="info">
                      <div>
                        <h2>'.$row['product_name'].'</h2> 
                        <p>$'.$row['unit_price'].'</p>
                      </div>
                    </div>
                    <div id="Buttons"> 
                    <form action="update_cart.php" method="post">';
                      if (isset($_SESSION['cart'][$row['product_id']]['in_stock']) and $_SESSION['cart'][$row['product_id']]['in_stock'] <= 0) {
                        echo '<button disabled type="submit" > add to cart</button>';
                        
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
                        <input type="hidden" value="searchQuery" name="cameFrom">
                    </form>
                    <form action="singleItem.php" method="post"> 
                      <button type="submit" > Item Info</button> 
                      <input type="hidden"   value="'.$row['product_name'].'"  name="product" >
                    </form>
                      </div>  
                  </div>  
                </li>'; 
                      }   
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
                    