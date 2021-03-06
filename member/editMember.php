<?php
include 'database-connection.php';//connect database
$sql = "SELECT * FROM member";//select table
$result = mysqli_query($con, $sql);//store result in a variable
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

</head>

<body>
  <!-- container -->
  <div id="container">
    <!-- header -->
    <div id="header">
      <div id="header_nav">
        <a href="../login.html" style="color:#FFFFFF; font-size: 15px;">Logout</a>
        <a href="cart.php"><img src="images/cart.png" alt="cart image" /></a>
      </div>
      <div id="header_title">
        <p>Member Account</p>
      </div>
    </div>
    <!-- content -->
    <div id="content">
      <!-- content left -->
      <div id="left">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="books.php">Books</a></li>
          <li><a href="bestSellers.php">Best Sellers</a></li>
          <li><br></li>
          <li><a href="editMember.html">Account</a></li>
        </ul>
      </div>
      <!-- content right -->
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
      <div id="center" style=" border-radius: 30px; width:40%; margin-top:50px;margin-bottom:50px;background-color: 	#A9A9A9;">
        <form action="editMember.php" method="post">
          <table>
            <tr>
              <td>First Name:</td>
              <td><input type="text" name="firstName" id="firstName" required></td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td><input type="text" name="lastName" id="lastName"></td>
            </tr>
            <tr>
              <td>Email:</td>
              <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
              <td>Mobile:</td>
              <td><input type="text" name="mobile" id="mobile"></td>
            </tr>
            <tr>
              <td>Address:</td>
              <td><input type="text" name="address" id="address"></td>
            </tr>
            <tr>
              <td>Postcode:</td>
              <td><input type="text" name="postcode" id="postcode"></td>
            </tr>
            <tr>
              <td>Username:</td>
              <td><input type="text" name="username" id="username" required></td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input type="password" name="password" id="initial" required></td>
            </tr>
            <tr>
              <td>Confirm password:</td>
              <td><input type="password" name="assertpassword" id="assertpassword" required></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align:center;">
                <button type="button">Reset</button>
                <button type="button">Update</button>
              </td>
            </tr>
          </table>
        </form>
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
