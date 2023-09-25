<?php
require('connection.php');
session_start();
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
        <div class="w-full h-full">
            <?php
            if($_SESSION['Logged_in']){
            include "nav.php";
            }
            else{
                include 'nav_nosession_nav_only.php';
            }
            ?>
            <h1 class="flex justify-center sm:text-3xl text-2xl font-medium title-font mb-4 text-indigo-500 mt-5">Terms and Conditions</h1>
            <section class="text-gray-600 body-font h-5/6 overflow-scroll">
                <div class="container px-5 py-10     mx-auto flex flex-wrap ">
                    <div class="flex justify-center w-full">
                        <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    1
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Provide
                                        Accurate Information
                                    </h2>
                                    <p class="leading-relaxed">Ensure that all information provided about the lost or
                                        found item is accurate and truthful.</p>
                                </div>
                            </div>
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    2
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">
                                        Detailed Description
                                    </h2>
                                    <p class="leading-relaxed">Write a detailed description of the item, including its
                                        color, size, brand, and any unique identifying features.</p>
                                </div>
                            </div>
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    3
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Attach
                                        Photos
                                    </h2>
                                    <p class="leading-relaxed">If possible, include clear photos of the item from
                                        different angles to help with identification.</p>
                                </div>
                            </div>
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    4
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Specify
                                        Location
                                    </h2>
                                    <p class="leading-relaxed">Mention where the item was lost or found, including any
                                        relevant landmarks or details about the location.</p>
                                </div>
                            </div>
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    5
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Check
                                        for Duplicate Listings
                                    </h2>
                                    <p class="leading-relaxed">Search the platform to ensure there are no duplicate
                                        listings for the same item.</p>
                                </div>
                            </div>
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    6
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Respect
                                        Community Guidelines
                                    </h2>
                                    <p class="leading-relaxed"> Familiarize yourself with the platform's rules and
                                        guidelines, and ensure your listing complies with them.</p>
                                </div>
                            </div>
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    7
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Avoid
                                        Inflammatory Language
                                    </h2>
                                    <p class="leading-relaxed">Use respectful and non-inflammatory language in your
                                        post.</p>
                                </div>
                            </div>
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    7
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">No
                                        Commercial Posts
                                    </h2>
                                    <p class="leading-relaxed"> Do not use the platform for commercial purposes, such as
                                        selling found items.</p>
                                </div>
                            </div>
                            <div class="flex relative">
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
                                    8
                                </div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Review
                                        and Confirm
                                    </h2>
                                    <p class="leading-relaxed">Review your post for accuracy and completeness before
                                        submitting it.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>
</body>

<script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js">
</script>

</html>