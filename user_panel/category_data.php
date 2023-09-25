<?php
include  'connection.php';
$sql = "SELECT * FROM `category` ORDER BY C_id;";
$result_cate = mysqli_query($con,$sql);
    ?>