<?php include('partials/menu.php');?>
<div class="main-content">
	<div class="wrapper">
		<h1>Change Password</h1>
		<br/><br/>
		<?php $id = $_GET['id'];?>
		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Current Password;</td>
					<td>
						<input type="password" name="current_password" placeholder="Old Password">
					</td>
				</tr>
				<tr>
					<td>New Password:</td>
					<td>
						<input type="password" name="new_password" placeholder="New Password">
					</td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td>
						<input type="password" name="confirm_password" placeholder="Confirm  Password">
					</td>
				</tr>
				<tr>
           			<td colspan="2">
           				<input type="hidden" name="id" value="<?php echo $id;?>">
           				<input type="submit" name="Change_Password" class="btn-secondary">
           			</td>
               	</tr>
			</table>
		</form>
	</div>
</div>
<?php include('partials/footer.php');?>
<?php 
	//   the value from Form and Save it in database
	// Check wheterh the button is clicked or not
   if(isset($_POST['Change_Password']))
   {	
   		//Button Clicked
		//1.Get the Data from form
		$id = $_POST['id'];
		$current_password=$_POST['current_password'];
		$new_password=$_POST['new_password'];
		$confirm_password=$_POST['confirm_password'];
		echo $current_password;

		//2. Check whether the user with current ID and Current Password exists
		$sql1 = "SELECT * from tbl_admin where id='$id' and password='$current_password'";

		//Execute the Query
		$res1 = mysqli_query($conn,$sql1);

		if($res1==true)
		{
			//Check whether data is available or not
			$count=mysqli_num_rows($res1);

			if($count==1)
			{
				//User Exists and Password Can be changed
				echo "User Found";

				//Check the new password and confirm password are the same
				if($new_password==$confirm_password)
				{
					$sql2 ="Update tbl_admin set password='$new_password' where id='$id'";
					$res2=mysqli_query($conn,$sql2);
					echo "Update password successfully";
				}
				else
				{
					echo "Passwords do not match";
				}
			}
			else
			{
				//User Does not Exists Set Message and Redirect
				echo "User Not Found";
			}
		}

		// Create connection
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$conn->close();
		   
	 }
?>