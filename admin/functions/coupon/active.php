<?php
require("../../database.php");
//valiadations
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:../../login.php");
}
$id = mysqli_real_escape_string($conn, $_GET["id"]);
$action = $_GET["action"];
if(!empty($id) && !empty($action)){
if($action == "active"){
    mysqli_query($conn, "UPDATE `cupon` SET status='1' WHERE id='$id'");
    header("location:../../coupon.php");
}
elseif($action == "deactive"){
    mysqli_query($conn, "UPDATE `cupon` SET status='0' WHERE id='$id'");
    header("location:../../coupon.php");
}
elseif($action == "delete"){
    mysqli_query($conn, "DELETE FROM `cupon` WHERE id='$id'");
    echo '<script>alert("Coupon Deleted Successfully!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../../coupon.php">';
}
else{
    die("function not defined!");
}

}
else{
die("function not defined!");
}
?>