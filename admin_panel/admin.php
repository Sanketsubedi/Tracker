<?php
session_start();
if (!isset($_SESSION['USER_ID'])) {
  header("location:admin_login.php");
  die();
}
?>
<?php
include 'tracker_config.php';
?>
<?php
include 'admin_header.php';
include 'admin_connection.php';
?>
<!-- 1st Section Information Starts -->
<div class="p-4 sm:ml-64  ">
  <div class="p-4 mt-14">
    <div class="grid grid-cols-3 gap-4 mb-4">
      <div class="flex flex-col 2xl:flex-row items-center justify-center h-24 rounded bg-[#111827] 2xl:space-x-10 ">
        <img src="../imgs/admin-logo-container.png" alt="" class="h-12 hidden 2xl:block" />
        <p class="text-center text-white text-md font-semibold">Total Admins</p>
        <p class="font-bold text-xl text-white ">
          <?php
          include_once 'admin_data.php';
          echo $num;
          ?>

        </p>
      </div>
      <div class="flex items-center justify-center h-24 rounded bg-[#111827]">
        <div class="flex flex-col 2xl:flex-row items-center justify-center h-24 rounded bg-[#111827] 2xl:space-x-10 ">
          <img src="../imgs/list.png" alt="" class="h-8 hidden 2xl:block" />
          <p class="text-center text-white text-md font-semibold">Total Listings</p>
          <p class="font-bold text-xl text-white ">
            <?php
            include_once 'item_data.php';
            echo $num;
            ?>
          </p>
        </div>
      </div>
      <div class="flex items-center justify-center h-24 rounded bg-[#111827]">
        <div class="flex flex-col 2xl:flex-row items-center justify-center h-24 rounded bg-[#111827] 2xl:space-x-10 ">
          <img src="../imgs/user_container.png" alt="" class="h-10 hidden 2xl:block" />
          <p class="text-center text-white text-md font-semibold">Total Users</p>
          <p class="font-bold text-xl text-white ">
            <?php
            include_once 'user_data.php';
            echo $num_user;
            ?>
          </p>
        </div>
      </div>
    </div>
    <!-- 1st Section Information Ends -->
    <!-- additins  -->
    <div class="flex p-5 my-3 rounded bg-[#111827] flex-col md:flex-row ">
      <div class="container text-white 
         space-y-5 ">
        <div class="chartBox text-white p-[20px] md:w-[30vw]">
          <canvas id="myChart"></canvas>
        </div>
      </div>
      <div class="container  lg:w-[60vw] rounded-xl text-white p-2 lg:p-9">
        <h1 class="font-bold text-l mb-5  ">Points to Remember when Approving Or Declining a Post</h1>
        <hr class="mb-5">
        <ul style="list-style-type: square;" class="text-md font-semibold space-y-6">
          <li>Genuiueness: Posts must look somewhat genuiune.</li>
          <li>No Offensive Language: Posts should not contain offensive language.</li>
          <li>Multiple Posts: Same post mustn't be repeated.</li>
          <li>Genuiueness: Posts must look somewhat genuiune.</li>
          <li>No Offensive Language: Posts should not contain offensive language.</li>
          <li>Multiple Posts: Same post mustn't be repeated.</li>
        </ul>
      </div>
    </div>
    <!-- ends  -->
    <!-- Listings Starts -->
    <span class="font-bold text-blue-500">Listings</span>
    <?php
    $sql = "SELECT * FROM `item` WHERE status='Pending' ORDER BY I_id;";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
      ?>

      <!-- Listing no 1 starts -->
      <div class="flex p-5 my-3 rounded bg-[#111827] flex-col ">
        <div class="container text-white flex flex-col 
         space-y-5 ">
          <div class="row-1 flex flex-col 2xl:flex-row w-full space-y-5 2xl:space-y-0 2xl:space-x-20 ">
            <div class="image flex justify-center">
              <img src="../imgs/<?php
              if ($row['I_image'] == null) {
                echo "default.png";
              } else {
                echo $row['I_image'];
              }
              ?>" width="400" alt="" srcset="" class=" rounded">
            </div>
            <div class=" flex flex-col  2xl:w-3/4">
              <div class="r1 text-white flex justify-end mb-2">
                <span class=" text-xs font-medium mr-2 px-2.5 py-0.5 rounded 
                <?php
                if ($row['status'] === 'Approved') {
                  echo " bg-green-900 text-green-300";
                } elseif ($row['status'] === 'Declined') {
                  echo " bg-red-900 text-red-300";
                } else {
                  echo " bg-yellow-900 text-yellow-300";
                }
                ?>
                "><?php
                echo $row['status'];
                ?></span>
              </div>
              <div class="r1 text-white flex justify-between">
                <span class="Category">
                  <?php
                  include 'category_data.php';
                  while ($row_cate = mysqli_fetch_assoc($result_cate)) {
                    if ($row_cate['C_id'] === $row['C_id']) {
                      echo $row_cate['C_name'];
                    }
                  } ?>
                </span>
                <span>
                  <?php include 'time_counter.php'; ?>
                </span>
              </div>
              <div class="r2 flex flex-col space-y-2 2xl:my-10 2xl:space-y-5">
                <h1 class="text-3xl text-white title-font font-medium text-white ">
                  <?php
                  echo $row['I_name'];
                  ?>
                </h1>
                <span>
                  <?php
                  echo "Date: " . $row['Date_Found'];
                  ?>
                </span>
                <span>
                  <?php
                  echo "Location: " . $row['Location'];
                  ?>
                </span>
              </div>
              <hr class="my-2">
              <div class="r3 flex justify-between ">
                <p>
                  <?php
                  include 'user_data.php';
                  while ($row_user = mysqli_fetch_assoc($result_user)) {
                    if ($row_user['uid'] === $row['U_id']) {
                      echo $row_user['U_name'];
                    }
                  }
                  ?>
                </p>
                <p>
                  <?php
                  include 'user_data.php';
                  while ($row_user = mysqli_fetch_assoc($result_user)) {
                    if ($row_user['uid'] === $row['U_id']) {
                      echo $row_user['U_mail'];
                    }
                  }
                  ?>
                </p>
              </div>
            </div>
          </div>
          <div class="row-2 btn see flex flex-wrap w-full">
            <form method="POST" enctype="multipart/form-data"
              class="btn w-1/2 flex flex-col 2xl:flex-row 2xl:space-x-10  ">
              <input type="hidden" name="id" value="<?php echo $row['I_id'];
              ?>" />
              <input name="approve" type="submit" value="Approve"
                class="p-2 w-full bg-blue-500 cursor-pointer text-white  hover:bg-blue-800 rounded font-semibold my-2">
            </form>
            <form method="POST" enctype="multipart/form-data"
              class="btn w-1/2 flex flex-col 2xl:flex-row 2xl:space-x-10  ">
              <input type="hidden" name="id" value="<?php echo $row['I_id'];
              ?>" />
              <input name="decline" type="submit" value="Decline" data-modal-target="authentication-modal"
                data-modal-toggle="authentication-modal"
                class="p-2 w-full bg-red-500 cursor-pointer text-white  hover:bg-red-800 rounded font-semibold my-2">

              <!-- starts  -->
              <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                      class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                      data-modal-hide="authentication-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                      <h3 class="mb-4 text-xl font-medium  text-white ">Decline this post request</h3>
                      <!-- <form class="space-y-6" enctype="multipart/form-data"> -->
                      <div>
                        <label for="text"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Explanations*</label>
                        <input type="text" name="text" id="text"
                          class="  bg-gray-50  border border-gray-300 text-gray-900 text-m rounded-lg focus:ring-red-500 focus:border-red-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-10"
                          placeholder="Why this request was rejected?" required>
                      </div>
                      <input type="submit"
                        class="w-full cursor-pointer	text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        value="Confirm" name="Confirm">
            </form>
          </div>
        </div>
      </div>
    </div>
    </form>
    <div class="flex w-full justify-center items-center my-2">
      <p class="text-blue-500 hover:text-blue-800 font-bold "><a href="admin_listing.php"> See More > </a>
    </div>
  </div>
  </div>
  </div>
  <!-- Listing no 1 closed -->
  <?php
    }
    ?>
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
<?php
include 'item_data.php';
$approved = "";
$declined = "";
$pending = "";
while ($row_item = mysqli_fetch_assoc($result)) {
  $test = $row_item['status'];
  if ($test == 'Declined') {
    $declined++;
  } elseif ($test == 'Approved') {
    $approved++;
  } else {
    $pending++;
  }
}
?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script>if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  // setup 
  const data = {
    labels: [
      'Declined',
      'Approved',
      'Pending'
    ],
    datasets: [{
      label: 'Total:',
      data: [<?= $declined ?>, <?= $approved ?>, <?= $pending ?>],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 5
    }],

  };
  // config of chart.js
  const config = {
    type: 'doughnut',
    data: data,
  };
  // render init block
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
  // Instantly assign Chart.js version
  const chartVersion = document.getElementById('chartVersion');
  chartVersion.innerText = Chart.version;
</script>


<?php
include 'admin_fotter.php';
?>