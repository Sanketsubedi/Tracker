<?php
require('connection.php');
session_start();
?>
<?php
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
            <div class="w-full h-5/6">
                <?php
                include "nav.php";
                ?>
                <div class=" fixed w-full lg:w-5/6 h-5/6 lg:pl-20 p-6 overflow-y-scroll overflow-x-hidden">
                    <div class="lg:grid lg:grid-cols-2">
                        <?php
                        $sql = "SELECT * FROM `item`;";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($_SESSION['id'] === $row['U_id']) {
                                ?>
                                <section class="text-gray-600 body-font my-5 mx-4">
                                    <div class="container bg-gray-200 w-5/6 p-4 lg:px-5 lg:py-10 rounded-lg shadow lg:h-full "
                                        bis_skin_checked="1">
                                        <div class="lg:w-4/5 w-full mx-auto lg:flex" bis_skin_checked="1">
                                            <img alt="listing_image" width="350" class=" h-96 object-center rounded" src="../imgs/<?php
                                            if ($row['I_image'] == null) {
                                                echo "default.png";
                                            } else {
                                                echo $row['I_image'];
                                            }
                                            ?>">
                                            <div class="lg:w-1/2 w-5/6 lg:pl-10 lg:py-6 mt-6 lg:mt-0" bis_skin_checked="1">
                                                <div class="flex">
                                                    <h2 class="text-sm title-font text-gray-500 tracking-widest">
                                                        <?php
                                                        include 'category_data.php';
                                                        while ($row_cate = mysqli_fetch_assoc($result_cate)) {
                                                            if ($row_cate['C_id'] === $row['C_id']) {
                                                                echo $row_cate['C_name'];
                                                            }
                                                        }
                                                        ?>
                                                    </h2>
                                                    <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-400 space-x-2s"></span>
                                                    <h2 class="text-sm title-font text-gray-500 tracking-widest">
                                                        <?php
                                                        include '../admin_panel/time_counter.php';
                                                        ?>
                                                    </h2>
                                                </div>
                                                <h1 class="text-gray-900 text-3xl title-font font-medium my-4">
                                                    <?php
                                                    echo $row['I_name'];
                                                    ?>
                                                </h1>
                                                <div class="flex mb-4" bis_skin_checked="1">
                                                </div>
                                                <p class="leading-relaxed">Date Found:
                                                    <?php
                                                    echo $row['Date_Found'];
                                                    ?>
                                                </p>
                                                <p class="leading-relaxed">Location:
                                                    <?php
                                                    echo $row['Location'];
                                                    ?>
                                                </p>
                                                <span
                                                    class="title-font lg:font-medium font:small lg:text-2xl text-xl text-gray-900">
                                                    <span class=" text-xs font-medium mr-2 px-2.5 py-0.5 rounded <?php
                                                    if ($row['status'] === 'Approved') {
                                                        echo " bg-green-500 text-white";
                                                    } elseif ($row['status'] === 'Declined') {
                                                        echo " bg-red-500 text-white";
                                                    } elseif ($row['status'] === 'Pending') {
                                                        echo " bg-yellow-500 text-white";
                                                    } else {
                                                        echo " bg-blue-500 text-white";
                                                    }
                                                    ?>"><?php
                                                    echo $row['status'] ?></span></span>
                                                <p class="my-2 font-semibold text-red-500">
                                                    <?php if ($row['status'] === 'Declined') {
                                                        echo "Post has been Declined Due to " . $row['msg'];
                                                    } else {
                                                        echo "<br>";
                                                    } ?>
                                                </p>
                                                <div class="flex mt-3 items-center  border-b-2 border-gray-300 my-4"
                                                    bis_skin_checked="1">
                                                </div>
                                                <div class="flex " bis_skin_checked="1">
                                                    <p
                                                        class="title-font lg:font-medium font:small lg:text-2xl text-xl text-gray-900 mb-4">
                                                        <?php
                                                        include 'user_data.php';
                                                        while ($row_user = mysqli_fetch_assoc($result_user)) {
                                                            if ($row_user['uid'] === $row['U_id']) {
                                                                echo "Posted By:  " . $row_user['U_name'];
                                                            }
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="r1 text-white flex  mb-2">
                                                    <form method="POST" action="claim_listings.php">
                                                        <input type="hidden" name="id" value="<?php echo $row['I_id']; ?>" />
                                                        <input type="submit" value="<?php
                                                        if ($row['status'] === 'Claimed') {
                                                            echo "Claimed";
                                                        } else {
                                                            echo "Remove";
                                                        }
                                                        ?>" name="Claim" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2  focus:outline-none cursor-pointer 
                                                <?php
                                                if ($row['status'] === 'Claimed') {
                                                    echo "hidden";
                                                } else {
                                                    echo "block";
                                                }
                                                ?>"></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </section>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js">
    </script>

    </html>
    <?php
    if (isset($_POST['Claim'])) {
        $id = $_POST['id'];
        $select = "UPDATE item SET status='Claimed' WHERE I_id ='$id'";
        $result = mysqli_query($con, $select);
        // header("Refresh:0");
    }
?>
<?php
} else {
    include 'nav_nosession.php';
}