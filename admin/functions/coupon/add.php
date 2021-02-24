<?php
require("../../database.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:../../login.php");
}
if(isset($_POST["add"])){
   $coupon = mysqli_query($conn, "SELECT * FROM `cupon` where code=''");
   $code = $_POST["code"];
   $percent = $_POST["percent"];
   $couponl = mysqli_query($conn, "SELECT * FROM `cupon` where code='$code'");
   if(mysqli_num_rows($couponl) < 1){
   mysqli_query($conn, "INSERT INTO `cupon` SET code='$code', percentage='$percent', status='1'");
   echo '<script>alert("Coupon Added Successfully!");</script>';
   echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../../coupon.php">';
   die();
}
else{
   echo '<script>alert("Coupon Already Exists!");</script>';
   echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../../coupon.php">';
   die();
}
}
?>
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
  &nbsp;<a href="../../coupon.php"> <button class="btn btn-warning">Back</button></a>
      <div>
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Coupon</strong></div>
                        <div class="card-body card-block">
                        <form action="add.php" method="post" enctype="multipart/form-data">

                           <div class="form-group"><label for="company" class=" form-control-label">Code</label><input type="text" id="company" name="code" placeholder="Enter coupon code" class="form-control" required="true"></div>
                           <div class="form-group"><label for="company" class=" form-control-label">Discount %</label><input type="number" id="company" name="percent" placeholder="Enter discount percentage" min="1" max="100" class="form-control" required="true"></div>
                           <input type="submit" class="btn btn-lg btn-info btn-block" name="add" value="Add Coupon">
                           </button>
                        </div>
                        </form>
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
if(isset($_POST['update'])){
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
         if($file_size <= 999999999999999999999999999999){
            $file_name_new = uniqid('','true') .".". $file_ext;
         $file_destination = '../../../media/' . $file_name_new;
         if(move_uploaded_file($file_tmp, $file_destination)){
            if($file_size >= 1){
               $img1 = $file_name_new;
            
            }
            else{
              
            }
         }
      }
   }
}
//end image 1


   mysqli_query($conn, "INSERT INTO `product` SET name='$_POST[name]',short_desc='lol',long_desc='$_POST[long_desc]',category='$_POST[cat_id]',mrp='$_POST[mrp]',price='$_POST[price]',meta_title='$_POST[meta_title]',meta_desc='$_POST[meta_desc]',meta_tags='$_POST[meta_tags]',quantity='$_POST[quantity]',status='$_POST[status]',img1='$img1'");
   echo '<script>alert("Product Added Successfully!");</script>';
  echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../../index.php">';

}
   ?>