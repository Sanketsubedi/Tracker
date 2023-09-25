<?php
require('connection.php');
?>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
    <a href="index.php" class="flex items-center mt-0">
      <img src="1.png" class="h-8 mr-3" alt="" />
    </a>
    <div class="flex items-center md:order-2">
      <a href="post.php" class=" dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800 <?php if (basename($_SERVER['PHP_SELF']) == 'post.php') {
        echo 'text-blue-500';
      } ?>">Post</a>
      <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start"
        class="w-10 h-10 rounded-full cursor-pointer" src="../imgs/<?php echo $_SESSION['image'];
        ?>" alt="User dropdown">

      <!-- Dropdown menu -->
      <div id="userDropdown"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
          <div>
            <?php
            echo $_SESSION['Name'];
            ?>

          </div>
          <div class="font-medium truncate">
            <?php
            echo $_SESSION['email'];
            ?>

          </div>
        </div>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
          <li>
            <a href="settings.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white <?php if (basename($_SERVER['PHP_SELF']) == 'settings.php') {
              echo 'text-blue-500';
            } ?>">Settings</a>
          </li>
          <li>
            <a href="my_listings.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white <?php if (basename($_SERVER['PHP_SELF']) == 'my_listings.php') {
              echo 'text-blue-500';
            } ?>">Listings</a>
          </li>
        </ul>
        <div class="py-1">
          <a href="signout.php"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
            out</a>
        </div>
      </div>
      <button data-collapse-toggle="mega-menu" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden md:hidden hover:bg-gray-100 "
        aria-controls="mega-menu" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div id="mega-menu" class="items-center justify-between hidden w-full lg:flex md:flex lg:w-auto lg:order-1">
      <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-2 lg:space-x-8 md:mt-0">
        <li class="mt-4">
          <a href="userbase.php" class="block py-2 pl-3 pr-4 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-blue-500 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 <?php if (basename($_SERVER['PHP_SELF']) == 'userbase.php') {
            echo 'text-blue-500';
          } ?>" aria-current="page">Home</a>
        </li>


        <li class="mt-4">
          <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown"
            class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
            Categories<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <div id="mega-menu-dropdown"
            class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md md:grid-cols-3">
            <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
              <ul class="space-y-4" aria-labelledby="mega-menu-dropdown-button">
                <li>
                  <a href="cate_electronics.php" class=" dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 <?php if (basename($_SERVER['PHP_SELF']) == 'cate_electronics.php') {
                    echo 'text-blue-500';
                  } ?>">
                    Electronics
                  </a>
                </li>
                <li>
                  <a href="cate_pets.php" class=" dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 <?php if (basename($_SERVER['PHP_SELF']) == 'cate_pets.php') {
                    echo 'text-blue-500';
                  } ?> ">
                    Pets
                  </a>
                </li>
                <li>
                  <a href="cate_documents.php" class=" dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 <?php if (basename($_SERVER['PHP_SELF']) == 'cate_documents.php') {
                    echo 'text-blue-500';
                  } ?> ">
                    Documents
                  </a>
                </li>
                <li>
                  <a href="cate_miscellanious.php" class=" dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 <?php if (basename($_SERVER['PHP_SELF']) == 'cate_miscellanious.php') {
                    echo 'text-blue-500';
                  } ?>">
                    Miscellanious
                  </a>
                </li>
              </ul>
            </div>

        </li>
        <li class="mt-4">
          <a href="contactus.php" class="block py-2 pl-3 pr-4  border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 <?php if (basename($_SERVER['PHP_SELF']) === 'contactus.php') {
            echo 'text-blue-500';
          } ?>">Contact
            Us</a>
        </li>
        <li>

          <form method="post" action="feed_search.php?search">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
              </div>
              <input type="search" id="default-search" name="search"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search Items." required>
              <button type="submit" name="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
          </form>

        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
// if(isset($_POST["submit"])){
//   $str = $_POST["search"];
//   $sth = $con->prepare("SELECT * from item where I_name = 'dog' ");

//   $sth->setFetchMode(PDO:: FETCH_OBJ);
//   $sth->execute();

//   if($row = $sth->fetch()){{
//     include "feed.php";
//   }}
// }
?>