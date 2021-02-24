<?php
require("../includes/database.php");
require("../includes/setting.php");
//valiadations
if(!isset($_SESSION['USER_LOGIN'])){
   header("location:../login.php");
}
$oid = mysqli_real_escape_string($conn, $_GET['oid']);
if(empty($oid)){
    header("location:../index.php");
}
$order_details = mysqli_query($conn, "SELECT * FROM `order_details` where order_no='$oid'");
$order = mysqli_query($conn, "SELECT * FROM `orders` where order_no='$oid'");
?>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../admin/assets/css/normalize.css">
      <link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="../admin/assets/css/themify-icons.css">
      <link rel="stylesheet" href="../admin/assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="../admin/assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="../admin/assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
 <br>
  &nbsp;<button onclick="redirect()" class="btn btn-warning">Back</button>
  <script> function redirect(){window.history.back(); }</script>
  <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Order Summary</strong></div>
                        <div class="card-body card-block">
                  <table class="table ">
<thead>
<tr>
<td>Product Name</td>
<td>Product Price</td>
<td>Product Quantity</td>
<td>Subtotal</td>
</tr>
</thead>
<tbody>
<?php 
$tot = 0;
while($row = mysqli_fetch_assoc($order_details)){
?>
<tr>
<?php 
$product= mysqli_query($conn, "SELECT * FROM `product` where id='$row[product_id]'");
while($row2 = mysqli_fetch_assoc($product)){
?>
<td><?php echo $row2['name']; ?></td>
<td><?php echo $ps; ?><?php echo $row2['price']; ?></td>
<?php 
$product_qty = $row['product_qty'];
$stotal = $row2['price'] * $row['product_qty'];
$tot = $tot + $row2['price'] * $row['product_qty'];
?>
<?php } ?>
<td><?php echo $row['product_qty']; ?></td>
<td><?php echo $ps; ?><?php echo $stotal; ?></td>
</tr>
<?php
$uid = $row['user_id'];
} ?>
<tbody>
                  </table>
                  <hr>
                  <?php 
while($row3 = mysqli_fetch_assoc($order)){
   if($tot == $row3["total"]){
echo '<h5>&nbsp;&nbsp;Total: '.$ps.''.$tot.'</h5>';
   }
   else{
      echo '<h5>&nbsp;&nbsp;Total: '.$ps.''.$row3["total"].'</h5>';  
      echo '<h4 style="color : green;">You Used Coupon code!</h4>';
   }
}
?>
<br>
<?php 
$ctot = 0;
while($row4 = mysqli_fetch_assoc($order)){
   $ctot = $row4['total'];
?>
<?php
if($row4['status'] == 1){
   echo "<h5>&nbsp;&nbsp;Status: Pending</h5>";
}
elseif($row4['status'] == 2){
   echo "<h5>&nbsp;&nbsp;Status: Shipped</h5>";
}
elseif($row4['status'] == 3){
   echo "<h5>&nbsp;&nbsp;Status: Completed</h5>";
}
else{
   echo "<h5>&nbsp;&nbsp;Status: Rejected</h5>";
}
?>
<?php } ?>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>