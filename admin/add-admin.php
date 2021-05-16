<?php include('partials/menu.php'); ?>
<?php include('../config/constants.php');?>
    <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
               <h1>Add Admin</h1>
               <br>
               <form action="" method="POST">
               	<table>
               		<tr>
               			<td>Full Name:</td>
               			<td>
               				<input type="text" name="full_name" value ="" placeholder="Enter your name">
               			</td>
               		</tr>
               		<tr>
               			<td>Username:</td>
               			<td>
               				<input type="text" name="username" value="" placeholder="Your user name">
               			</td>
               		</tr>
               		<tr>
               			<td>assword</td>
               			<td>
               				<input type="password" name="password" value="" placeholder="Your password">
               			</td>
               		</tr>
               		<tr>
               			<td colspan="2">
               				<input type="submit" name="submit" class="btn-secondary">
               			</td>
               		</tr>
               	</table>
               </form>
            </div>
        </div>
    <!-- Main Content Section Ends -->

<?php include('partials/footer.php');?>

<?php 
	//   the value from Form and Save it in database
	// Check wheterh the button is clicked or not
   if(isset($_POST['submit']))
   {	
   		//Button Clicked
		//Get the Data from form
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$password = $_POST['password']; //Password Encyption with MD5

		echo "$password";
		//2.SQL Query to Save the data into database

		// Create connection
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		//Insert Data
		// $sql = "INSERT INTO tbl_admin(full_name, username, password) VALUES ($full_name, $username, $password)";

		$sql = "INSERT INTO tbl_admin (full_name, username, password) VALUES ('$full_name', '$username', '$password')";
		if ($conn->query($sql) === TRUE) {
		  
		  	echo "New Reord created successfully";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		   
	 }

?>
