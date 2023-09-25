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
    <div class="pt-4 px-2 sm:ml-64">
      <div class="mt-14">
        
<div class="relative overflow-x-auto ">
    <table class="w-full text-sm text-left gray-400">
        <thead class="text-xs  uppercase text-gray-400 bg-[#111827]">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Mail
                </th>
                <th scope="col" class="px-6 py-3 hidden md:block ">
                    Phone number
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        include 'admin_data.php';
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr class="bg-[#1d2942] text-white">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $row['A_name']; ?>
                </th>
                <td class="px-6 py-4">
                <?php echo $row['A_mail']; ?>
                </td>
                <td class="px-6 py-4 hidden md:block ">
                <?php echo $row['phone_no']; ?>
                </td>
                <td class="px-6 py-4 <?php if($row['Role']==0){
                    echo "text-red-500";
                }
                    else if($row['Role']==1){
                        echo "text-green-500";
                    }
                    else{
                        echo"text-blue-500";
                    }
                 ?>">
                <?php if($row['Role']==0){
                    echo "Admin";
                }
                    else if($row['Role']==1){
                        echo "Moderator";
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
