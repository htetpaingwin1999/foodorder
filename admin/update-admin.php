<?php include('partials/menu.php');?>

 <div class="main-content">
            <div class="wrapper">
               <h1>Update Admin</h1>
               <br/><br/>
               <?php
               		//1. Get the ID of Selected Admin
               		$id = $_GET['id'];

               		//2. Create SQL Qery to Get the Details

               		$sql = "SELECT * from tbl_admin where id=$id";
               		//Execute the Query
               		$res = mysqli_query($conn,$sql);

               		//Check whether he query is executed or not
               		if($res==true)
               		{
               			//Check whether the dta is availble or not
               			$count = mysqli_num_rows($res);
               			if($count==1)
               			{
               				//Get the Details
               				// echo "Data availble";
               				$row=mysqli_fetch_assoc($res);

               				$full_name = $row['full_name'];
               				$username=$row['username'];
               				$password = $row['password'];
               			}
               			else
               			{
               				//Reidrect ot Mange dmin Page
               			}

               		}

               ?>
               <form action="" method="POST">
               	<table>
               		<tr>
               			<td>Full Name:</td>
               			<td>
               				<input type="text" name="full_name" value ="<?php echo $full_name;?>" >
               			</td>
               		</tr>
               		<tr>
               			<td>Username:</td>
               			<td>
               				<input type="text" name="username" value="<?php echo $username;?>">
               			</td>
               		</tr>
             		<tr>
               			<td colspan="2">
               				<input type="hidden" name="id" value="<?php echo $id;?>">
               				<input type="submit" name="submit" class="btn-secondary">
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
   if(isset($_POST['submit']))
   {	
   		//Button Clicked
		//Get the Data from form
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$id = $_POST['id'];

		//2.SQL Query to update the data into database

		// Create connection
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		//Update Data
		$sql = "Update tbl_admin SET full_name='$full_name',username='$username' where id='$id'";

		if ($conn->query($sql) === TRUE) {
		  
		  	echo "Update successfully";
		} else {
  			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		   
	 }

?>