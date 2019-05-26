<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "bluebanjarabyrakesh";
	private $bbconn;
	
	function __construct() {
		$this->bbconn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->bbconn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->bbconn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>