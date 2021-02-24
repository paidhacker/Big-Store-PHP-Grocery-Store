<?php
define("com",true);
require("top.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:login.php");
}
$coupon = mysqli_query($conn, "SELECT * FROM `cupon`");
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Coupon Manager </h4>
                           <h3 class="box-title"><a href="functions/coupon/add.php">+ Add Coupon </a></h3>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="avatar">Code</th>
                                       <th>Discount</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                           while($row = mysqli_fetch_assoc($coupon)){
                        echo '<tr>';
                        echo '<td>'.$row["code"].'</td>';
                        echo '<td>'.$row["percentage"].'%</td>';
                        if($row["status"] == 1){
                           echo '<td><a href="functions/coupon/active.php?id='.$row["id"].'&action=deactive" class="btn btn-warning">Deactivate</a><br><br><a href="functions/coupon/active.php?id='.$row["id"].'&action=delete" class="btn btn-danger">Delete</a></td>';
                        }
                        else{
                           echo '<td><a href="functions/coupon/active.php?id='.$row["id"].'&action=active" class="btn btn-success">Activate</a><br><br><a href="functions/coupon/active.php?id='.$row["id"].'&action=delete" class="btn btn-danger">Delete</a></td>';
                        }
                        echo '</tr>';
                           }
                                 ?>
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