<?php
session_start();
if (!isset($_SESSION['USER_ID'])) {
	header("location:admin_login.php");
	die();
}
?>
<?php
include('tracker_config.php');
include('admin_connection.php');

if (!isset($_SESSION['USER_ID'])) {
	header("location:admin_login.php");
	die();
}
else{
    header("location:admin.php");
}
 ?>

