<?php
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In | Tracker</title>
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <?php
    include "sweetjs.php";
    ?>
</head>

<body>
    <?php
    include "php_mailer.php";
    if(isset($_POST['login'])) {
        $query = "SELECT * FROM user WHERE U_mail='$_POST[email]'";
        $result = mysqli_query($con, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $result_fetch = mysqli_fetch_assoc($result);
                if ($result_fetch['is_verified'] == 1) {
                if ($result_fetch['active_status']==="Active"){
                    if (password_verify($_POST['password'], $result_fetch['U_password'])) {
                        //if password matched
                        $_SESSION['id'] = $result_fetch['uid'];
                        $_SESSION['logged_in'] = true;
                        $_SESSION['Name'] = $result_fetch['U_name'];
                        $_SESSION['email'] = $result_fetch['U_mail'];
                        $_SESSION['number'] = $result_fetch['U_number'];
                        $_SESSION['image'] = $result_fetch['U_image'];
                        $_SESSION['password'] = $result_fetch['U_password'];
                        ?>
                        <script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Logging you in.',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function () {
                                window.location = "userbase.php";
                            }
                            )
                        </script>
                        <?php
                    }
                    //if incorrect password.
                    else {
                        ?>
                        <script>
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Incorrect Password',
                                showConfirmButton: true
                            }).then(function () {
                                window.location = "signin.php";
                            }
                            )
                        </script>
                        <?php
                    }
                }
                else{
                    ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Account has been Deleted please re-activate your account. We are redirecting to account activation page.',
                            showConfirmButton: true
                        }).then(function () {
                            window.location = "account_activate.php";
                        }
                        )
                    </script>
                    <?php
                }
                } else {
                    ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Email not verified',
                            showConfirmButton: true
                        }).then(function () {
                            window.location = "signin.php";
                        }
                        )
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Email not registered',
                        showConfirmButton: true
                    }).then(function () {
                        window.location = "signin.php";
                    }
                    )
                </script>
                <?php
            }
        } else {
            ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'cannot run query',
                            showConfirmButton: true
                        }).then(function () {
                            window.location = "signin.php";
                        }
                        )
                    </script>
                    <?php
        }

    }
    ?>
    <div class="w-screen h-screen fixed">
        <div class="w-full h-5/6">
            <?php
            include "nav_nosession_nav_only.php";
            ?>
            <section class="">
                <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto mt-32 lg:py-0">
                    <div
                        class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                Sign in to your account
                            </h1>
                            <form class="space-y-4 md:space-y-6" method="POST">
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="name@company.com" required="">
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required="">
                                </div>
                                <div class="flex">
                                    <a href="password_reset.php"
                                        class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                                        password?</a>
                                </div>
                                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                                    <button name="login" id="login"
                                        class="w-full text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                                        in</button>
                                </a>

                                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                    Don’t have an account yet? <a href="signup.php"
                                        class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign
                                        up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>


</body>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js">
</script>

</html>