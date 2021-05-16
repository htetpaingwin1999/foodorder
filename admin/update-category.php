<?php include('partials/menu.php');?>

 <div class="main-content">
            <div class="wrapper">
               <h1>Update Category</h1>
               <br/><br/>
               <?php
               		//1. Get the ID of Selected Admin
               		$id = $_GET['id'];

               		//2. Create SQL Qery to Get the Details

               		$sql = "SELECT * from tbl_category where id=$id";
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

               				$title = $row['title'];
               				$image_name=$row['image_name'];
               				$featured = $row['featured'];
                           $active = $row['active'];
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
                        <td>Title:</td>
                        <td>
                           <input type="text" name="title" value ="<?php echo $title?>" placeholder="Category Title">
                        </td>
                     </tr>
                     <br/>
                     <tr>
                        <td>Current Image:</td>
                        <td><img src="../images/category/<?php echo $image_name?>" width="100px" height="100px"></td>
                     </tr>
                     <br/>
                     <tr>
                        <td>Select Image:</td>
                        <td>
                           <input type="file" name="image">
                        </td>
                     </tr>
                     <tr>
                        <td>Featured:</td>
                        <td>
                           <input type="radio" name="featured" value="Yes"  <?php if($featured=='Yes') echo "checked";?>>Yes
                           <input type="radio" name="featured" value="No"  <?php if($featured=='No') echo "checked";?>>No
                        </td>
                     </tr>
                     <tr>
                        <td>Active:</td>
                        <td>
                           <input type="radio" name="active" value="Yes"  <?php if($active=='Yes') echo "checked";?>>Yes
                           <input type="radio" name="active" value="No"  <?php if($active=='No') echo "checked";?>>No
                        </td>
                     </tr>
                     <tr>
                        <td colspan="2">
                           <input type="submit" name="update" class="btn-primary">
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
   
               if(isset($_POST['update']))
               {
                     echo "Clicked";
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

                     echo $featured;
                     echo $active;
                     echo $title;
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
                     $sql = "UPDATE tbl_category SET title='$title',image_name='$image_name',featured='$featured',active='$active'";
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

        
      // Create connection
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $conn->close();
         
?>