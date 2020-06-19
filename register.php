
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registered user</title>
</head>
<body>
  <?php
  session_start();
  $firstName = $_REQUEST["firstName"];
  $lastName = $_REQUEST["lastName"];
  $email = $_REQUEST["email"];
  $mobile = $_REQUEST["mobile"];
  $address = $_REQUEST["address"];
  $postcode = $_REQUEST["postcode"];
  $username=$_REQUEST["username"];
  $password=$_REQUEST["password"];

  $con=mysqli_connect("localhost","root","");
  if (!$con) {
    die('couldnt connect'.mysqli_error());
  }
  mysqli_select_db($con,"ISY10222RIOBS") or (die("Couldnt find database".mysqli_error()));
  $password=md5($password);
  $result=mysqli_query("select * from member where username ='$username' and password='$password'");
  while ($row=mysqli_fetch_array($result)) {
    $dbusername=$row["username"];
    $dbpassword=$row["password"];
  }
  if(!is_null($dbusername)){
    ?>
    <script type="text/javascript">
    alert("User already exists");
    window.location.href="register.html";
    </script>
    <?php
  }
  $query="insert into member (firstName, lastName, email, mobile, address, postcode, username, password) values('{$firstName}', '{$lastName}', '{$email}', '{$mobile}', '{$address}', '{$postcode}', '{$username}', '{$password}')";
  mysqli_query($con,$query) or die("Failed to save to the database".mysqli_error()) ;
  mysqli_close($con);
  ?>
  <script type="text/javascript">
  alert("Registration success");
  window.location.href="login.html";
  </script>





</body>
</html>
