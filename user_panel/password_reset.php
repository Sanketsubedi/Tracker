<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <?php
    include "sweetjs.php";
    ?>
</head>

<body>
    <?php
    // Include PHPMailer
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'olfstracker@gmail.com';
        $mail->Password = 'mwrwiptsmyqpqmlf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        // Reset Password Logic
        if (isset($_POST['reset'])) {
            $email = $_POST['email']; // User's email
    
            // Check if the user exists in the database
            include "user_data.php";
            $query = "SELECT * FROM `user` WHERE U_mail = '$email'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                // User with the provided email exists in the database
    
                // Generate a unique reset token (you can use random_bytes, uniqid, or any secure method)
                $token = bin2hex(random_bytes(16));

                // Update the user's password reset token in the database
                $query = "UPDATE `user` SET reset_token = '$token' WHERE U_mail = '$email'";
                $result = mysqli_query($con, $query);

                // Send the reset email
                $resetLink = "localhost/Tracker/user_panel/pwd_reset.php?token=$token"; // URL to your password reset page
    
                // Recipients
                $mail->setFrom('olfstracker@gmail.com', 'OLFS');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body = "Click the following link to reset your password: <a href='$resetLink'>$resetLink</a>";

                $mail->send();

                // Display success message
                ?>
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Password reset email sent successfully.',
                        showConfirmButton: true
                    }).then(function () {
                        window.location = "signin.php";
                    });
                </script>
                <?php
            } else {
                // User with the provided email does not exist
                ?>
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'User with this email does not exist.',
                        showConfirmButton: true
                    });
                </script>
                <?php
            }
        }
    } catch (Exception $e) {
        // Handle email sending error
        ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Password reset email could not be sent.',
                showConfirmButton: true
            }).then(function () {
                window.location = "signin.php";
            });
        </script>
        <?php
    }
    ?>
    <!-- Rest of your HTML code -->


    <!-- Navbar starts here     -->
    <div class="w-screen h-screen">
        <div class="w-full h-5/6">
            <?php
            include "nav_nosession_nav_only.php";
            ?>
            <!-- navbar ends here -->

            <section class="">
                <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto mt-32 lg:py-0">
                    <div
                        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                Reset your password
                            </h1>
                            <form class="space-y-4 md:space-y-6" method="POST">
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your
                                        user account's verified email address and we will send you a password reset
                                        link.</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="name@company.com" required="">
                                </div>
                                <button name="reset"
                                    class="w-full text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Send
                                    password reset email</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</body>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>

</html>