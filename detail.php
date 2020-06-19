<?php
// include 'books.php';
$book_id = $_GET['book_id'];
$sql = "SELECT description FROM book WHERE book_id = $book_id";
// $result = mysqli_query($con, $sql);
$result -> execute(array(':book_id' => $book_id));
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
  <?php echo $row['description'] ?>
</body>
</html>
