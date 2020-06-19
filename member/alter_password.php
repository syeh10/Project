<?php
session_start ();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Changing password</title>
</head>
<body>
  <?php
  $username = $_REQUEST ["username"];
  $oldpassword = $_REQUEST ["oldpassword"];
  $newpassword = $_REQUEST ["newpassword"];
  $newpassword=md5($newpassword);
  $oldpassword=md5($oldpassword);


  $con = mysqli_connect ("localhost","root","","") ;
  if (!$con) {
    die ( 'Database connection failed' . $mysqli_error () );
  }
  mysqli_select_db($con,"ISY10222RIOBS");
  $dbusername = null;
  $dbpassword = null;

  $result=mysqli_query($con,"select * from member where username ='$username'");
  while ($row=mysqli_fetch_array($result)) {
    $dbusername=$row["username"];
    $dbpassword=$row["password"];

  }
  if(is_null($dbusername)){
    ?>
  <script type="text/javascript">
    alert("Username does not exist");
  //  window.location.href="alter_password.html";
  </script>
  <?php
  }
  // if ($oldpassword != $dbpassword) {
    ?>
  <script type="text/javascript">
    // alert("Wrong password");
  //  window.location.href="alter_password.html";
  </script>
  <?php
  // }
  //If the above username and password are not correct, update into the database
  mysqli_query ($con, "update member set password='{$newpassword}' where username='{$username}'" ) or die ( "Failed to save to the database" . mysqli_error () );
  mysqli_close ( $con );
  ?>

  <script type="text/javascript">
    alert("Password reset complete");
   window.location.href="../login.html";
  </script>


</body>
</html>
