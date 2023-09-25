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
        if($row['status']==='Pending'){
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
              ?>" width="350" alt="" srcset=""  class=" rounded">
              </div>
              <div class=" flex flex-col  2xl:w-3/4">
                <div class="r1 text-white flex justify-end mb-2">
                <span class=" text-xs font-medium mr-2 px-2.5 py-0.5 rounded 
                <?php 
                if($row['status']==='Approved'){
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
            <div class="row-2 flex w-full space-x-10<?php 
            if($row['status']==='Approved' || $row['status']==='Declined'){
                echo "hidden";
            } ?>">
            <form method="POST" enctype="multipart/form-data" class="w-1/2">
              <input type="hidden" name="id" value="<?php  echo $row['I_id'];
              ?>"/>
                <input name="approve" type="submit" value="Approve" class="p-2 w-full bg-blue-500 cursor-pointer text-white  hover:bg-blue-800 rounded font-semibold my-2">
          </form>
          <form method="POST"  class="w-1/2">
          <input type="hidden" name="id" value="<?php  echo $row['I_id'];
              ?>"/>
                <input type="submit" value="Decline" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="p-2 w-full bg-red-500 cursor-pointer text-white  hover:bg-red-800 rounded font-semibold my-2">
     <!-- starts  -->
       <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium  text-white ">Decline this post request</h3>
                <!-- <form method="POST" class="space-y-6" enctype="multipart/form-data"> -->
                    <div>
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Explanations*</label>
                        <input type="text" name="text" id="text" class="  bg-gray-50  border border-gray-300 text-gray-900 text-m rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-10" placeholder="Why this request was rejected?" required>
                    </div>
                    <input type="submit" class="w-full cursor-pointer	 text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" value="Confirm" name="Confirm">
                </form>
            </div>
        </div>
    </div>
</div> 
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
include 'item_data.php';
$mngby = $_SESSION['USER_ID'];
if (isset($_POST['approve'])) {
  $id = $_POST['id'];
  $select = "UPDATE item SET status='Approved',Managed_By='$mngby' WHERE I_id ='$id'";
  $result = mysqli_query($conn, $select);
  ?>
  <script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Approved',
      showConfirmButton: false,
      timer: 1500
    }).then(function () {
      window.location = "index.php";
    }
    )
  </script>
  <?php
}
if (isset($_POST['Confirm'])) {
  $id = $_POST['id'];
  $msg = $_POST['text'];
  $select = "UPDATE item SET status='Declined', msg='$msg',Managed_By='$mngby' WHERE I_id ='$id'";
  $result = mysqli_query($conn, $select);
  ?>
  <script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Declined.',
      showConfirmButton: false,
      timer: 1500
    }).then(function () {
      window.location = "index.php";
    }
    )
  </script>
  <?php
}
?>
<script>if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php
include 'admin_fotter.php';
?>
