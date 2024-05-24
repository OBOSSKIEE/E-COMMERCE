<?php
	
	$host = "localhost";
	$userID = "root";
	$pword = "";
	$dbaseName = "finalproject_db";

	try {
		$conn = new PDO("mysql:hostname=$host;dbname=$dbaseName",$userID,$pword);
		// echo "Successfully connected to MYSQL Database";	
	} catch (Exception $e) {
		die("Error in : " . $e.getMessage());
	}
?>