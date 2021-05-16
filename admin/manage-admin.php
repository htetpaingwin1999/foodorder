<?php include('partials/menu.php'); ?>
    <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
               <h1>Manage Admin</h1>
               <br>
                <!-- Button to Add Amdin  -->  
                <a href="add-admin.php" class="btn-primary"> Add Admin</a> <br/>  
                <br/>
                 <table class="tbl-full">
                       <tr>
                          <th>S.N</th>
                          <th>Full Name</th>
                          <th>Username</th>
                          <th>Actions</th>
                       </tr>

                   <?php
                      $sql = "SELECT id, full_name, username,password FROM tbl_admin";
                      echo $sql;
                      // $result = $conn->query($sql);
                      //   if ($result->num_rows > 0) {
                      //   // output data of each row
                      //   while($row = $result->fetch_assoc()) {
                      //     $full_name = $row['full_name'];
                      //     $id = $row['id'];
                      //         echo "<tr><td>".$row["id"]."</td><td>".$row["full_name"]."</td><td>".$row["username"]."</td>";
                      //     ?>
                    <!--   //     <td>
                      //       <a href="http://localhost/food-order/admin/update-password.php?id=<?php echo $id?>" class="btn-primary">Change Password</a>
                      //       <a href="http://localhost/food-order/admin/update-admin.php?id=<?php echo $id?>" class="btn-primary">Update</a>
                      //       <a href="http://localhost/food-order/admin/delete-admin.php?id=<?php echo $id ?>;" class="btn-danger">Delete</a>
                      //     </td></tr> -->
                      //     <?php
                      //   }
                      // } else {
                      //   echo "0 results";
                      // }
                      $conn->close();

                   ?>
                </table>
            </div>
        </div>
    <!-- Main Content Section Ends -->
<?php include('partials/footer.php');?>