<?php
require("connection.php");

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $query = "SELECT * FROM user WHERE U_mail='$_GET[email]' AND verification_code='$_GET[v_code]'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['is_verified'] == 0) {
                $update = "UPDATE user SET is_verified='1' WHERE U_mail='$result_fetch[U_mail]'";
                if (mysqli_query($con, $update)) {
                    echo " <script>
                alert('Email verification successful');
                window.location.href='signin.php';
                </script>
                ";
                } else {
                    echo "<script>
                alert('Cannot run query');
                window.location.href='signup.php';
                </script>
                ";
                }
            } else {
                echo "<script>
            alert('Email already registered');
            window.location.href='signin.php';
            </script>
            ";
            }
        }
    } else {
        echo "<script>
        alert('Cannot run query');
        window.location.href='signin.php';
        </script>
        ";
    }
}

?>