<?php

	//Include constants.ph file here
	include('../config/constants.php');

	//1. get the ID of Admin to deleted
	$id = $_GET['id'];
	//2.Create SQL Query to Delete Admin
	$sql = "DELETE from tbl_admin WHERE id=$id";

	//Execute the Query
	$res = mysqli_query($conn,$sql);

	// Check whether the query executed successfully or not
	if($res==true)
	{
		//Query Executed Succesfully ond Admin Deleted
		echo "Admin Deleted";
	}
	else
	{
		//Failed to delete Admin
		echo "Failed to Delte Admin";
	}

	//3. Redirect to Manage Admin Page with message (success/error)


?>