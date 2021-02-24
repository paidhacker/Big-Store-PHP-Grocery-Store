<?php
require("../../database.php");
//valiadations
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:../../login.php");
}
else{
    $id = mysqli_real_escape_string($conn, $_GET['id']);
if(empty($id)){
    header("location:../../user.php");
}
else{
   //functions from here..
   mysqli_query($conn, "DELETE FROM `users` where id ='$id'");
   echo '<script>alert("Deleted Sucessfully!");</script>';
   header("location:../../user.php");
}
}
?>