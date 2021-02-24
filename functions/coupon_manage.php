<?php
require('../includes/database.php');

if(isset($_POST["ac"]) && empty($_GET["action"])){
$coupon = mysqli_query($conn, "SELECT * FROM `cupon` where code='$_POST[coupon]' and status ='1'");
if(mysqli_num_rows($coupon) > 0){
$row = mysqli_fetch_assoc($coupon);
$_SESSION["coupon"] = $row["code"];
$_SESSION["coupon_dis"] = $row["percentage"];
header('location:../checkout.php');
}
else{
    echo '<script>alert("Coupon code Invalid!");</script>';
   echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../checkout.php">';
   die();
}
}
elseif(!isset($_POST["ac"]) && !empty($_GET["action"])){
unset($_SESSION["coupon"]);
unset($_SESSION["coupon_dis"]);
header('location:../checkout.php');
}
else{
    die('Function Invalid!');
}
?>