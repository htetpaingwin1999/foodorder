<?php include('partials/menu.php'); ?>
<?php include('../config/constants.php');?>
    <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
               <h1>Add Category</h1>
               <br>
               <form action="" method="POST" enctype="multipart/form-data">
               	<table>
               		<tr>
               			<td>Title:</td>
               			<td>
               				<input type="text" name="title" value ="" placeholder="Category Title">
               			</td>
               		</tr>
               		<tr>
               			<td>Select Image:</td>
               			<td>
               				<input type="file" name="image">
               			</td>
               		</tr>
               		<tr>
               			<td>Featured:</td>
               			<td>
               				<input type="radio" name="featured" value="Yes"> Yes
               				<input type="radio" name="featured" value="No">No
               			</td>
               		</tr>
               		<tr>
               			<td>Active:</td>
               			<td>
               				<input type="radio" name="active" value="Yes">Yes
               				<input type="radio" name="active" value="No">No
               			</td>
               		</tr>
               		<tr>
               			<td colspan="2">
               				<input type="submit" name="submit" class="btn-secondary">
               			</td>
               		</tr>
               	</table>
               </form>

               <?php 
               		//Check  whether the submit button is clicked or not
               if(isset($_POST['submit']))
               {
               		// echo "Clicked";
               		//1. Get the Value from Category Form

               		//For radio input , we need to check whether the button is selected or not
               		$title = $_POST['title'];
               		if(isset($_POST['featured']))
               		{
               			//Get the value from form
               			$featured = $_POST['featured'];
               		}
               		else
               		{
               			$featured='No';
               		}
                 		if(isset($_POST['active']))
               		{
               			$active = $_POST['active'];
               		}
               		else
               		{
               			$active='No';
               		}

               		//Check whether the image is selected or not nd set the value for image name accordingly
               		
               		// print_r($_FILES['image']);
               		// die();

               		if(isset($_FILES['image']['name']))
               		{
               			//Upload the image
               			//To upload image we need image name,source path and destination path
               			$image_name=$_FILES['image']['name'];
               			echo $image_name;

                              // $ext = end(explode('.',$image_name));
                              // echo $ext;

                              //Renme the image
                              // $image_name = "Food_Category_".random(000,999);
                              // echo $image_name;

               			$source_path = $_FILES['image']['tmp_name'];
               			echo $source_path;
               			$destination_path = "../images/category/".$image_name;
               			echo $destination_path;

               			//Finally upload the Image
               			$upload = move_uploaded_file($source_path, $destination_path);

                              //check whether the image is uploaded or not
                              //And if the image is not uploaded we will stop the process and redirec the manage category page
                              if($upload == false)
                              {
                                header("Location:index.php");
                                echo "Image is not uploaded";
                              }
                              else
                              {
                                   echo "Image is uploaded";
                                   echo $upload;
                              }
               		}
               		else
               		{
               			//Don't Upload the image and set the image_name value as blank
               			$image_name="";
               		}

               		//2. Create SQL Query to Insert Category into Database;
               		$sql = "INSERT into tbl_category SET title='$title',image_name='$image_name',featured='$featured',active='$active'";
               		echo $sql;

               		//3. Execute the Query and Save in database
               		$res = mysqli_query($conn,$sql);

               		//4. Check whether the query exectued or not and data added or not
               		if($res==true)
               		{
               			//Query Executed and Category Added
               			header('manage-category.php');
               		}
               		else
               		{
               			//Faield to Add Category
               			echo "Fail to Upload";
               		}

               }

               ?>
            </div>
        </div>
    <!-- Main Content Section Ends -->

<?php include('partials/footer.php');?>
