<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log in to the database execution process of the system</title>
  <meta charset="utf-8">
</head>
<body>
  <?php
  session_start();//Login system to open a session content
  $username=$_REQUEST["username"];//Get the username in html
  $password=$_REQUEST["password"];//Get the password in html
  include("./database-connection.php");
  $result = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username' and password = '$password'") or die("Could not select: " . mysqli_query() );
  if (mysqli_num_rows($result)> 0) {
    $_SESSION["username"]=$username;
    //Attach a random value to the session to prevent users from accessing member/welcome.php directly through the call interface
    $_SESSION["code"]=mt_rand(0, 100000);
    ?>
    <script type="text/javascript">
    window.location.href="admin/index.html";
    </script>
    <?php
  } else {
    ?>
    <script type="text/javascript">
    alert("Username or password is incorrect, please try again");
    window.location.href="loginAdmin.html";
    </script>
    <?php
  }
  mysqli_close($con);//Close the database connection, if not closed, the next connection will be wrong
  ?>
</body>
</html>
