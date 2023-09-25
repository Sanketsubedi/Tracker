<?php
include  'connection.php';
$sql = "SELECT * FROM `item` ORDER BY I_id;";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
    ?>