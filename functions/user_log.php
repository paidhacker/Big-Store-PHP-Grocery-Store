<?php
require('../includes/database.php');
$phno = mysqli_real_escape_string($conn, $_POST['phno']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
if(empty($phno) || empty($pass)){
    echo '<script>alert("Please fill all the fields!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../login.php">';
}
else{
    $res= mysqli_query($conn,"SELECT * FROM `users` where phno='$phno'");
    $check_user=mysqli_num_rows($res);
   if($check_user>0){
  $row=mysqli_fetch_assoc($res);
  //verify entered password
  if(password_verify($pass, $row['password'])){
  $_SESSION['USER_LOGIN']='yes';
  $_SESSION['USER_ID']=$row['id'];
  $_SESSION['USER_NAME']=$row['name'];
  echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../index.php">';
  }
  else{
    echo '<script>alert("Incorrect Phone Number or Password!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../login.php">';
  }
}
else{
    echo '<script>alert("Incorrect Phone Number or Password!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../login.php">';
}
}
?>