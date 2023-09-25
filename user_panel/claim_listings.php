<?php
include 'item_data.php';
    if(isset($_POST['Claim'])){
        $id = $_POST['id'];
        $select = "UPDATE item SET status='Claimed' WHERE I_id ='$id'";
        $result = mysqli_query($con,$select);
        header("Location:my_listings.php");
    }
    ?>