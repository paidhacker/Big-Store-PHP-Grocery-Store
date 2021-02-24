<?php
require("../database.php");
require("../setting.php");
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header("location:login.php");
}
if(isset($_POST['save']) && !empty($_POST['ps']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['title']) && !empty($_POST['desc']) && !empty($_POST['about']) && !empty($_POST['h1']) && !empty($_POST['contact_description']) && !empty($_POST['add']) && !empty($_POST['mail']) && !empty($_POST['pno'])){
    //for admin
	$fp = fopen('../setting.php','w');
fwrite($fp, '<?php
$ps = "'.$_POST['ps'].'";
$fname = "'.$_POST['fname'].'";
$lname = "'.$_POST['lname'].'";
$title = "'.$_POST['title'].'";
$desc = "'.$_POST['desc'].'";
$about = "'.$_POST['about'].'";
$header1 = "'.$_POST['h1'].'";
$contact_description = "'.$_POST['contact_description'].'";
$add = "'.$_POST['add'].'";
$mail = "'.$_POST['mail'].'";
$pno = "'.$_POST['pno'].'";
?>');
fclose($fp);
//for staff
$fp = fopen('../../staff/setting.php','w');
fwrite($fp, '<?php
$ps = "'.$_POST['ps'].'";
$fname = "'.$_POST['fname'].'";
$lname = "'.$_POST['lname'].'";
$title = "'.$_POST['title'].'";
$desc = "'.$_POST['desc'].'";
$about = "'.$_POST['about'].'";
$header1 = "'.$_POST['h1'].'";
$contact_description = "'.$_POST['contact_description'].'";
$add = "'.$_POST['add'].'";
$mail = "'.$_POST['mail'].'";
$pno = "'.$_POST['pno'].'";
?>');
fclose($fp);
//for users
$fp = fopen('../../includes/setting.php','w');
fwrite($fp, '<?php
$ps = "'.$_POST['ps'].'";
$fname = "'.$_POST['fname'].'";
$lname = "'.$_POST['lname'].'";
$title = "'.$_POST['title'].'";
$desc = "'.$_POST['desc'].'";
$about = "'.$_POST['about'].'";
$header1 = "'.$_POST['h1'].'";
$contact_description = "'.$_POST['contact_description'].'";
$add = "'.$_POST['add'].'";
$mail = "'.$_POST['mail'].'";
$pno = "'.$_POST['pno'].'";
$uko = uniqid("", "true");
?>
<style>
.banner-top{
	text-align: center;
    width: 100%;
    height: 114px;
    display: block;
    background: url(images/sh.jpg?<?php echo $uko; ?>)no-repeat ;
    padding: 3em 0;
    background-size: cover;
}
</style>
');
fclose($fp);
}
else{
    echo '<script>alert("Please fill all the feilds!");</script>';
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
die();
}

//files start here...
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
       $file_destination = '../../images/abfnefivei.jpg';
       if($file_ext == "jpg" || $file_ext == "jpeg"){
       if(move_uploaded_file($file_tmp, $file_destination)){
          if($file_size >= 1){
             $picture = $file_destination;
             list($width, $heigth)=getimagesize($picture);
             $nwidth = 370;
             $nheight = 370;
             $newpicture = imagecreatetruecolor($nwidth, $nheight);
             $source = imagecreatefromjpeg($picture);
             imagecopyresized($newpicture, $source, 0,0,0,0, $nwidth, $nheight, $width, $heigth);
             imagejpeg($newpicture, '../../images/ab.jpg');
             unlink($file_destination);
          }
          else{
            
          }
       }
       }
       else{
          echo '<script>alert("Please use only jpg or jpeg image formats!");</script>';
          echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
          die();
       }
    }
    else{
       echo '<script>alert("File too big! Please use a file less than 10MB");</script>';
       echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
       die();
    }
 }
}

//image 2
if(isset($_FILES['img2'])) {
    $file = $_FILES['img2'];
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
       $file_destination = '../../images/ab1fnefivei.jpg';
       if($file_ext == "jpg" || $file_ext == "jpeg"){
       if(move_uploaded_file($file_tmp, $file_destination)){
          if($file_size >= 1){
             $picture = $file_destination;
             list($width, $heigth)=getimagesize($picture);
             $nwidth = 370;
             $nheight = 370;
             $newpicture = imagecreatetruecolor($nwidth, $nheight);
             $source = imagecreatefromjpeg($picture);
             imagecopyresized($newpicture, $source, 0,0,0,0, $nwidth, $nheight, $width, $heigth);
             imagejpeg($newpicture, '../../images/ab1.jpg');
             unlink($file_destination);
          }
          else{
            
          }
       }
       }
       else{
          echo '<script>alert("Please use only jpg or jpeg image formats!");</script>';
          echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
          die();
       }
    }
    else{
       echo '<script>alert("File too big! Please use a file less than 10MB");</script>';
       echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
       die();
    }
 }
}

