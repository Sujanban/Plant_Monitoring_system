<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Home Page</title>
</head>

<body class="">
    <header class="px-2 sm:px-4 md:px-6 lg:px-8 shadow header w-full h-[10vh] mx-auto">
        <div class="max-w-7xl flex items-center h-[10vh] justify-between mx-auto">
            <div class="flex items-center gap-12">
                <div>
                    <a class="flex items-center font-bold uppercase" href="">
                        <img src="assets/images/logo.png" class=" py-2 h-[7vh]" alt="">
                        <p class="hidden sm:flex pl-1">AgroChat</p>
                    </a>
                </div>
                <div class="text-stone-600">
                    <ul
                        class="bg-white h-[90vh] navlink grid sm:flex absolute z-[99] sm:static top-[11vh] sm:top-auto sm:left-auto w-full left-0  items-center gap-4">
                        <li class="flex">
                            <a class="mx-auto rounded-md" href="#explore">
                                Explore</a>
                        </li>
                        <li class="flex">
                            <a class="mx-auto rounded-md" href="#service">Service</a>
                        </li>
                        <li class="flex">
                            <a class="mx-auto rounded-md" href="#contact">Contact</a>
                        </li>
                        <!-- <li class="flex">
                            <a class="mx-auto rounded-md" href="">Blog</a>
                        </li>
                        <li class="flex">
                            <a class="mx-auto rounded-md" href="">FAQs</a>
                        </li> -->
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center font-medium">
                    <?php if (!isset($_SESSION['userData'])) {?>
                    <a class="px-2 py-1 sm:px-3 sm:py-1 mx-auto border-2 border-stone-900 rounded-full flex items-center text-center"
                        href="./auth/login.php">Login
                        <button><i class="px-3 rotate-45 fa-solid fa-arrow-up-long"></i></button>
                    </a>
                    <?php } ?>
                    <?php if (isset($_SESSION['userData'])) {?>
                    <a class="px-2 py-1 sm:px-3 sm:py-1 mx-auto border-2 border-stone-900 rounded-full flex items-center text-center"
                        href="./backend/index.php">
                        Dashboard
                        <i class='bx bxs-user' style="font-size:22px;"></i>    
                    </a>
                    <?php } ?>
                </div>

                <i class="sm:hidden fa-solid fa-bars hamburger"></i>
            </div>

        </div>
    </header>










    <!-- hero-section -->

    <div class="hero_section px-2 sm:px-4 md:px-6 lg:px-8">
        <div class="p-4 max-w-7xl mx-auto h-[90vh]">
            <div class="relative rounded-xl h-full hero_section_img ">
                <div class="">
                    <h1 class="absolute left-[25%] top-5 sm:text-3xl md:text-5xl p-4 font-semibold bg-white rounded-xl">Smart
                        Agriculture,<br /> Smart World</h1>
                    <p class="text-sm p-2 sm:p-4 absolute bg-white right-10 top-[30%] max-w-3xl rounded-xl">
                    Discover the power of technology and innovation at AgroChat, where we bring transformative solutions to your fingertips. 
                    From agriculture to smart living, our chatbot is designed to assist and engage with you on a variety of topics. 
                    Explore the intersection of cutting-edge technology and everyday life with us.
                        </p>
                    <div class="p-2 sm:p-4 absolute bg-white left-5 bottom-5 max-w-3xl rounded-xl">
                        <div class=" rounded-full p-4">
                            <h1 class="font-bold text-xl md:text-3xl">100+</h1>
                            <p class="text-sm">Happy Customers</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>








    <!-- hero description -->
    <div class="hero_description px-2 sm:px-4 md:px-6 lg:px-8 py-20">
        <div id="explore" class="max-w-7xl mx-auto">
            <p class="px-8 md:text-2xl font-semibold text-center">
            At AgroChat, we transcend boundaries by offering smart solutions that span various industries. 
            Whether you're interested in the latest advancements in agriculture, sustainable living, or emerging technologies, our chatbot is here to provide you with insightful information and engaging conversations.
            </p>
            <div class="py-8">
                <div class="py-8 md:flex items-center gap-8">
                    <img class="m-4 relative w-[300px] h-[350px] md:h-[450px] object-cover rounded-md"
                        src="assets/images/girl_garden.jpg" alt="">
                    <!-- <div class="absolute w-[300px] h-[450px] bg-slate-200> -->

                    <!-- </div> -->
                    <div class="flex flex-col grid-rows-3">
                        <div class="p-4 md:p-8 md:text-xl">
                        Our specialized chatbot is your guide to innovative agriculture. Dive into precision farming, explore IoT applications, and discover the transformative impact of technology on crop management. From plant health to sustainable practices, our chatbot delivers personalized insights to enhance your farming experience.
                        </div>
                        <div class="text-slate-500 p-4 md:p-0 md:pl-24 flex-end">
                        Ready to experience the future of interactive platforms? Connect with our chatbot and elevate your journey in agriculture and weather awareness. AgroChat -where conversation meets innovation.
                        </div>
                        <div class="p-8 flex">
                            <div class="flex font-medium">
                                <a class="px-3 py-1 mx-auto border-2 border-stone-900 rounded-full" href="">Contacts</a>
                                <a class=" py-1 mx-auto border-2 border-stone-900 rounded-full flex items-center text-center"
                                    href="">
                                    <button><i class="px-3 rotate-45 fa-solid fa-arrow-up-long"></i></button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>




    <!-- what we provide. our service -->
    <div class=" bg-gray-100 service_section px-2 sm:px-4 md:px-6 lg:px-8 py-20">
        <div class="max-w-7xl mx-auto">
            <div id="service" class="md:flex items-center justify-between">
                <div>
                    <h1 class="py-4 text-3xl font-medium">We Provide solution to your plants</h1>
                </div>
                <div>
                    <p>"Experience unparalleled quality service at AgroChat,<br /> where excellence meets
                        every expectation."</p>
                    <div class="py-8 flex">
                        <div class="flex font-medium">
                            <a class="px-3 py-1 mx-auto border-2 border-stone-900 rounded-full" href="mailto:bansujan@gmail.com">Contacts</a>
                            <!-- <a class=" py-1 mx-auto border-2 border-stone-900 rounded-full flex items-center text-center"
                                href="">
                                <button><i class="px-3 rotate-45 fa-solid fa-arrow-up-long"></i></button>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:grid grid-cols-2 gap-4">
                <div class="m-2 p-2 md:p-6 rounded-md bg-gray-200">
                    <img src="assets/images/chatbot.jpg" class="rounded h-[200px] md:h-[300px] object-cover w-full" alt="">
                    <h1 class="py-2 md:text-xl font-medium">Agro Chatbot</h1>
                    <p class="text-sm">We provide a Fully functional Chatbot quuiped with Artificial Intellegence to help on crowing your crops.
                    </p>
                </div>
                <div class="m-2 p-2 md:p-6 rounded-md bg-gray-200">
                    <img src="assets/images/weather.jpg" class="rounded h-[200px] md:h-[300px] object-cover w-full" alt="">
                    <h1 class="py-2 md:text-xl font-medium">Weather Awareness</h1>
                    <p class="text-sm">We provide a platform which can help detect the climate conditions of your farma nd nearby areas.
                    </p>
                </div>

            </div>
        </div>

    </div>





    <!-- contact banner -->
    <div class="contact_banner px-2 sm:px-4 md:px-6 lg:px-8 py-20">
        <div class="max-w-7xl mx-auto">
            <div  id="contact"  class="relative">
                <img class=" h-[500px] w-full object-cover" src="assets/images/orange.jpg" alt="">
                <h1 class="absolute font-medium text-xl md:text-3xl top-0 bg-white p-4  rounded-br-xl">Cultivating Sustainability
                    <br />Agriculture</h1>
                <div class="absolute right-0 bottom-0 p-8 flex">
                    <div class="flex font-medium text-white">
                        <a class="px-3 py-1 mx-auto border-2 border-white rounded-full" href="mailto:bansujan@gmail.com">Contacts</a>
                        <a class=" py-1 mx-auto border-2 border-white rounded-full flex items-center text-center"
                            href="">
                            <button><i class="px-3 rotate-45 fa-solid fa-arrow-up-long"></i></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- footer -->
    <div class="contact_banner px-2 sm:px-4 md:px-6 lg:px-8 py-20">
        <div class="max-w-7xl mx-auto md:grid grid-cols-3 items-center gap-4">
            <div class="rounded-xl p-8 text-white bg-stone-800">
                <h1 class="font-medium text-2xl">Creafting Agriculture, For<br /> Farmers, By Inovators.</h1>
                <p class="py-2 text-sm text-gray-400">"Ready to elevate your agricultural experience? Join our platform
                    at AgroChat and unlock a world of advanced solutions for smarter, healthier farming.
                    Let's grow together!"</p>
                <div class="pt-2 flex">
                    <div class="flex font-medium text-white">
                        <a class="px-3 py-1 mx-auto border-2 border-white rounded-full" href="">Join Us</a>
                        <a class=" py-1 mx-auto border-2 border-white rounded-full flex items-center text-center"
                            href="">
                            <button><i class="px-3 rotate-45 fa-solid fa-arrow-up-long"></i></button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-8 rounded-xl grid grid-cols-2 md:flex bg-gray-200 col-span-2 gap-12">
                <ul class="font-medium">
                    <h2 class="pb-4 text-gray-500">Links</h2>
                    <li class="py-1"><a class="text-sm" href="">Explore</a></li>
                    <li class="py-1"><a class="text-sm" href="">Service</a></li>
                    <li class="py-1"><a class="text-sm" href="">Business</a></li>
                    <li class="py-1"><a class="text-sm" href="">FAQs</a></li>
                    <li class="py-1"><a class="text-sm" href="">Contact</a></li>
                </ul>
                <ul class="font-medium">
                    <h2 class="pb-4 text-gray-500">Community</h2>
                    <li class="py-1"><a class="text-sm" href="">Twitter</a></li>
                    <li class="py-1"><a class="text-sm" href="">Facebook</a></li>
                    <li class="py-1"><a class="text-sm" href="">Instagram</a></li>
                    <li class="py-1"><a class="text-sm" href="">Whatsapp</a></li>
                </ul>
                <ul class="font-medium">
                    <h2 class="pb-4 text-gray-500">Support</h2>
                    <li class="py-1"><a class="text-sm" href="">FAQs</a></li>
                    <li class="py-1"><a class="text-sm" href="">Contact</a></li>
                    <li class="py-1"><a class="text-sm" href="">Help Center</a></li>
                    <li class="py-1"><a class="text-sm" href="">Whatsapp</a></li>
                </ul>
                <ul class="font-medium">
                    <h2 class="pb-4 text-stone-900">
                        <a class="flex items-center font-bold uppercase" href="">
                            <img src="assets/images/logo.png" class=" p-2 h-[8vh]" alt="">
                            <p class="hidden sm:flex">AgroChat</p>
                        </a>
                    </h2>
                </ul>

            </div>
        </div>
    </div>
    <div class="text-sm max-w-7xl mx-auto p-4 px-8 flex justify-between items-center">
        <h1>&copy; 2023 AgroChat</h1>
        <div class="flex items-center gap-4 text-gray-500 text-sm">
            <a href="">Privacy Policy</a>
            <a href="">Terms Of Use</a>
        </div>
    </div>

    <script src="assets/js/toggle.js"></script>
</body>

</html>