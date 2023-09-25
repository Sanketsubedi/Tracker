<?php
require('connection.php');
session_start();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['name'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $category = $_POST['helper-radio'];
    if ($category == 'Documents') {
        $cid = '1';
    } else if ($category == 'Pets') {
        $cid = '2';
    } else if ($category == 'Electronics') {
        $cid = '3';
    } else {
        $cid = '4';
    }
    $uid = $_SESSION['id'];
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_tmpname = $_FILES['file']['tmp_name'];
    $file_error = $_FILES['file']['error'];
    $file_size = $_FILES['file']['size'];
    $type_arry = explode(".", $file_name);
    $type = strtolower(end($type_arry));
    $name_upload = uniqid('', true) . "." . strtolower(end($type_arry));
    $file_destination = '../imgs/' . $name_upload;
    move_uploaded_file($file_tmpname, $file_destination);

    $sql = "insert into item(I_name,Date_Found,Location,I_image,status,U_id,C_id) values('$Name','$date','$location','$name_upload','Pending','$uid','$cid')";
    if (mysqli_query($con, $sql)) {
        header("Location:userbase.php?Success");
    } else {
        header("Location:userbase.php?Failed");
    }
}

?>