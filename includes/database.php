<?php
if(!defined("SESSION")){
    session_start();
}
$conn = mysqli_connect("localhost", "root", "", "grocery_store");
$unique_name = uniqid('', 'true');
?>