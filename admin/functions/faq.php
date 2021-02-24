<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Add / Edit Term</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../assets/css/normalize.css">
      <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="../assets/css/themify-icons.css">
      <link rel="stylesheet" href="../assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="../assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <?php
require("../database.php");
require("../setting.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:login.php");
}
echo '<br>';
echo '&nbsp;&nbsp;<a href="../store_settings.php" class="btn btn-warning">Back</a>';
//check for action variable
if(!empty($_GET['action'])){
    //for adding script
if($_GET['action'] == "add" && !isset($_POST["add"])){
echo '<div class="content pb-0">
<div class="animated fadeIn">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header"><strong>Add Question</strong></div>
            <div class="card-body card-block">
            <form action="faq.php?action=add" method="post">
               <div class="form-group"><label for="company" class=" form-control-label">Question</label><input type="text" name="question" id="company" placeholder="Enter question" class="form-control" required="true"></div>
               <div class="form-group"><label for="vat" class=" form-control-label">Answer</label><textarea type="text" name="answer" id="vat" placeholder="Enter answer" class="form-control" required="true"></textarea></div>
               <input type="submit" value="Add" name="add" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
</form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>';
}
// for adding function
elseif(isset($_POST['add']) && $_GET['action'] == "add"){
    mysqli_query($conn, "INSERT INTO `faqs` SET title='$_POST[question]', description='$_POST[answer]'");
    echo '<script>alert("Question added successfully!");</script>';
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
}
//for editing script
elseif($_GET['action'] == "edit" && !empty($_GET['id']) && !isset($_POST["edit"])){
    $faq =  mysqli_query($conn, "SELECT * FROM `faqs` where id='$_GET[id]'");
    $row = mysqli_fetch_assoc($faq);
    echo '<div class="content pb-0">
    <div class="animated fadeIn">
       <div class="row">
          <div class="col-lg-12">
             <div class="card">
                <div class="card-header"><strong>Edit Question</strong></div>
                <div class="card-body card-block">
                <form action="faq.php?id='.$row["id"].'&action=edit" method="post">
                   <div class="form-group"><label for="company" class=" form-control-label">Question</label><input type="text" name="question" id="company" value="'.$row["title"].'" placeholder="Enter question" class="form-control" required="true"></div>
                   <div class="form-group"><label for="vat" class=" form-control-label">Answer</label><textarea type="text" name="answer" id="vat" placeholder="Enter answer" class="form-control" required="true">'.$row["description"].'</textarea></div>
                   <input type="submit" value="Save" name="edit" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
    </form>
                </div>
             </div>
          </div>
       </div>
    </div>
    </div>';

}
//for edit function
elseif(isset($_POST['edit']) && !empty($_GET['id']) && $_GET['action'] == "edit"){
    mysqli_query($conn, "UPDATE `faqs` SET title='$_POST[question]', description='$_POST[answer]' where id='$_GET[id]'");
    echo '<script>alert("Question Updated successfully!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
}
//for delete function
elseif($_GET['action'] == "remove" && !empty($_GET['id'])){
    mysqli_query($conn, "DELETE FROM `faqs` WHERE id='$_GET[id]'");
    echo '<script>alert("Question deleted successfully!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
}
//else dont do anything
else{
    die('link invalid!');
}
}


//else die
else{
    die('link invalid! duh');
}
?>