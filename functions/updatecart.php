<?php
session_start();
$pid = $_POST["name0"];
$name = $_POST["name1"];
$price = $_POST["name2"];
$image = $_POST["name3"];
$qty = $_POST["name4"];
$event = $_POST["event"];

$product = array($pid,$name,$price,$image,$qty);

if ($event == "Update"){
    $_SESSION[$name] = $product;
    header('location:../cart.php');
}
elseif ($event == "Delete") {
    unset($_SESSION[$name]);
    header('location:../cart.php');
    $_SESSION["count"] -= 1;
}
else {
    header('location:../index.php');
}
?>