<?php
session_start();
require_once("database-connection.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productById = $db_handle->runQuery("SELECT * FROM book WHERE book_id='" . $_GET["book_id"] . "'");
			$itemArray = array($productById[0]["book_id"]=>array('name'=>$productBybook_id[0]["name"], 'book_id'=>$productById[0]["book_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productById[0]["price"], 'photo'=>$productById[0]["photo"]));

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productById[0]["book_id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productById[0]["book_id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["book_id"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Richards International Online Book Store</title>
  <meta charset="utf-8">
  <meta name="description" content="Book Store, website design, software development">
  <meta name="author" content="Richards International Online Book Store">
  <meta name="keywords" content="Book Store">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <style>
  .btn {

    display: block;
    width: 75%;
    margin-left:66px;
    border: none;
    background-color:#DC143C;
    padding: 14px 28px;
    font-size: 17px;
    cursor: pointer;
    text-align: center;
    border-radius:3px;

  }

  .btn:hover {
    opacity: 0.8;
  }
  </style>
</head>

<body>
  <div id="container">
    <div id="header">
      <div id="header_nav">
        <a href="loginAdmin.html" style="color:#FFFFFF; font-size: 15px;">Admin</a>
        <a href="login.html" style="color:#FFFFFF; font-size: 15px;">Login</a>
        <a href="cart.php"><img src="images/cart.png" alt="cart image" /></a>
      </div>
      <div id="header_title">
        <p>Cart</p>
      </div>
    </div>

    <div id="content">
      <div id="left">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="books.php">Books</a></li>
          <li><a href="bestSellers.php">Best Sellers</a></li>
        </ul>
      </div>

      <div id="right">
        <div class="content_right_section">
          <h1>Categories</h1>
          <ul>
            <li><a href="#">Men's Fashion</a></li>
            <li><a href="#">Women's Fashion</a></li>
            <li><a href="#">Music</a></li>
            <li><a href="#">Mobiles, Computers</a></li>
            <li><a href="#">Electronics</a></li>
            <li><a href="#">Kitchen</a></li>
            <li><a href="#">Pets</a></li>
            <li><a href="#">Beauty</a></li>
            <li><a href="#">Health</a></li>
            <li><a href="#">Grocery</a></li>
            <li><a href="#">Car</a></li>
            <li><a href="#">Novels</a></li>
          </ul>
          <h1>Contact Us</h1>
          <ul>
            <li>Richards International Co.(Pvt)Ltd</li>
            <li>64,Perakumba Street Kurunegala Sri Lanka</li>
            <li><a title="Use alt + click to follow the link" href="mailto:64s@richards.lk">64s@richards.lk</a></li>
            <li><a title="Use alt + click to follow the link" href="mailto:sales@richards.lk">sales@richards.lk</a></li>
            <li><a title="Use alt + click to follow the link" href="tel:+94372222547">Tel : +94 37 222 2547</a></li>
            <li><a title="Use alt + click to follow the link" href="tel:+94372222547">Fax : +94 37 469 0701</a></li>
            <li>Facebook: Richards.Books</li>
          </ul>
        </div>
      </div>

      <!-- content center -->
      <div id="center">
        <div id="cart">
          <div class="txt-heading"></div>

          <a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
          <?php
          if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
            ?>
            <table class="tbl-cart" style="width:80%; text-align:center; font-size:20px;" cellpadding="10" cellspacing="1">
              <tbody>
                <tr>
                  <th>Item Number</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Total</th>
                </tr>
                <?php
                foreach ($_SESSION["cart_item"] as $item){
                  $item_price = $item["quantity"]*$item["price"];
                  ?>
                  <tr>
                    <td><?php echo $item["book_id"]; ?></td>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["quantity"]; ?></td>
                    <td><?php echo "$ ".$item["price"]; ?></td>
                    <td><?php echo "$ ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="cart.php?action=remove&book_id=<?php echo $item["book_id"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                  </tr>
                  <?php
                  $total_quantity += $item["quantity"];
                  $total_price += ($item["price"]*$item["quantity"]);
                }
                ?>

                <tr>
                  <td colspan="2" align="right"><strong>Total:</strong></td>
                  <td><?php echo $total_quantity; ?></td>
                  <td><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
            <?php
          } else {
            ?>
            <div class="no-records">Your Cart is Empty</div>
            <?php
          }
          ?>
        </div>

        <a class="btn" href="payment.html" style="color: white;">Checkout</a>
        <!-- <input type="submit" value="Checkout" class="btn" href="payment.html"> -->
      </div>
      <!-- footer -->
      <div id="footer">
        Copyright &copy; 2018 Richards International Co.(Pvt) Ltd. All Rights Reserved.<br>
        This document was last modified on:
        <script>
        document.write(document.lastModified);
        </script>
      </div>
    </div>
  </div>
</body>

</html>