//image 3
if(isset($_FILES['img3'])) {
    $file = $_FILES['img3'];
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
       $file_destination = '../../images/cacfnefivei.jpg';
       if($file_ext == "jpg" || $file_ext == "jpeg"){
       if(move_uploaded_file($file_tmp, $file_destination)){
          if($file_size >= 1){
             $picture = $file_destination;
             list($width, $heigth)=getimagesize($picture);
             $nwidth = 445;
             $nheight = 300;
             $newpicture = imagecreatetruecolor($nwidth, $nheight);
             $source = imagecreatefromjpeg($picture);
             imagecopyresized($newpicture, $source, 0,0,0,0, $nwidth, $nheight, $width, $heigth);
             imagejpeg($newpicture, '../../images/cac.jpg');
             unlink($file_destination);
          }
          else{
            
          }
       }
       }
       else{
          echo '<script>alert("Please use only jpg or jpeg image formats!");</script>';
          echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
          die();
       }
    }
    else{
       echo '<script>alert("File too big! Please use a file less than 10MB");</script>';
       echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
       die();
    }
 }
}
//image 4

if(isset($_FILES['img4'])) {
    $file = $_FILES['img4'];
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
       $file_destination = '../../images/contact2fnefivei.jpg';
       if($file_ext == "jpg" || $file_ext == "jpeg"){
       if(move_uploaded_file($file_tmp, $file_destination)){
          if($file_size >= 1){
             $picture = $file_destination;
             list($width, $heigth)=getimagesize($picture);
             $nwidth = 500;
             $nheight = 329;
             $newpicture = imagecreatetruecolor($nwidth, $nheight);
             $source = imagecreatefromjpeg($picture);
             imagecopyresized($newpicture, $source, 0,0,0,0, $nwidth, $nheight, $width, $heigth);
             imagejpeg($newpicture, '../../images/contact2.jpg');
             unlink($file_destination);
          }
          else{
            
          }
       }
       }
       else{
          echo '<script>alert("Please use only jpg or jpeg image formats!");</script>';
          echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
          die();
       }
    }
    else{
       echo '<script>alert("File too big! Please use a file less than 10MB");</script>';
       echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
       die();
    }
 }
}

//image 5

if(isset($_FILES['img5'])) {
    $file = $_FILES['img5'];
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
       $file_destination = '../../images/shfnefivei.jpg';
       if($file_ext == "jpg" || $file_ext == "jpeg"){
       if(move_uploaded_file($file_tmp, $file_destination)){
          if($file_size >= 1){
             $picture = $file_destination;
             list($width, $heigth)=getimagesize($picture);
             $nwidth = 1920;
             $nheight = 355;
             $newpicture = imagecreatetruecolor($nwidth, $nheight);
             $source = imagecreatefromjpeg($picture);
             imagecopyresized($newpicture, $source, 0,0,0,0, $nwidth, $nheight, $width, $heigth);
             imagejpeg($newpicture, '../../images/sh.jpg');
             unlink($file_destination);
          }
          else{
            
          }
       }
       }
       else{
          echo '<script>alert("Please use only jpg or jpeg image formats!");</script>';
          echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
          die();
       }
    }
    else{
       echo '<script>alert("File too big! Please use a file less than 10MB");</script>';
       echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
       die();
    }
 }
}

//image 6
if(isset($_FILES['img6'])) {
    $file = $_FILES['img6'];
    ($file);
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_prefix = ('https://spaceup.ml/');
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    if($file_error === 0){
       if($file_size <= 10000000009){
       $file_destination = '../../images/videofnefivei.jpg';
       if($file_ext == "jpg" || $file_ext == "jpeg"){
       if(move_uploaded_file($file_tmp, $file_destination)){
          if($file_size >= 1){
            $picture = $file_destination;
            list($width, $heigth)=getimagesize($picture);
            $nwidth = 960;
            $nheight = 540;
            $newpicture = imagecreatetruecolor($nwidth, $nheight);
            $source = imagecreatefromjpeg($picture);
            imagecopyresized($newpicture, $source, 0,0,0,0, $nwidth, $nheight, $width, $heigth);
            imagejpeg($newpicture, '../../images/video.jpg');
            unlink($file_destination);
          }
          else{
            
          }
       }
       }
       else{
          echo '<script>alert("Please use only jpg or jpeg image formats!");</script>';
          echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
          die();
       }
    }
    else{
       echo '<script>alert("File too big! Please use a file less than 10MB");</script>';
       echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
       die();
    }
 }
}
echo '<script>alert("Changes saved successfully!");</script>';
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../store_settings.php">';
?>