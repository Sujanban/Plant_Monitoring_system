<?php
session_start();
if (!isset($_SESSION['userData']) && $_SESSION['loggedin'] != true) {
  header("Location: ../auth/login.php");
} else {
  $user_id = $_SESSION['userData']['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Boxicons -->
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <!-- My CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Admin Dashboard</title>
</head>

<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="index.php" class="font-bold uppercase brand p-4">
      <img src="assets/images/logo.png" class="w-[5vh]" alt="">
      <span class="text-stone-900 text-lg">HarvestGrove</span>
    </a>
    <ul class="side-menu top">
      <li>
        <a href="index.php">
          <i class="bx bxs-dashboard"></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="weather.php">
          <i class='bx bx-cloud-snow'></i>
          <span class="text">Weather Forecast</span>
        </a>
      </li>
      <li class="active">
          <a href="bot.php">
          <i class='bx bx-bot'></i>
            <span class="text">Farm Bot</span>
          </a>
        </li>
      <li>
        <a href="message.php">
          <i class="bx bxs-message-dots"></i>
          <span class="text">Message</span>
        </a>
      </li>
      <!-- <li>
          <a href="#">
            <i class="bx bxs-group"></i>
            <span class="text">Team</span>
          </a>
        </li> -->
    </ul>
    <ul class="side-menu">
      <li>
        <a href="setting.php">
          <i class="bx bxs-cog"></i>
          <span class="text">Settings</span>
        </a>
      </li>
      <li>
        <a href="../auth/logout.php" class="logout">
          <i class="bx bxs-log-out-circle"></i>
          <span class="text">Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- SIDEBAR -->

  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
    <nav>
      <i class="bx bx-menu"></i>
      <!-- <a href="#" class="nav-link">Categories</a> -->
      <form action="#">
        <div class="form-input">
          <input type="search" placeholder="Search..." />
          <button type="submit" class="search-btn">
            <i class="bx bx-search"></i>
          </button>
        </div>
      </form>
      <input type="checkbox" id="switch-mode" hidden />
      <label for="switch-mode" class="switch-mode"></label>
      <a href="message.php" class="notification">
        <i class="bx bxs-bell"></i>
        <span class="num">8</span>
      </a>
      <a href="setting.php" class="profile">
        <img src="assets/images/profile.png" />
      </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
      <div class="head-title">
        <div class="left">
          <h1>Farm Bot</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">Dashboard</a>
            </li>
            <li><i class="bx bx-chevron-right"></i></li>
            <li>
              <a class="active" href="bot.php">Farm Bot</a>
            </li>
          </ul>
        </div>
      </div>

      <div class=" containera  ">
        <div class=" chatboxa">
          <div class=" my-8 mx-auto md:w-[50%] chatbox__support">
            <div class="p-6 chatbox__headera">
              <div class=" chatbox__content--header">
                <h4 class="font-medium text-stone-900 chatbox__heading--header">Chat support</h4>
                <p class="text-slate-500 chatbox__description--header">Hi. My name is Sam. How can I help you?</p>
              </div>
            </div>
            <div class="chatbox__messages">
              <div></div>
            </div>
            <div class=" chatbox__footer">
              <input type="text" placeholder="Write a message...">
              <button class="text-slate-900 px-3 py-2 rounded-full bg-slate-200 chatbox__send--footer send__button">Send</button>
            </div>
          </div>






          <!-- no need -->
          <div class="hidden chatbox__button">
            <button><img src="images/chatbox-icon.svg" /></button>
          </div>
        </div>
      </div>

      <script type="text/javascript" src="assets/js/app.js"></script>

</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="assets/js/script.js"></script>
</body>

</html>