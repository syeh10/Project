<?php
// $con = mysqli_connect("localhost","root","","")  or die("Could not connect mysql: " . mysqli_error() );
$con = mysqli_connect("infotech.scu.edu.au","syeh10","22862541","") or die("Could not connect mysql: " . mysqli_error() );

// $dbName = "ISY10222RIOBS";
$dbName = "syeh10ISY10222RIOBS";
mysqli_select_db($con, $dbName)or die("Could not find database: " . mysqli_error() ) ;

class DBController {
	private $host = "infotech.scu.edu.au";
	private $user = "syeh10";
	private $password = "22862541";
	private $database = "syeh10ISY10222RIOBS";
	// private $host = "localhost";
	// private $user = "root";
	// private $password = "";
	// private $database = "ISY10222RIOBS";
	// private $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}
}
?>
