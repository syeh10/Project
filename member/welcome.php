<?php
session_start();
if (isset ( $_SESSION ["code"] ))
{//Determine that the code does not exist. If it does not exist, it means abnormal login.
  ?>
  <!doctype html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>Welcome login screen</title>
    <meta charset="utf-8">
    <meta name="description" content="Book Store, website design, software development">
    <meta name="author" content="Richards International Online Book Store">
    <meta name="keywords" content="Book Store">
    <link href="css/style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="container">
      <!-- header -->
      <div id="header">
        <div id="header_nav">
          <a href="../login.html" style="color:#FFFFFF; font-size: 15px;">Logout</a>
          <a href="cart.php"><img src="images/cart.png" alt="cart image" /></a>
        </div>
        <div id="header_title">
          <p>Welcome <?php echo "${_SESSION["username"]}";//Display login user name?></p>
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
            <li><a href="editMember.php">Account</a></li>
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
          <form>
            <table>
              <tr>
                <td style="font-weight: bold;">Your IP:</td>
                <td style="text-align:left;"><?php echo "${_SERVER['REMOTE_ADDR']}";//Show ip ?></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Your Language:</td>
                <td style="text-align:left;"><?php echo "${_SERVER['HTTP_ACCEPT_LANGUAGE']}";//Language used ?></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Browser Version:</td>
                <td style="text-align:left;"><?php echo "${_SERVER['HTTP_USER_AGENT']}";//Browser version information ?></td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:center;">
                  <button href="../index.html">Sign out</button>
                  <button href="alter_password.html">Change Password</button>
                  <?php
                  if (! empty($message)) {
                    echo $message;
                  }
                  ?>
                </td>
              </tr>
              <?php
            } else {//Code does not exist, call exit.php to log out
              ?><br>
              <script type="text/javascript">
              alert("sign out");
              window.location.href="..index.html";
              </script>
              <?php
            }
            ?>
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
