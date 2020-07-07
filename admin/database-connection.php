<?php
// $con = mysqli_connect("localhost","root","","")  or die("Could not connect mysql: " . mysqli_error() );
$con = mysqli_connect("confidential","confidential","confidential","") or die("Could not connect mysql: " . mysqli_error() );

$dbName = "syeh10ISY10222RIOBS";
mysqli_select_db($con, $dbName)or die("Could not find database: " . mysqli_error() ) ;

class DBController {
	private $host = "confidential";
	private $user = "confidential";
	private $password = "confidential";
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
