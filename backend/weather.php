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
  <link rel="stylesheet" href="assets/css/weather.css" />
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
      <li class="active">
        <a href="weather.php">
          <i class='bx bx-cloud-snow'></i>
          <span class="text">Weather Forecast</span>
        </a>
      </li>
      <li>
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
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">Dashboard</a>
            </li>
            <li><i class="bx bx-chevron-right"></i></li>
            <li>
              <a class="active" href="index.html">Home</a>
            </li>
          </ul>
        </div>
        <!-- <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
          </a> -->
      </div>
      <div>
        weather section starts here

        <body>
          <h1>Weather Dashboard</h1>
          <div class="container">
            <div class="weather-input">
              <h3>Enter a City Name</h3>
              <input class="city-input" type="text" placeholder="E.g., New York, London, Tokyo">
              <button class="search-btn">Search</button>
              <div class="separator"></div>
              <button class="location-btn">Use Current Location</button>
            </div>
            <div class="weather-data">
              <div class="current-weather">
                <div class="details">
                  <h2>_______ ( ______ )</h2>
                  <h6>Temperature: __°C</h6>
                  <h6>Wind: __ M/S</h6>
                  <h6>Humidity: __%</h6>
                </div>
              </div>
              <div class="days-forecast">
                <h2>5-Day Forecast</h2>
                <ul class="weather-cards">
                  <li class="card">
                    <h3>( ______ )</h3>
                    <h6>Temp: __C</h6>
                    <h6>Wind: __ M/S</h6>
                    <h6>Humidity: __%</h6>
                  </li>
                  <li class="card">
                    <h3>( ______ )</h3>
                    <h6>Temp: __C</h6>
                    <h6>Wind: __ M/S</h6>
                    <h6>Humidity: __%</h6>
                  </li>
                  <li class="card">
                    <h3>( ______ )</h3>
                    <h6>Temp: __C</h6>
                    <h6>Wind: __ M/S</h6>
                    <h6>Humidity: __%</h6>
                  </li>
                  <li class="card">
                    <h3>( ______ )</h3>
                    <h6>Temp: __C</h6>
                    <h6>Wind: __ M/S</h6>
                    <h6>Humidity: __%</h6>
                  </li>
                  <li class="card">
                    <h3>( ______ )</h3>
                    <h6>Temp: __C</h6>
                    <h6>Wind: __ M/S</h6>
                    <h6>Humidity: __%</h6>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </body>
      </div>
    </main>
    <!-- MAIN -->
  </section>
  <!-- CONTENT -->

  <script src="assets/js/script.js"></script>
  <script src="assets/js/weather.js"></script>
</body>

</html>