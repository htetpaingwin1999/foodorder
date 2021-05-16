<?php include('partials/menu.php'); ?>
    <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
            	<h1>Manage Category</h1>
                <br>
                <!-- Button to Add Amdin  -->  
                <a href="add-category.php" class="btn-primary"> Add Category</a> <br/>  
                <br/>
                <table class="tbl-full">
                   <tr>
                   		<th>S.N</th>
                   		<th>Title</th>
                   		<th>Image Name</th>
                      <th>Featured</th>
                      <th>Active</th>
                   		<th>Actions</th>
                   </tr>
                     <?php
                      $sql = "SELECT id, title, image_name,featured,active FROM tbl_category";
                      echo $sql;
                      $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                              echo "<tr><td>".$row["id"]."</td><td>".$row["title"];
                              $image_name = $row["image_name"];
                              $id = $row["id"];
                          ?>
                          <td><img src="../images/category/<?php echo $image_name?>" width="100px" height="100px"></td>
                          <td><?php echo $row["featured"]?></td>
                          <td><?php echo $row["active"]?></td>
                          <td>
                            <a href="http://localhost/food-order/admin/update-category.php?id=<?php echo $id?>" class="btn-primary">Update Category</a>
                            <a href="http://localhost/food-order/admin/update-category.php?id=<?php echo $id?>" class="btn-danger">Delete Category</a>
                          </td>
                        </tr>
                          <?php
                        }
                      } else {
                        echo "0 results";
                      }
                      $conn->close();

                   ?>
                </table>         
            </div>
        </div>
    <!-- Main Content Section Ends -->

<?php include('partials/footer.php');?>