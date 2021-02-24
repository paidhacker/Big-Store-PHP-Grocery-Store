<?php
define("um",true);
require("top.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:login.php");
}
$user = mysqli_query($conn,"SELECT * FROM `users`");
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">User Manager </h4>
                           <h3 class="box-title"><a href="functions/user/add.php">+ Add User </a></h3>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                         
                                       <th class="serial">User ID</th>
                                       <th class="avatar">Phone No</th>
                                       <th>Name</th>
                                       <th>Street Address</th>
                                       <th>City</th>
                                       <th>Pincode</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
while($row = mysqli_fetch_assoc($user)){
                                 ?>
                            <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['phno']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['stadd']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['pincode']; ?></td>
<?php
if($row['status'] == 0){
   echo "<td>Visitor</td>";
   echo '<td><a href="functions/user/remove.php?id='.$row['id'].'" class="btn btn-danger">Remove</a></td>';
}
elseif($row['status'] == 2){
   echo "<td>Staff</td>";
   echo '<td><a href="functions/user/remove.php?id='.$row['id'].'" class="btn btn-danger">Remove</a></td>';
}
else{
echo "<td>Admin</td>";
echo '<td>&nbsp;</td>';
}
?>
                                    </tr>
<?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
       <?php require("footer.php"); ?>