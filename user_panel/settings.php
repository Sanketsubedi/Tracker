<?php
require('connection.php');
session_start();
// if (!isset($_SESSION['USER_ID'])) {
// 	header("location:index.php");
// 	die();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile | Tracker</title>
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    <?php
    include "sweetjs.php";
    ?>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        include 'user_data.php';
        $row = mysqli_fetch_assoc($result_user);
        $uid = $_SESSION['id'];
        $Name = $_POST['name'];
        $number = $_POST['number'];
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
        $sql = "UPDATE user SET U_name='$Name', U_number='$number',U_image ='$name_upload' WHERE uid='$uid' ";
        if (mysqli_query($con, $sql)) {
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your have successfully updated account details.',
                    showConfirmButton: true,
                }).then(function () {
                    window.location = "index.php?success";
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
                    title: 'Unsuccessful profile update',
                    showConfirmButton: true
                }).then(function () {
                    window.location = "settings.php";
                }
                )
            </script>
            <?php
        }
    }

    ?>

    <!-- to update the password of the user  -->

    <?php
    if (isset($_POST['save'])) {
        // include 'user_data.php';
// $row = mysqli_fetch_assoc($result_user);
        if (password_verify($_POST['cpass'], $_SESSION['password'])) {
            if ($_POST['newpass1'] === $_POST['newpass2']) {
                $uid = $_SESSION['id'];
                $newpass = $_POST['newpass1'];
                $password = password_hash($newpass, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET U_password ='$password' WHERE uid='$uid' ";
                if (mysqli_query($con, $sql)) {
                    ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your have successfully updated your password.',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            window.location = "signout.php?success";
                        }
                        )
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Password update unsuccessful.',
                            showConfirmButton: false,
                            timer: 2500
                        }).then(function () {
                            window.location = "index.php?failed";
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
                        title: 'New password doesnot match.',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        window.location = "settings.php?failed";
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
                    title: 'Old password error',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    window.location = "settings.php?failed";
                }
                )
            </script>
            <?php
        }
    }

    ?>
    <!-- to delete the account -->
    <?php
    include 'user_data.php';
    if (isset($_POST['delete'])) {
        if (password_verify($_POST['pass'], $_SESSION['password'])) {
            $uid = $_SESSION['id'];
            $sql = "UPDATE `user` SET active_status ='Deleted' WHERE uid='$uid';";
            if (mysqli_query($con, $sql)) {
                ?>
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Account deleted successfully.',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        window.location = "index.php";
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
                        title: 'Account deletion unsuccessful.',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function () {
                        window.location = "settings.php";
                    }
                    )
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Incorrect Password',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    window.location = "settings.php";
                }
                )
            </script>
            <?php
        }
    }
    ?>


    <div class="w-screen h-screen">
        <div class="w-full h-20">
            <?php
            include "nav.php"
                ?>
        </div>
        <div class="flex flex-row w-5/6 lg:mx-32 mx-10 lg:h-full h-3/4 fixed">
            <div
                class="h-[10rem] lg:h-5/6 bg-gray-300 p-4 lg:p-0 md:p-2 w-full md:w-2/3 mt-16 lg:mt-0 md:mt-0 rounded-lg">
                <div class=" w-full h-full overflow-y-scroll overflow-x-hidden ">
                    <div class="sm:p-4">
                        <!-- personal information update starts -->
                        <div class="justify between lg:grid lg:grid-cols-2">
                            <div class="lg:mt-72">
                                <h1
                                    class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                                    Personal Information
                                </h1>
                                <h1
                                    class="text-sm text-center font-small leading-tight tracking-tight text-gray-900 md:text-2xl">
                                    Use a permanent address where you can receive mail.
                                </h1>
                            </div>
                            <div class=" mt-5 bg-white p-2 rounded-lg">
                                <div class="flex justify-center"><img class="rounded-md w-36 h-36 " src="../imgs/<?php
                                echo $_SESSION['image'];
                                ?>" alt="Extra large avatar"></div>
                                <form class="px-2 py-5 md:px-10 m-4 rounded-lg" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                        role="alert">
                                        <span class="font-medium">Alert!</span> The changes will be effection only after
                                        restrating the
                                        session
                                    </div>
                                    <div class="mb-6">
                                        <label for="Name" class="block mb-2 text-sm font-medium text-gray-900">Full
                                            Name</label>
                                        <input type="text" id="Name" name="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5"
                                            placeholder="<?php
                                            echo $_SESSION['Name'];
                                            ?>" required>
                                    </div>
                                    <div class="mb-6">
                                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone
                                            number</label>
                                        <input type="tel" id="phone"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5"
                                            name="number" placeholder="<?php
                                            echo $_SESSION['number'];
                                            ?>" required>
                                    </div>
                                    <div class="my-2"><label class="block mb-2 text-sm font-medium text-gray-900"
                                            for="file_input">Update
                                            Picture</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 "
                                            aria-describedby="file_input_help" name="file" id="file_input" type="file">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                            SVG, PNG, JPG or
                                            GIF
                                            (MAX.
                                            800x400px).</p>
                                    </div>
                                    <button type="submit" name="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>
                                </form>
                            </div>
                        </div>
                        <!-- personal information update ends -->
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5" bis_skin_checked="1">

                        </div>



                        <!-- change password starts -->
                        <div class="justify between lg:grid lg:grid-cols-2">
                            <div class="lg:mt-56">
                                <h1
                                    class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                                    Change Password
                                </h1>
                                <h1
                                    class="text-sm text-center font-small leading-tight tracking-tight text-gray-900 md:text-2xl">
                                    Update your password associated with your account.
                                </h1>
                            </div>
                            <div class="justify-center mt-5 bg-white p-5 rounded-lg">
                                <form class="px-5 py-5 m-4 rounded-lg" method="POST">
                                    <div class="justify-items-center ">
                                        <div class="mb-6">
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current
                                                Password</label>
                                            <input type="password" id="password" name="cpass"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="•••••••••" required>
                                        </div>
                                        <div class="mb-6">
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                                Password</label>
                                            <input type="password" id="password" name="newpass1"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="•••••••••" required>
                                        </div>

                                        <div class="mb-6">
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                                Password</label>
                                            <input type="password" id="password" name="newpass2"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="•••••••••" required>
                                        </div>
                                    </div>
                                    <button type="submit" name="save"
                                        class="text-white bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Save</button>
                                </form>
                            </div>
                        </div>
                        <div>
                            <!-- change password ends -->




                            <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5"
                                bis_skin_checked="1">

                            </div>

                            <!-- delete account starts -->
                            <div class="justify between lg:grid lg:grid-cols-2">
                                <div class="lg:mt-8">
                                    <h1
                                        class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                                        Delete your account
                                    </h1>
                                    <h1
                                        class="text-sm text-center font-small leading-tight tracking-tight text-gray-900 md:text-2xl">
                                        No longer want to use our service? You can delete your account here. This action
                                        is not
                                        reversible. All information related to this account will be deleted permanently.
                                    </h1>
                                </div>
                                <form class="px-10 py-5 bg-white rounded-lg" method="POST">
                                    <div class="justify-items-center ">
                                        <div class="mb-6">
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                                your
                                                Password</label>
                                            <input type="password" id="password" name="pass"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                placeholder="•••••••••" required>
                                        </div>
                                    </div>
                                    <div class="justify-center bg-white rounded-lg">
                                        <button type="submit" name="delete"
                                            class="text-white bg-red-500 hover:bg-red-800  font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center lg:ml-44 ">Delete
                                            account</button>
                                    </div>
                                </form>

                            </div>
                            <div>
                                <!-- delete account starts -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

</body>

<script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js">
</script>

</html>