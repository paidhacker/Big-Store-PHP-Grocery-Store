<?php
require("../../database.php");
//valiadations
if(!isset($_SESSION['STAFF_LOGIN'])){
   header("location:../../login.php");
}
else{
    //variable here..
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $action = $_GET['action'];
    $oid = mysqli_real_escape_string($conn, $_GET['oid']);
if(!empty($id)  || !empty($action)){
    if($action == "s"){
        echo '<body onload="redirect()">';
        mysqli_query($conn, "UPDATE `orders` SET status='2' where id ='$id'");
        echo "</body>";
        echo "<script> function redirect(){window.history.back(); }</script>";
        }
        elseif($action == "c"){
            echo '<body onload="redirect()">';
         mysqli_query($conn, "UPDATE `orders` SET status='3' where id ='$id'");
         echo "</body>";
         echo "<script> function redirect(){window.history.back(); }</script>";
        }
        elseif($action == "p"){
            echo '<body onload="redirect()">';
            mysqli_query($conn, "UPDATE `orders` SET status='1' where id ='$id'");
            echo "</body>";
            echo "<script> function redirect(){window.history.back(); }</script>";
           }
        elseif($action == "r"){
            echo '<body onload="redirect()">';
            mysqli_query($conn, "UPDATE `orders` SET status='4' where id ='$id'");
            echo "</body>";
            echo "<script> function redirect(){window.history.back(); }</script>";
           }
           elseif($action == "d"){
            echo '<body onload="redirect()">';
            mysqli_query($conn, "DELETE FROM `orders` where id ='$id'");
            mysqli_query($conn, "DELETE FROM `order_details` where order_no ='$oid'");
            echo "</body>";
            echo "<script> function redirect(){window.history.back(); }</script>";
           }
}
else{
    header("location:../../orders.php");
}
}
?>