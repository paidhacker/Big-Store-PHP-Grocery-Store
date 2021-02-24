<?php
require("../includes/database.php");
//valiadations
if(!isset($_SESSION['USER_LOGIN'])){
   header("location:../login.php");
}
else{
    //variable here..
    $id = $_GET['id'];
    $oid = $_GET['oid'];
if(!empty($id) || !empty($oid)){
            echo '<body onload="redirect()">';
            mysqli_query($conn, "DELETE FROM `orders` where id ='$id'");
            mysqli_query($conn, "DELETE FROM `order_details` where order_no ='$oid'");
            echo "</body>";
            echo "<script> function redirect(){window.history.back(); }</script>";
}
else{
    header("location:../my-account.php");
}
}
?>