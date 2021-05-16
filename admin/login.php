<?php include('../config/constants.php');?>
<?php include('partials/menu.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Food Order System</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="login">
		<h1 class="text-center">Login</h1>
		<!-- Login Form State Here -->
		<form action="" method="POST" class="text-center">
			<input type="text" name="username" placeholder="Enter username"><br/><br/>
			Password:<br/>
			<input type="password" name="password" placeholder="Enter password"><br/><br/>
			<input type="submit" name="submit" value="Login" class="btn-primary">
		</form>
		<!-- Login Form End Here -->
		<p class="text-center">Create by <a href="www.facebook.com">Htet Paing</a></p>
	</div>
</body>
</html>

<?php include('partials/footer.php') ;?>
<?php
	//Check whether the submit button is clicked or not
	if(isset($_POST['submit']))
	{
		//Process for login
		//1.Get the Data from login form
		$username=$_POST['username'];
		$password=$_POST['password'];

		//2. SQL to check whether the user with username and password exists or not
		$sql = "SELECT * from tbl_admin where username='$username' and password='$password'";
		//3. Execute the Query
		$res = mysqli_query($conn,$sql);

		// 4. Count rows to check whether the user exists or not
		$count = mysqli_num_rows($res);
		if($count==1)
		{
			//User Available
			header("Location:index.php");
		}
		else
		{
			echo "Username and password do not match";
		}
	}
?>