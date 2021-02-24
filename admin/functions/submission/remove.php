<?php
require("../../database.php");
//valiadations
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:../../login.php");
}
else{
    $id = mysqli_real_escape_string($conn, $_GET['id']);
if(empty($id)){
    header("location:../../submissions.php");
}
else{
   //functions from here..
   mysqli_query($conn, "DELETE FROM `contact` where id ='$id'");
   echo '<script>aleert("Deleted Sucessfully!");</script>';
   header("location:../../submission.php");
}
}
?>