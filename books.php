<?php
include 'database-connection.php';
$sql = "SELECT * FROM book";
$result = mysqli_query($con, $sql);
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
  /* Popup container - can be anything you want */
  .popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* The actual popup */
  .popup .popupDetail {
    visibility: hidden;
    width: 500px;
    height: 300px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
  }

  /* Popup arrow */
  .popup .popupDetail::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }

  /* Toggle this class - hide and show the popup */
  .popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
  }

  /* Add animation (fade in the popup) */
  @-webkit-keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
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
        <p>Books</p>
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
      <div id="center">
        <div id="searchBar">
          <div class='topnav'>
            <label class='searchBar'><b>Name:</b></label>
            <select name='book' id='id_book' onchange='bookFilterChanged();'>
              <option value='0'>Select all</option>
              <option value='1'>Test</option>
              <!-- <option value='".$book[' book_name']."'>".$book['book_name']."</option> -->
            </select>

            <label class='searchBar' style="margin-left:50px;" id='author'><b>Author:</b></label>
            <select name='author' id='id_author' onchange='bookFilterChanged();'>
              <option value='0'>Select all</option>
              <option value='1'>Test</option>
              <!-- <option value='".$author[' author_name']."'>".$author['author_name']."</option> -->
            </select>
          </div>
        </div>
        <table>
          <?php
          if (mysqli_num_rows($result)> 0)
          {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
              ?>
              <td class="product_box">
                <div>
                  <!-- The photo of a book -->
                  <a target="_blank" href="images/<?php echo $row['photo'] ?>.png">
                    <img src="images/<?php echo $row['photoThumb'] ?>.png" alt="<?php echo $row['image'] ?>" />
                  </a>
                  <div class="product_info">
                    <p>
                      <!-- Name of the book -->
                      <?php echo $row['name'] ?>
                    </p>
                    <!-- Price of the book -->
                    <h3>$<?php echo $row['price'] ?></h3>
                    <div class="buy_now_button">
                      <a href="#">Buy Now</a>
                    </div>
                    <div class="detail_button">
                      <div class="popup" onclick="detail()">
                        <a>Detail
                        <span class="popupDetail" id="detailPopup">
                          <?php echo $row['description'] ?>
                        </span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <?php
            }
          }
          else
          {
            echo "No results";
          }
          ?>
        </table>
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
  <script>
  // When the user clicks on div, open the detail popup
  function detail() {
    var popup = document.getElementById("detailPopup");
    popup.classList.toggle("show");
  }
  </script>
</body>

</html>
