<?php
session_start();
if (!isset($_SESSION['userData']) && $_SESSION['loggedin'] != true) {
    header("Location: ../auth/login.php");
} else {
    $user_id=$_SESSION['userData']['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Boxicons -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
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
        <li class="active">
          <a href="setting.php">
            <i class="bx bxs-cog"></i>
            <span class="text setting_active">Settings</span>
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
          <i class='bx bxs-user' style="font-size:20px;"></i>
        </a>
      </nav>
      <!-- NAVBAR -->

      <!-- MAIN -->
      <main>
        <div class="head-title">
          <div class="left">
            <h1><?php echo $_SESSION['userData']['name'];?></h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="setting.php">Setting</a>
              </li>
            </ul>
          </div>
          <!-- <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
          </a> -->
        </div>

        <div class="password">
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>Current password</td>
                        <td><input type="password" name="currentPassword" required></td>
                    </tr>
                    <tr>
                        <td>New password</td>
                        <td><input type="password" name="newPassword" required></td>
                    </tr>
                    <tr>
                        <td>Retype password</td>
                        <td><input type="password" name="retypeNewPassword" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="passwordBtn">Change</button>   
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        
      </main>
      <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="assets/js/script.js"></script>
  </body>
</html>
