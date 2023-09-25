<?php
require('connection.php');
session_start();
?>
<?php
// time wala func jata jata use vaxa teta teta default timezone set garna parxa 
date_default_timezone_set('Asia/Kathmandu');
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
                include "feed.php";
                ?>
            </div>

            <!-- body vitra fotter kina xa? -->

        </div>
    </body>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js">
    </script>

    </html>
    <?php
} else {
    include 'nav_nosession.php';
}