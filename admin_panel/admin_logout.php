<?php 
session_start();
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_MAIL']);
header("location:admin_login.php");
die();
?>