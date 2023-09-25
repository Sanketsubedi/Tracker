<?php
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post | Tracker</title>
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
            ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your have posted this successfully',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    window.location = "userbase.php?success";
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
                    title: 'Your post havr failed',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function () {
                    window.location = "userbase.php?Failed";
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
            include "nav.php";
            ?>
            <section class=" py-5 h-screen md:py-10 lg:my-10 ">
                <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0">
                    <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0  border-gray-300">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center">
                                Post your item
                            </h1>

                            <form method="POST" enctype="multipart/form-data">
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <div class="relative">
                                            <input type="text" name="name" id="floating_outlined"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none peer"
                                                placeholder=" " required />
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Name
                                                of Item</label>
                                        </div>

                                    </div>
                                    <div>
                                        <div class="relative">
                                            <input type="text" id="floating_outlined" name="location"
                                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none peer"
                                                placeholder=" " required />
                                            <label for="floating_outlined"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Location</label>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div>
                                            <button id="dropdownHelperRadioButton"
                                                data-dropdown-toggle="dropdownHelperRadio"
                                                class="text-gray-900 hover:bg-gray-200 font-small rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                                                type="button">Category <svg class="w-2.5 h-2.5 ml-2.5"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg></button>

                                            <!-- Dropdown menu -->
                                            <div id="dropdownHelperRadio"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600"
                                                data-popper-reference-hidden="" data-popper-escaped=""
                                                data-popper-placement="top"
                                                style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 6119.5px, 0px);">
                                                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownHelperRadioButton">
                                                    <li>
                                                        <div
                                                            class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            <div class="flex items-center h-5">
                                                                <input id="helper-radio-4" name="helper-radio"
                                                                    type="radio" value="Electronics"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                                            </div>
                                                            <div class="ml-2 text-sm">
                                                                <label for="helper-radio-4"
                                                                    class="font-medium text-gray-900 dark:text-gray-300">
                                                                    <div>Electronics</div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            <div class="flex items-center h-5">
                                                                <input id="helper-radio-4" name="helper-radio"
                                                                    type="radio" value="Pets"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                                            </div>
                                                            <div class="ml-2 text-sm">
                                                                <label for="helper-radio-4"
                                                                    class="font-medium text-gray-900 dark:text-gray-300">
                                                                    <div>Pets</div>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            <div class="flex items-center h-5">
                                                                <input id="helper-radio-4" name="helper-radio"
                                                                    type="radio" value="Documents"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                                            </div>
                                                            <div class="ml-2 text-sm">
                                                                <label for="helper-radio-4"
                                                                    class="font-medium text-gray-900 dark:text-gray-300">
                                                                    <div>Documents</div>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div
                                                            class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            <div class="flex items-center h-5">
                                                                <input id="helper-radio-4" name="helper-radio"
                                                                    type="radio" value="Miscellanious"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                                                            </div>
                                                            <div class="ml-2 text-sm">
                                                                <label for="helper-radio-4"
                                                                    class="font-medium text-gray-900 dark:text-gray-300">
                                                                    <div>Miscellanious</div>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-format="yyyy/mm/dd" datepicker-buttons type="text"
                                            name="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  "
                                            placeholder="Select date" required>
                                    </div>
                                </div>


                                <p class="block mb-2 text-sm font-medium text-gray-900">Insert the picture below.
                                </p>
                                <div class="flex flex-col  w-full">
                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none"
                                        aria-describedby="file_input_help" id="file_input" type="file" name="file"
                                        required>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                                        PNG,
                                        JPG or
                                        JPEG (MAX.800x400px). </p>
                                </div>
                                <div class="flex items-start my-6">
                                    <div class="flex items-center h-5">
                                        <input id="remember" type="checkbox" value=""
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 " required>
                                    </div>
                                    <label for="remember"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I
                                        agree with the <a href="terms_and_conditions.php"
                                            class="text-blue-600 hover:underline dark:text-blue-500">Terms and
                                            conditions</a>.</label>
                                </div>
                                <button name="submit" type="submit" data-modal-target="popup-modal"
                                    data-modal-toggle="popup-modal"
                                    class="w-full text-white bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="w-full h-1/6 mt-14">
            <?php
            include "footer.php";
            ?>
        </div>
    </div>


</body>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>


</html>