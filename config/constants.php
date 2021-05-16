<?php
	//Create a Session Variable to Display Message
	// session_start();
	//Greate Constnts to Store Non Repeating Values
	// define('SITEURL','http://loalhost:3308/food_order');
	$_SESSION["SITEURL"] = "http://localhost:3308/food_order";

	$conn = mysqli_connect('localhost:3308','root','') or die(mysqli_error());
	$db_select = mysqli_select_db($conn,'food_order') or die(mysqli_error());
?>