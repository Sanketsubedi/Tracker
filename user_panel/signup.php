<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up | Tracker</title>
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
    if (isset($_POST['register'])) {
        $user_exist_query = "SELECT * FROM user WHERE U_mail='$_POST[email]'";
        $result = mysqli_query($con, $user_exist_query);
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_tmpname = $_FILES['file']['tmp_name'];
        $file_error = $_FILES['file']['error'];
        $file_size = $_FILES['file']['size'];
        $type_arry = explode(".", $file_name);
        $type = strtolower(end($type_arry));
        $allowed = array('jpg', 'jpeg', 'png');
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                #if any user has already taken  email
                $result_fetch = mysqli_fetch_assoc($result);
                if ($result_fetch['U_mail'] == $_POST['email']) {
                    
                    #if any user has already taken email
                    ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Email already taken',
                            showConfirmButton: true
                        }).then(function () {
                            window.location = "signup.php";
                        }
                        )
                    </script>
                    <?php
                }
            } elseif ($_POST['password'] != $_POST['cpassword']) {
                ?>
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Password doesnot match',
                        showConfirmButton: true
                    }).then(function () {
                        window.location = "signup.php";
                    }
                    )
                </script>
                <?php
            } else {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $v_code = bin2hex(random_bytes(16));
                $name = uniqid('', true) . "." . $type;
                $file_destination = '../imgs/' . $name;
                move_uploaded_file($file_tmpname, $file_destination);
                $query = "INSERT INTO user (U_name, U_mail, U_password, U_number, U_image, active_status, verification_code, is_verified) VALUES ('$_POST[Name]','$_POST[email]','$password','$_POST[Number]','$name','Active','$v_code','0')";
                if (mysqli_query($con, $query) && sendMail($_POST['email'], $v_code)) {
                    ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: ' Regristration Successful! Verify your email to become verified user.',
                            showConfirmButton: true

                        }).then(function () {
                            window.location = "signin.php";
                        }
                        )
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Server down',
                            showConfirmButton: true
                        }).then(function () {
                            window.location = "signup.php";
                        }
                        )
                    </script>
                    <?php
                }
            }
        } else {
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Cannot run query.',
                    showConfirmButton: true
                }).then(function () {
                    window.location = "signup.php";
                }
                )
            </script>
            <?php
        }

    } ?>
    <div class="w-screen h-screen overflow-x-hidden ">
        <div class="w-full h-5/6">
            <?php
            include "nav_nosession_nav_only.php";
            ?>
            <section class="lg:mt-14 dark:bg-gray-900 ">
                <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0 my-2">

                    <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0  border-gray-300">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center">
                                Create your account
                            </h1>
                            <form class="space-y-4 md:space-y-6" method="POST" enctype="multipart/form-data">
                                <div>
                                    <label for="Name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                    <input type="text" name="Name" id="Name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5 dark:bg-gray-700 "
                                        placeholder="Enter Your Name" required="">
                                </div>
                                <div>
                                    <label for="Number" class="block mb-2 text-sm font-medium text-gray-900">Phone
                                        Number</label>
                                    <input type="text" name="Number" id="Name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5 dark:bg-gray-700 "
                                        placeholder="ex: 9845123245" required="">
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  block w-full p-2.5 dark:bg-gray-700 "
                                        placeholder="name@company.com" required="">
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                        required="">
                                </div>
                                <div>
                                    <label for="confirm-password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                        password</label>
                                    <input type="password" name="cpassword" id="confirm-password" placeholder="••••••••"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        required="">
                                </div>

                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="file_input">Upload Profile Picture</label>
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="file_input_help" id="file_input" type="file" name="file">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG,
                                        JPG or JPEG (MAX. 800x400px). </p>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="terms" aria-describedby="terms" type="checkbox"
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                            required="">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept
                                            the <a
                                                class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                                                href="terms_and_conditions.php">Terms and Conditions</a></label>
                                    </div>
                                </div>
                                <button type="submit" name="register"
                                    class="w-full text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create
                                    an account</button>
                                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                    Already have an account? <a href="signin.php"
                                        class="font-medium text-primary-600 hover:underline">Login
                                        here</a>
                                </p>
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