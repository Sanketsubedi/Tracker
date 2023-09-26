<?php
require('connection.php');
session_start();
?>
<?php
if (isset($_SESSION['logged_in'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tracker</title>
        <link rel="shortcut icon" type="image/x-icon" href="../imgs/icon.png" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    </head>

    <body>
        <div class="w-screen h-screen fixed">
            <div class="w-full h-full">
                <?php
                include "nav.php";
                ?>
                <?php
                include 'user_data.php';
                if (isset($_GET['I_id'])) {
                    $id = $_GET['I_id'];
                    $inner_sql = "SELECT * FROM `item` INNER JOIN `user` ON item.U_id = user.uid WHERE status='Approved' AND I_id = $id ;";
                    $inner_result = mysqli_query($con, $inner_sql);
                    while ($inner_row = mysqli_fetch_assoc($inner_result)) {
                        ?>
                        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto my-16 md:my-24 lg:py-0">
                            <div
                                class="flex justify-center w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex flex-col items-center p-10">
                                    <img class="w-32 h-32 mb-3 rounded-full shadow-lg" src="../imgs/<?php
                                    if ($inner_row['U_image'] == null) {
                                        echo "default.png";
                                    } else {
                                        echo $inner_row['U_image'];
                                    }
                                    ?>" />

                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                        <?php
                                        echo "Username: " . $inner_row['U_name'];
                                        ?>
                                    </h5>
                                    <span class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                                        <?php
                                        echo "Contact No: " . $inner_row['U_number'];
                                        ?>
                                    </span>

                                    <p class="text-justify my-3 text-gray-500 dark:text-gray-400">
                                        To retrieve your lost item, just dial the provided phone number. The individual who
                                        discovered your item is ready to help you reconnect and reclaim with your possession.
                                        <span class="font-bold text-red-500">Why wait?</span><br> <span class="my-2">Call now
                                        to retrieve what you've lost.</span>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </body>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js">
    </script>

    </html>
    <?php
} else {
    include 'nav_nosession.php';
}