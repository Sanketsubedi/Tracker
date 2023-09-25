<div class=" fixed w-full lg:w-5/6 h-5/6 lg:pl-20 p-6 overflow-y-scroll overflow-x-hidden">
    <div class="lg:grid lg:grid-cols-2 ">
        <?php
        $sql = "SELECT * FROM `item` WHERE status='Approved' ORDER BY I_id;";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <section class="text-gray-600 body-font my-5 mx-4">
                <div class="container bg-gray-200 w-5/6 p-4 lg:px-5 lg:py-10 rounded-lg shadow lg:h-full "
                    bis_skin_checked="1">
                    <div class="lg:w-4/5 w-full mx-auto lg:flex" bis_skin_checked="1">
                        <img alt="listing_image" width="350" height="350" class=" h-96 object-center rounded" src="../imgs/<?php
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
                            <div class="flex mt-3 items-center pb-5 border-b-2 border-gray-300 mb-6" bis_skin_checked="1">
                            </div>
                            <div class="flex" bis_skin_checked="1">
                                <p class="title-font lg:font-medium font:small lg:text-2xl text-xl text-gray-900">
                                    Posted By: &nbsp;
                                </p>
                                <p class="title-font lg:font-medium font:small lg:text-2xl text-xl text-gray-900">
                                    <?php
                                    include 'user_data.php';
                                    while ($row_user = mysqli_fetch_assoc($result_user)) {
                                        if ($row_user['uid'] === $row['U_id']) {
                                            echo $row_user['U_name'];
                                        }
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="flex mt-3 items-center pb-5 border-b-2 border-gray-300 mb-6" bis_skin_checked="1">
                            </div>
                            <p>
                                <?php
                                // echo implode(" ",$row); ?>
                            </p>
                            <form method="GET" action="claim.php">
                                <input type="hidden" name="I_id" value="<?php echo $row['I_id']; ?>" />
                                <button name="claim" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="flex text-white bg-indigo-500 border-0 py-2 px-6 hover:bg-indigo-600 rounded h-10">Claim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
        ?>

    </div>
</div>