<?php
include 'database-connection.php';
$sql = "SELECT `order_id`, `member`.`firstName`AS Member, `staff`.`name`AS DeliveryStaff, `description`, `quantity`, `orderPrice`, `receipt`
FROM `order`
JOIN member
ON `order`.`member_id`=`member`.`member_id`
JOIN staff
ON `order`.`staff_id`=`staff`.`staff_id`
ORDER BY `order_id` DESC";
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
        <a href="../loginAdmin.html" style="color:#FFFFFF; font-size: 15px;">Logout</a>
        <a href="order.php"><img src="images/order.png" alt="order image" /></a>
			</div>
			<div id="header_title">
				<p>Order</p>
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
				<div id="order">
					<div class="txt-heading"></div>
					<table class="tbl-order" style="width:80%; text-align:center; font-size:20px;" cellpadding="10" cellspacing="1">
						<tbody>
							<tr>
								<th>Order Number</th>
								<th>Member Name</th>
								<th>Delivery Staff</th>
								<th>Description</th>
								<th>Quantity</th>
								<th>Order Price</th>
								<th>Receipt</th>
							</tr>
							<?php
							if (mysqli_num_rows($result)> 0)
							{
								// output data of each row
								while($row = $result->fetch_assoc())
								{
									?>
									<tr>
										<td><?php echo $row["order_id"]; ?></td>
										<td><?php echo $row["Member"]; ?></td>
										<td><?php echo $row["DeliveryStaff"]; ?></td>
										<td><?php echo $row["description"]; ?></td>
										<td><?php echo $row["quantity"]; ?></td>
										<td><?php echo "$ ".$row["orderPrice"]; ?></td>
										<td><?php echo $row["receipt"]; ?></td>
									</tr>
									<?php

									?>
									<?php
								}
							}
							else
							{
								echo "No results";
							}
							?>
						</tbody>
					</table>
				</div>
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
