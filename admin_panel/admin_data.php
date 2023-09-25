
<?php
include  'admin_connection.php';
include 'tracker_config.php';
$sql = "SELECT * FROM `admin` ORDER BY A_id;";
$sql_role = "SELECT * FROM `admin` ORDER BY Role DESC;";
$result = mysqli_query($conn,$sql_role);
$num = mysqli_num_rows($result);
// while($row = mysqli_fetch_assoc($result)){
//     if($_SESSION['USER_ID'] = $row['A_id']){
//         $fetched = mysqli_fetch_assoc($result);
// }
// }
    ?>