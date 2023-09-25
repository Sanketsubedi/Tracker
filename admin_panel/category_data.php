<?php
include  'admin_connection.php';
include 'tracker_config.php';
$sql = "SELECT * FROM `category` ORDER BY C_id;";
$result_cate = mysqli_query($conn,$sql);
    ?>