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
  &nbsp;<a href="../../user.php"> <button class="btn btn-warning">Back</button></a>
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add User</strong></div>
                        <div class="card-body card-block">
                        <form action="add.php" method="post">
                           <div class="form-group"><label for="company" class=" form-control-label">Name</label><input type="text" name="name" id="company" placeholder="Enter user name" maxlength="100" class="form-control" required></div>
                           <div class="form-group"><label for="company" class=" form-control-label">Phone Number</label><input type="tel" name="phno" id="company" placeholder="Enter phone number" class="form-control" required></div>
                                                      <div class="form-group"><label for="company" class=" form-control-label">Password</label><input type="text" name="password" id="company" placeholder="Enter password" maxlength="100" class="form-control" required></div>
                                                      <div class="form-group"><label for="company" class=" form-control-label">Street Address</label><input type="text" name="stadd" id="company" placeholder="Enter street address" maxlength="100" class="form-control" required></div>
                                                      <div class="form-group"><label for="company" class=" form-control-label">City</label><input type="text" name="city" id="company" placeholder="Enter city" maxlength="100" class="form-control" required></div>
                                                      <div class="form-group"><label for="company" class=" form-control-label">Pincode</label><input type="number" name="pincode" id="company" placeholder="Enter pincode" minlength="6" maxlength="6" class="form-control" required></div>
                                                      <div class="form-group"><label for="company" class=" form-control-label">Status</label>
                                                      <select name="status">
                                                      <option selected value="0">Visitor</option>
                                                      <option value="2">Staff</option>
                                                      <option value="1">Admin</option>
                                                      </select>
                                                      </div>
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
        //encrypt password
        $enc_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO `users` SET name='$_POST[name]', phno='$_POST[phno]', password='$enc_password', stadd='$_POST[stadd]', city='$_POST[city]', pincode='$_POST[pincode]', status='$_POST[status]'");
        echo '<script>alert("User Created Successfully");</script>';
        echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../../user.php">';
     }
      ?>