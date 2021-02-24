<?php
define("os",true);
require("top.php");
if(!isset($_SESSION['STAFF_LOGIN'])){
   header("location:login.php");
}
$order = mysqli_query($conn,"SELECT * FROM `orders` where status='2'");
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h3 class="box-title">Orders Manager </h3>
                           <h5 class="box-title">Shipped </h5>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th>Order No.</th>
                                       <th>Address</th>
                                       <th>Payment Type</th>
                                       <th>Total</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 while($row = mysqli_fetch_assoc($order)){
                                    ?>
                                    <tr>
                              <td><?php echo $row['order_no']; ?></td>
<?php 
$user_id = $row['user_id'];
$user_details = mysqli_query($conn, "SELECT * FROM `users` where id='$user_id'");
while($row2 = mysqli_fetch_assoc($user_details)){
?>
                              <td><?php echo $row2['city']; ?>, <?php echo $row2['stadd']; ?>, <?php echo $row2['pincode']; ?></td>
<?php } ?>
<td><?php echo $row['payment']; ?></td>
<td><?php echo $ps; ?><?php echo $row['total']; ?></td>
<td>Shipped</td>
<td><a href="functions/order/move.php?id=<?php echo $row['id']; ?>&action=p" class="btn btn-warning">Move To Pending</a><br><br><a href="functions/order/move.php?id=<?php echo $row['id']; ?>&action=c" class="badge badge-complete">Move To Completed</a><br><br><a href="functions/order/view.php?oid=<?php echo $row['order_no']; ?>" class="btn btn-primary">View Details</a><br><br><a href="functions/order/move.php?id=<?php echo $row['id']; ?>&action=r" class="btn btn-danger">Regect Order</a></td>
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