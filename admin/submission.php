<?php
define("sm",true);
require("top.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:login.php");
}
$submission = mysqli_query($conn,"SELECT * FROM `contact`");
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">User Manager </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                         
                                       <th class="serial">Name</th>
                                       <th class="avatar">Email</th>
                                       <th>Subject</th>
                                       <th>Message</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
<?php
while($row = mysqli_fetch_assoc($submission)){
?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['subject']; ?></td>
<td><?php echo $row['message']; ?></td>
<td><a href="functions/submission/remove.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Remove</a></td>
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