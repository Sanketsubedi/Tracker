
<?php
include  'admin_connection.php';
include 'tracker_config.php';
$sql = "SELECT * FROM `item` ORDER BY I_id;";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
    ?>