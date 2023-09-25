
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us | Tracker</title>
        <link rel="shortcut icon" type="image/x-icon" href="../imgs/icon.png" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
    </head>

    <body>
        <?php
        include "claim_nosession.php";
        ?>
        <div class="w-screen h-screen fixed">
            <div class="w-full h-5/6">
                <?php
                include "nav_nosession_nav_only.php";
                ?>
                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-24 mx-auto" bis_skin_checked="1">
                        <div class="flex flex-col items-center justify-center text-center w-full mb-12"
                            bis_skin_checked="1">

                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Get in touch with our team
                                through this
                                form and
                                let us know your experience on using this web app.</p>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto" bis_skin_checked="1">
                            <div class="flex flex-wrap -m-2" bis_skin_checked="1">
                                <div class="p-2 w-1/2" bis_skin_checked="1">
                                    <div class="relative" bis_skin_checked="1">
                                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2" bis_skin_checked="1">
                                    <div class="relative" bis_skin_checked="1">
                                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-full" bis_skin_checked="1">
                                    <div class="relative" bis_skin_checked="1">
                                        <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                                        <textarea id="message" name="message"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500  h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                    </div>
                                </div>
                                <div class="p-2 w-full" bis_skin_checked="1">
                                    <button name="claim" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 over:bg-indigo-600 rounded text-lg">Submit</button>

                                </div>
                                <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center" bis_skin_checked="1">
                                    <a class="text-indigo-500">olfstracker@gmail.com</a>
                                    <p class="leading-normal my-5">Development Team,
                                        <br>Tracker
                                    </p>

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
    <?php
?>