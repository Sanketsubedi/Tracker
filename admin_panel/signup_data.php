<?php
include 'admin_connection.php';
?>
<?php
if (isset($_POST['submit'])) {
    $A_name = $_POST['A_name'];
    $A_mail = $_POST['A_mail'];
    $A_password = $_POST['A_password'];
    $number = $_POST['A_number'];

    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_tmpname = $_FILES['file']['tmp_name'];
    $file_error = $_FILES['file']['error'];
    $file_size = $_FILES['file']['size'];
    $type_arry = explode(".",$file_name);
    $type = strtolower(end($type_arry));

    $allowed = array('jpg','jpeg','png');
    if(in_array($type,$allowed)){
        if($file_error === 0){
            if($file_size < 1000000){
                $name = uniqid('',true).".".$type;
                $file_destination = '../imgs/'. $name ;
                move_uploaded_file($file_tmpname,$file_destination);
                $sql = "insert into admin (A_name , A_mail , passwords , phone_no ,A_image ,Role) values('$A_name','$A_mail','$A_password','$number','$name','0');";
                if (mysqli_query($conn,$sql)){
                   echo "<script>alert('new record inserted')</script>";
                }
                else{
                   echo "error";
                }
                 header("Location: admin_signup.php?success");
            }
            else{
                echo"File Size Too Big!";
            }
        }
        else{
            echo"Error!";
        }
    }
    else{
        echo"Please Enter Valid File.";
    }
}
?>