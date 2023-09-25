<?php
session_start();
if (!isset($_SESSION['USER_ID'])) {
	header("location:admin_login.php");
	die();
}
?>
<?php
include 'admin_header.php';
include  'admin_connection.php';
include 'tracker_config.php';
?>
    <div class="p-4 sm:ml-64">
      <div class=" mt-14">
    <!-- Listings Starts -->
    <span class="font-bold text-blue-500">Listings</span>
        <?php 
        include_once 'item_data.php';
        while($row = mysqli_fetch_assoc($result)){
        if($row['status']==='Declined'){
        ?>
        <!-- Listing no 1 starts -->
        <div class="flex p-5 my-3 rounded bg-[#111827] flex-col ">
          <div class="container text-white flex flex-col 
         space-y-5 ">
            <div class="row-1 flex flex-col 2xl:flex-row w-full space-y-5 2xl:space-y-0 2xl:space-x-20 ">
              <div class="image flex justify-center">
              <img src="../imgs/<?php
              if($row['I_image']==null){
                echo "default.png";
              }
              else{
                echo $row['I_image'];
              }
              ?>" width="400" alt="" srcset=""  class=" rounded">
              </div>
              <div class=" flex flex-col  2xl:w-3/4">
                <div class="r1 text-white flex justify-end mb-2">
                <span class=" text-xs font-medium mr-2 px-2.5 py-0.5 rounded 
                <?php if($row['status']==='Approved'){
                echo" bg-green-900 text-green-300";
            }
                elseif($row['status']==='Declined'){
                    echo" bg-red-900 text-red-300";
                }
                else{
                    echo" bg-yellow-900 text-yellow-300";
                }
                ?>
                "><?php
                      echo $row['status'];
                    ?></span>
                  </div>
                <div class="r1 text-white flex justify-between">
                  <span class="Category"><?php
                  include 'category_data.php';
                            while($row_cate = mysqli_fetch_assoc($result_cate)){
                                if($row_cate['C_id']=== $row['C_id']){
                                    echo $row_cate['C_name'];
                                }
                            }?></span>
                  <span>
                  <?php include 'time_counter.php';  ?>
                  </span>
                </div>
                <div class="r2 flex flex-col space-y-2 2xl:my-10 2xl:space-y-5">
                  <h1 class="text-3xl text-white title-font font-medium text-white "><?php
                      echo $row['I_name'];
                    ?></h1>
                  <span><?php
                      echo "Date: " . $row['Date_Found'];
                    ?></span>
                  <span ><?php
                      echo "Location: " . $row['Location'];
                    ?></span>
                </div>
                <hr class="my-2">
                <div class="r3 flex justify-between ">
                  <p><?php
                  include 'user_data.php';
                           while($row_user = mysqli_fetch_assoc($result_user)){
                           if($row_user['uid'] === $row['U_id']){
                            // if(strcmp($row_user['uid'],$row['U_id'])){
                               echo $row_user['U_name'];
                                 }
                            }
                  ?></p>
                  <p><?php
                  include 'user_data.php';
                           while($row_user = mysqli_fetch_assoc($result_user)){
                           if($row_user['uid'] === $row['U_id']){
                            // if(strcmp($row_user['uid'],$row['U_id'])){
                               echo $row_user['U_mail'];
                                 }
                            }
                  ?></p>
                </div>
              </div>
            </div>
            <div class="row-2 <?php 
            if($row['status']==='Approved' || $row['status']==='Declined'){
                echo "hidden";
            } ?>">
              <form class="btn flex flex-col 2xl:flex-row 2xl:space-x-10  ">
                <input type="button" value="Approve" class="p-2 w-full bg-blue-500 cursor-pointer text-white  hover:bg-blue-800 rounded font-semibold my-2">
                <input type="button" value="Decline" class="p-2 w-full bg-red-500 cursor-pointer text-white  hover:bg-red-800 rounded font-semibold my-2">
              </form>
            </div>
          </div>
        </div>
          <?php
  }
    }
  
  ?>
        </div>
        <!-- Listing no 1 closed -->
</div>
</div>
</div>

<?php
include 'admin_fotter.php';
?>