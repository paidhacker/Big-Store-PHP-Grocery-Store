<?php
session_start();
//values
$pid = $_POST["pid"];
$name = $_POST["hidden_name"];
$price = $_SESSION["price"];
$image = $_POST["image"];
$qty = $_POST["qty"];
//storing in product array
$product = array($pid,$name,$price,$image,$qty);
//if product is not in cart then add it
if(!isset($_SESSION[$name])){
//session storing
$_SESSION[$name] = $product;
//increasing count
$_SESSION["count"] += 1;
header('location:../cart.php');
}
//else show message
else{
    echo '<script>alert("Item already in cart!");</script>';
    echo '<meta HTTP-EQUIV="REFRESH" content="0; url=../cart.php">';
}
?>