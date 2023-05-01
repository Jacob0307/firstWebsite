
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
        <?php
          session_start();
         //format the names so it is easy to display when a sub category page is displayed 
          $_SESSION['formatted_names'] = array(
            "meat" => "Meat",
            "fruitAndVegetables" => "Fruit and Vegetables",
            "dairyAndEggs" => "Dairy and Eggs",
            "bakery" => "Bakery",
            "confectionary" => "Confectionary",  
          );
          include 'establish_connection.php';
          if(isset($_POST['product'])) { // $type refers to the category of subitem if i clicked subcategory from index or another subcategory i pass the
                                          // name of subcategory to be displayed through a post variable.
                                          // other wise i get the name of the subcategory from the session variable. this is when run the update cart script and want to go back to the 
                                          // page i was on previously 
          $type = $_POST['product'];
          }
          else{
          $type =  $_SESSION['subCategory'];

          }
          echo '<h1 id="page-title"> '.$_SESSION['formatted_names'][$type].'  </h1>';
            echo '<ul id="k">';
            $sql = "SELECT * FROM products WHERE product_category IN ('$type')";
            
            $result = mysqli_query($mysqli,$sql);

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
                      <input type="hidden" value="'.$type.'" name="cameFrom"> 
                  </form>
                  <form action="singleItem.php" method="post"> 
                    <button type="submit" > Item Info</button> 
                    <input type="hidden"   value="'.$row['product_name'].'"  name="product" >
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