<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Add Element</title>
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
if(!empty($_GET['id']) && empty($_GET['action']) && !isset($_POST['update']) && !isset($_POST['add'])){
    mysqli_query($conn, "DELETE FROM `about` WHERE id='$_GET[id]'");
    echo '<script>alert("Element removed successfully!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
}
elseif(isset($_POST['add']) && empty($_GET['id']) && empty($_GET['action'])){
    mysqli_query($conn, "INSERT INTO `about` SET date='$_POST[date]', description='$_POST[desc]'");
    echo '<script>alert("Element added successfully!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
}
elseif(!empty($_GET['id']) && !empty($_GET['action']) && !isset($_POST['add']) && !isset($_POST['update'])){
   $about = mysqli_query($conn, "SELECT * FROM `about` WHERE id='$_GET[id]'");
$row = mysqli_fetch_assoc($about);
echo '
<body>
<div id="right-panel" class="right-panel">
   <div class="content pb-0">
      <div class="animated fadeIn">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="card-header"><strong>Update Element</strong></div>
                  <div class="card-body card-block">
                      <form action="about.php?id='.$_GET["id"].'&action='.$_GET["action"].'" method="post">
                     <div class="form-group"><label for="vat" class=" form-control-label">Date</label><input type="text" name="date" id="vat" value="'.$row["date"].'" placeholder="Enter Element Date." class="form-control" required="true"></div>
                     <div class="form-group"><label for="street" class=" form-control-label">Description</label><textarea type="text" name="desc" id="street" placeholder="Enter Element description." class="form-control" required="true">'.$row["description"].'</textarea></div>
                     <input type="submit" id="payment-button" name="update" value="Update" class="btn btn-lg btn-info btn-block">
</form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<script src="../assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="../assets/js/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins.js" type="text/javascript"></script>
<script src="../assets/js/main.js" type="text/javascript"></script>
</body>
</html>
';
}
elseif(!empty($_GET['id']) && !empty($_GET['action']) && !isset($_POST['add']) && isset($_POST['update'])){
mysqli_query($conn, "UPDATE `about` SET date='$_POST[date]', description='$_POST[desc]' where id='$_GET[id]'");
echo '<script>alert("Element Updated successfully!");</script>';
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
}
else{
?>
   <body>
      <div id="right-panel" class="right-panel">
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add an Element</strong></div>
                        <div class="card-body card-block">
                            <form action="about.php" method="post">
                           <div class="form-group"><label for="vat" class=" form-control-label">Date</label><input type="text" name="date" id="vat" placeholder="Enter Element Date." class="form-control" required="true"></div>
                           <div class="form-group"><label for="street" class=" form-control-label">Description</label><textarea type="text" name="desc" id="street" placeholder="Enter Element description." class="form-control" required="true"></textarea></div>
                           <input type="submit" id="payment-button" name="add" value="Save" class="btn btn-lg btn-info btn-block">
</form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <script src="../assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="../assets/js/popper.min.js" type="text/javascript"></script>
      <script src="../assets/js/plugins.js" type="text/javascript"></script>
      <script src="../assets/js/main.js" type="text/javascript"></script>
   </body>
</html>
<?php } ?>