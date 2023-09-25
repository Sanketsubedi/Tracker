<?php
session_start();
?>
<?php
include('tracker_config.php');
include('admin_connection.php');
include '../user_panel/sweetjs.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tracker | Admin Sign-In</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" type="image/x-icon" href="../imgs/icon.png" />
</head>

<body>
<?php
$login = true;
if (isset($_POST['submit'])) {
  //   echo "<pre>";
//   print_r($_POST);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['pass']);
  $sql = mysqli_query($conn, "select * from admin where A_mail='$email' && passwords='$password'");
  $num = mysqli_num_rows($sql);
  if ($num > 0) {
    /*echo "login";*/
    $row = mysqli_fetch_assoc($sql);
    $_SESSION['USER_ID'] = $row['A_id'];
    $_SESSION['USER_MAIL'] = $row['A_mail'];
    $_SESSION['USER_NAME'] = $row['A_name'];
    $_SESSION['USER_IMG'] = $row['A_image'];
    $_SESSION['USER_ROLE'] = $row['Role'];
    // header("location:index.php"); 
    ?>
    <script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Logging in.',
        showConfirmButton: false,
        timer: 1500
      }).then(function () {
        window.location = "index.php";
      }
      )
    </script>
    <?php
  } else {
    $login = false;
    ?>
    <script>
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Login Failed.',
        confirmButtonText: 'Try Again',
        confirmButtonColor:'#EF4444',
        showConfirmButton: true
      }).then(function () {
        window.location = "admin_login.php";
      }
      )
    </script>
    <?php
  }
}

?>
  <div class="main w-screen h-screen bg-cyan-500 flex justify-center items-center">
    <div
      class="container flex flex-col  2xl:w-2/4  md:w-3/4 bg-white drop-shadow-xl rounded-md items-center justify-center p-5">

      <div class="container flex flex-col items-center justify-center">
        <img src="../user_panel/1.png" alt="" srcset="" class="w-1/4 my-3">
        <p class="font-bold my-5 text-2xl md:text-4xl 2xl:text-4xl">Welcome Back!</p>
      </div>
      <form method="POST" class="flex flex-col">
        <input type="email" name="email" class="border md:w-[30rem] w-96 rounded-xl p-4 my-4 border-slate-600"
          value="<?php ?>" placeholder="Enter Email Address." />
        <input type="password" name="pass" class="border w-96 md:w-[30rem] rounded-xl p-4 my-4 border-slate-600"
          placeholder="Enter Password." />
        <input type="submit" name="submit"
          class=" cursor-pointer bg-blue-600 p-3 w-96 md:w-[30rem] my-4 text-white text-md rounded-xl hover:bg-blue-800"
          value="Login" />
      </form>
    </div>
  </div>
  </div>
  <?php
  include 'admin_fotter.php';
  ?>