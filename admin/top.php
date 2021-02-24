<?php
require("database.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:login.php");
}
require("setting.php");
if(defined("pm")){
   $ss = "unactive";
   $sm = "unactive";
   $um = "unactive";
   $or = "unactive";
   $oc = "unactive";
   $os = "unactive";
   $op = "unactive";
   $cm = "unactive";
   $pm = "active";
   $com = "unactive";
}
elseif(defined("cm")){
   $ss = "unactive";
   $sm = "unactive";
   $um = "unactive";
   $or = "unactive";
   $oc = "unactive";
   $os = "unactive";
   $op = "unactive";
   $cm = "active";
   $pm = "unactive";
   $com = "unactive";
}
elseif(defined("op")){
   $ss = "unactive";
   $sm = "unactive";
   $um = "unactive";
   $or = "unactive";
   $oc = "unactive";
   $os = "unactive";
   $op = "active";
   $cm = "unactive";
   $pm = "unactive";
   $com = "unactive";
}
elseif(defined("os")){
   $ss = "unactive";
   $sm = "unactive";
   $um = "unactive";
   $or = "unactive";
   $oc = "unactive";
   $os = "active";
   $op = "unactive";
   $cm = "unactive";
   $pm = "unactive";
   $com = "unactive";
}
elseif(defined("oc")){
   $ss = "unactive";
   $sm = "unactive";
   $um = "unactive";
   $or = "unactive";
   $oc = "active";
   $os = "unactive";
   $op = "unactive";
   $cm = "unactive";
   $pm = "unactive";
   $com = "unactive";
}
elseif(defined("or")){
   $ss = "unactive";
   $sm = "unactive";
   $um = "unactive";
   $or = "active";
   $oc = "unactive";
   $os = "unactive";
   $op = "unactive";
   $cm = "unactive";
   $pm = "unactive";
   $com = "unactive";
}
elseif(defined("um")){
   $ss = "unactive";
   $sm = "unactive";
   $um = "active";
   $or = "unactive";
   $oc = "unactive";
   $os = "unactive";
   $op = "unactive";
   $cm = "unactive";
   $pm = "unactive";
   $com = "unactive";
}
elseif(defined("sm")){
   $ss = "unactive";
   $sm = "active";
   $um = "unactive";
   $or = "unactive";
   $oc = "unactive";
   $os = "unactive";
   $op = "unactive";
   $cm = "unactive";
   $pm = "unactive";
   $com = "unactive";
}
elseif(defined("ss")){
   $ss = "active";
   $sm = "unactive";
   $um = "unactive";
   $or = "unactive";
   $oc = "unactive";
   $os = "unactive";
   $op = "unactive";
   $cm = "unactive";
   $pm = "unactive";
   $com = "unactive";
}
elseif(defined("com")){
   $ss = "unactive";
   $sm = "unactive";
   $um = "unactive";
   $or = "unactive";
   $oc = "unactive";
   $os = "unactive";
   $op = "unactive";
   $cm = "unactive";
   $pm = "unactive";
   $com = "active";
}
else{
      $ss = "unactive";
      $sm = "unactive";
      $um = "unactive";
      $or = "unactive";
      $oc = "unactive";
      $os = "unactive";
      $op = "unactive";
      $cm = "unactive";
      $pm = "unactive";
      $com = "unactive";
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin Panel</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <style>
  #active {
     color : #03a9f3;
  }
  </style>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="index.php" id="<?php echo $pm; ?>"> Product Manager</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="category.php" id="<?php echo $cm; ?>"> Category Manager</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="coupon.php" id="<?php echo $com; ?>"> Coupon Manager</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="orders.php" > Order Manager</a>
                     <li class="dropdown"><a href="orders.php" id="<?php echo $op; ?>">Pending</a></li>
                     <li class="dropdown"><a href="orders_s.php" id="<?php echo $os; ?>">Shipped</a></li>
                     <li class="dropdown"><a href="orders_c.php" id="<?php echo $oc; ?>">Completed</a></li>
                     <li class="dropdown"><a href="orders_r.php" id="<?php echo $or; ?>">Rejected</a></li>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="user.php" id="<?php echo $um; ?>"> User Manager</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="submission.php" id="<?php echo $sm; ?>"> Submissions Manager</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="store_settings.php" id="<?php echo $ss; ?>"> Store Settings</a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area float-right">
                  <br>
                     <a href="functions/logout.php" >Welcome Admin &nbsp;<img src="../media/logout.ico"></img></a>

                  </div>
               </div>
            </div>
         </header>