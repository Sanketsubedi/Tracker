<?php
date_default_timezone_set('Asia/Kathmandu');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- sweetjs  -->

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.28/dist/sweetalert2.min.css">

  <link rel="shortcut icon" type="image/x-icon" href="../imgs/icon.png" />
  <title>OLFS-ADMIN PANEL</title>
</head>

<body>
  <nav class="fixed top-0 z-50 w-full bg-[#111827] border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden focus:outline-none focus:ring-2  text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
              </path>
            </svg>
          </button>
          <a href="admin.php" class="flex ml-2 md:mr-24 items-center">
            <img src="../imgs/logo-admin.png" class="h-5 mr-3" alt="Logo" />
            <span class="self-center text-xl whitespace-nowrap dark:text-white">
              <b>Admin</b> Panel</span>
          </a>
        </div>
        <div class="flex items-center">
          <div class="flex items-center ml-3">
            <div>
              <button type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="../imgs/<?php if ($_SESSION['USER_IMG'] == null) {
                  echo 'default.png';
                } else {
                  echo $_SESSION['USER_IMG'];

                } ?>" alt="user photo" />
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none  divide-y divide-gray-100 rounded shadow bg-[#111827]"
              id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  <?php
                  echo $_SESSION['USER_NAME'];
                  ?>
                </p>
                <p class="text-sm font-medium text-gray-300 truncate" role="none">
                  <?php
                  echo $_SESSION['USER_MAIL'];
                  ?>
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="admin_logout.php" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 text-white"
                    role="menuitem">Sign out</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#111827] border-r border-gray-700 sm:translate-x-0 "
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-[#111827]">
      <ul class="space-y-2 font-medium">
        <li>
          <a href="admin.php"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group <?php if (basename($_SERVER['PHP_SELF']) == 'admin.php') {
              echo 'bg-gray-700';
            } ?>">
            <svg
              class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
              <path
                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
              <path
                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
            </svg>
            <span class="ml-3">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="admin_user.php"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group <?php if (basename($_SERVER['PHP_SELF']) == 'admin_user.php') {
              echo 'bg-gray-700';
            } ?>">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
              <path
                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
          </a>
        </li>
        <li>
          <button type="button"
            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
              <path
                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
            </svg>
            <span class="flex-1 ml-3 text-left whitespace-nowrap">Lisitings</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <ul id="dropdown-example" class="hidden py-2 space-y-2">
            <li>
              <a href="admin_listing_approved.php"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 <?php if (basename($_SERVER['PHP_SELF']) == 'admin_listing_approved.php') {
                  echo 'bg-gray-700';
                } ?>">Approved</a>
            </li>
            <li>
              <a href="admin_listing_declined.php"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 <?php if (basename($_SERVER['PHP_SELF']) == 'admin_listing_declined.php') {
                  echo 'bg-gray-700';
                } ?>">Declined</a>
            </li>
            <li>
              <a href="admin_listing.php"
                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 <?php if (basename($_SERVER['PHP_SELF']) == 'admin_listing.php') {
                  echo 'bg-gray-700';
                } ?>">Pending</a>
            </li>
          </ul>
        </li>
        <li class="<?php
        if ($_SESSION['USER_ROLE'] == 1)
          echo "visible";
        else
          echo "hidden";
        ?>">
          <a href="admin_admin.php"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group <?php if (basename($_SERVER['PHP_SELF']) == 'admin_admin.php') {
              echo 'bg-gray-700';
            } ?> ">
            <svg xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="administrator" fill="currentColor">
              <rect width="64" height="5.15" y="56.68"></rect>
              <path
                d="M9.77 52.61V42.2c-3.22 1.62-5.3 4.9-5.3 8.59v3.83h5.84C9.97 54.02 9.77 53.35 9.77 52.61zM59.53 50.79c0-3.69-2.07-6.97-5.3-8.59v10.42c0 .73-.21 1.4-.55 2h5.84V50.79zM13.83 54.62h36.34c1.1 0 2-.9 2-2V33.19c0-.84-.67-1.51-1.5-1.51h-22.7c-.01 0-.01 0-.02 0H13.33c-.83 0-1.5.67-1.5 1.51v19.43C11.83 53.72 12.73 54.62 13.83 54.62zM25.29 39.92h13.42c.57 0 1.03.46 1.03 1.03 0 .58-.46 1.03-1.03 1.03H25.29c-.57 0-1.03-.45-1.03-1.03C24.26 40.38 24.72 39.92 25.29 39.92zM25.29 44.3h13.42c.57 0 1.03.46 1.03 1.03 0 .58-.46 1.03-1.03 1.03H25.29c-.57 0-1.03-.45-1.03-1.03C24.26 44.77 24.72 44.3 25.29 44.3zM27.19 11.1l-4.57 4.09v.5c0 6.5 2.16 11.8 5.66 13.94h7.46c3.26-2 5.36-6.77 5.61-12.71C35.31 17.56 29.23 12.87 27.19 11.1z">
              </path>
              <path d="M20.55,15.68c0-0.36,0-0.74,0.04-1.08c0.02-0.26,0.14-0.5,0.33-0.66l5.57-4.99c0.4-0.36,1.01-0.35,1.4,0.02
                  c0.08,0.07,7.72,7.31,14.26,5.71c0.31-0.07,0.64,0,0.89,0.19c0.25,0.2,0.39,0.5,0.39,0.82c0,5.86-1.67,10.9-4.49,13.94h8.             02V17.13
                  c0-4.02-1.55-7.77-4.37-10.57c-2.84-2.83-6.6-4.39-10.59-4.39c-8.26,0-14.98,6.71-14.98,14.96v12.49h8.03
                  C22.23,26.58,20.55,21.54,20.55,15.68z">
              </path>
            </svg>
            <span class="ml-3">Admin</span>
          </a>
        </li>
        <li>
          <a href="admin_signup.php"
            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group <?php if (basename($_SERVER['PHP_SELF']) == 'admin_signup.php') {
              echo 'bg-gray-700';
            } ?>">
            <svg
              class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
              <path
                d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
              <path
                d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>