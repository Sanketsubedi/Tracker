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
        
<div class="relative overflow-x-auto ">
    <table class="w-full text-sm text-left gray-400">
        <thead class="text-xs  uppercase text-gray-400 bg-[#111827]">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    User's mail
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone number
                </th>
                <th scope="col" class="px-6 py-3 hidden md:block ">
                    Verification Status
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        include 'user_data.php';
        while($row_user = mysqli_fetch_assoc($result_user)){
            ?>
            <tr class="bg-[#1d2942] text-white">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $row_user['U_name']; ?>
                </th>
                <td class="px-6 py-4">
                <?php echo $row_user['U_mail']; ?>
                </td>
                <td class="px-6 py-4">
                <?php echo $row_user['U_number']; ?>
                </td>
                <td class="px-6 py-4 hidden md:block <?php if($row_user['is_verified']==0){
                    echo "text-red-500";
                }
                    else if($row_user['is_verified']==1){
                        echo "text-green-500";
                    }
                    else{
                        echo"text-blue-500";
                    }
                 ?>">
                <?php if($row_user['is_verified']==0){
                    echo "Unverified";
                }
                    else if($row_user['is_verified']==1){
                        echo "Verified";
                    }
                    else{
                        echo"Error Found";
                    }
                 ?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

        </div>
    </div>

<?php
include 'admin_fotter.php';
?>
