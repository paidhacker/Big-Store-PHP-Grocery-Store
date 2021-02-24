<?php
require('../includes/database.php');
$phno = $_POST['phno'];
$name = $_POST['name'];
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];
$address = $_POST['address'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];

if(empty($phno) || empty($pass) || empty($cpass) || empty($address) || empty($city) || empty($pincode)){
echo '<script>alert("Please fill all the fields!");</script>';
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../register.php">';
}
else{
    if($pass != $cpass){
        echo '<script>alert("Password does not match...");</script>';
       echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../register.php">';
    }
else{    
$check_user=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users` where phno='$phno'"));
if($check_user>0){
    echo '<script>alert("Phone number already registered.");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../register.php">';
}
else{
    //encrypt password
    $enc_pass = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($conn,"INSERT INTO `users` (phno,name,password,stadd,city,pincode,status) values('$phno','$name','$enc_pass','$address','$city','$pincode','0')");
    echo '<script>alert("Thank You For Registration!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../login.php">';
}
}
}
?>