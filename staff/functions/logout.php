<?php
session_start();
unset($_SESSION['STAFF_LOGIN']);
unset($_SESSION['STAFF_ID']);
unset($_SESSION['STAFF_NAME']);
header("location:../index.php");
die();
?>