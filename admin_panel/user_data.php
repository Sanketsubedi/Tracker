
<?php
$sql_user = "SELECT * FROM `user` ORDER BY uid;";
$result_user = mysqli_query($conn,$sql_user);
$num_user = mysqli_num_rows($result_user);
    ?>