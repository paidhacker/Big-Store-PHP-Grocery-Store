<?php
require("../../database.php");
//valiadations
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:../../login.php");
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../../assets/css/normalize.css">
      <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="../../assets/css/themify-icons.css">
      <link rel="stylesheet" href="../../assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="../../assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="../../assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
   <br>
  &nbsp;<a href="../../category.php"> <button class="btn btn-warning">Back</button></a>
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Category</strong></div>
                        <div class="card-body card-block">
                        <form action="add.php" method="post" enctype="multipart/form-data">
                           <div class="form-group"><label for="company" class=" form-control-label">Name</label><input type="text" name="name" id="company" placeholder="Enter your category Name (Max: 20)" maxlength="20" class="form-control" required></div>
                           <div class="form-group"><label for="company" class=" form-control-label">Image 1 (1600 X 450)&nbsp;</label><input type="file" name="img1" id="file" required="true"></div>
                           <input type="submit" id="payment-button-amount" name="save" class="btn btn-lg btn-info btn-block" value="Save">
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php require("../../footer.php"); ?>
         <script src="../../assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="../../assets/js/popper.min.js" type="text/javascript"></script>
      <script src="../../assets/js/plugins.js" type="text/javascript"></script>
      <script src="../../assets/js/main.js" type="text/javascript"></script>
      <?php
     if(isset($_POST['save'])){
         //image 1
   if(isset($_FILES['img1'])) {
      $file = $_FILES['img1'];
      ($file);
      $file_name = $file['name'];
      $file_tmp = $file['tmp_name'];
      $file_size = $file['size'];
      $file_error = $file['error'];
      $file_prefix = ('https://spaceup.ml/');
      $file_ext = explode('.', $file_name);
      $file_ext = strtolower(end($file_ext));
      if($file_error === 0){
         if($file_size <= 10000000){
            $file_name_new = uniqid('','true') .".". $file_ext;
         $file_destination = '../../../media/' . $file_name_new;
         if($file_ext == "jpg" || $file_ext == "jpeg"){
         if(move_uploaded_file($file_tmp, $file_destination)){
            if($file_size >= 1){
               $img1 = $file_name_new;
               $picture = $file_destination;
               list($width, $heigth)=getimagesize($picture);
               $nwidth = 1600;
               $nheight = 450;
               $newpicture = imagecreatetruecolor($nwidth, $nheight);
               $source = imagecreatefromjpeg($picture);
               imagecopyresized($newpicture, $source, 0,0,0,0, $nwidth, $nheight, $width, $heigth);
               imagejpeg($newpicture, '../../../media/resized-'. $file_name_new);
               $rimg = 'resized-'. $file_name_new;
               unlink($file_destination);
            }
            else{
              
            }
         }
         }
         else{
            echo '<script>alert("Please use only jpg or jpeg image formats!");</script>';
            echo '<meta HTTP-EQUIV="REFRESH" content="0; url=add.php">';
            die();
         }
      }
      else{
         echo '<script>alert("File too big! Please use a file less than 10MB");</script>';
         echo '<meta HTTP-EQUIV="REFRESH" content="0; url=add.php">';
         die();
      }
   }
}
        mysqli_query($conn, "INSERT INTO `categories` SET name='$_POST[name]', img='$rimg', status='1'");
        echo '<script>alert("Category Created Successfully");</script>';
        echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../../category.php">';
     }
      ?>