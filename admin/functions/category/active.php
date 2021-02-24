<?php
require("../../database.php");
//valiadations
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:../../login.php");
}
else{
    //variable here..
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $action = $_GET['action'];
if(!empty($id)  || !empty($action)){
    if($action == "d"){
        mysqli_query($conn, "UPDATE `categories` SET status='0' where id ='$id'");
        header("location:../../category.php");
        }
        elseif($action == "a"){
         mysqli_query($conn, "UPDATE `categories` SET status='1' where id ='$id'");
        header("location:../../category.php");
        }
}
else{
    header("location:../../category.php");
}
}
?>