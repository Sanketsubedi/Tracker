<?php
$con=mysqli_connect("localhost","root","","tracker");

if(mysqli_connect_error()){
    echo"<script>alert('Error xa her mula');</script>";
    exit();
}
?>