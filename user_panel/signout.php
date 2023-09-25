<?php
session_start();
unset($_SESSION['logged_in']);
unset( $_SESSION['Name'] );
unset($_SESSION['email']);
unset($_SESSION['image']);
unset($_SESSION['id']);
header("location:signin.php");
die();
?>