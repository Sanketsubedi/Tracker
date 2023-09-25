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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form submission here
        $token = $_POST['token']; // Retrieve the token from the form
        $newPassword = $_POST['new_password']; // Retrieve the new password from the form
    
        // Add code here to validate the token, e.g., check if it's valid and not expired
        // If the token is valid, update the user's password in the database
    
        // Example database update code (replace with your own database logic):
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $query = "UPDATE `user` SET U_password = '$hashedPassword' WHERE reset_token = '$token'";
        $result = mysqli_query($con, $query);
        // Execute the query
        // If the update is successful, you can display a success message
    

        // Display a success message to the user
        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: ' Password reset successful. You can now log in with your new password.',
                    showConfirmButton: true

                }).then(function () {
                    window.location = "signin.php";
                }
                )
            </script>
            <?php
    } else {
        // Display the password reset form
    } ?>


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
                                <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter a new
                                        password</label>
                                    <input type="password" name="new_password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="*******" required="">
                                </div>
                                <button name="newpwd"
                                    class="w-full text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Reset</button>
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

</html>