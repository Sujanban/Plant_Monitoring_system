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


  <!-- font awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css" integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Boxicons -->
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <!-- My CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- view cdn -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>



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
        <i class='bx bxs-user' style="font-size:20px;"></i>
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
              <a class="active" href="weather.php">Weather</a>
            </li>
          </ul>
        </div>
        <!-- <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
          </a> -->
      </div>

      <!-- weather discription -->
      <!-- <div class="my-2">
        <div class="p-4 md:p-8 sm:w-[500] md:w-[700px] mx-auto">
          <div class="flex items-center">
            <form action="" class="flex gap-2 items-center mx-auto">
              <input type="search" class="md:w-96 px-4 py-2 rounded-full border-none bg-white" placeholder="Search City">
              <input type="submit" class="px-4 py-3 rounded-full bg-[#3C91E6] text-white text-xs" value="Search">
            </form>
          </div>
          <div class="py-8 md:flex items-center gap-16">
            <div class="text-center ">
              <i class='text-yellow-500 text-5xl md:text-8xl bx bx-sun'></i>
            </div>
            <div class="text-center">
              <h1 class=" text-3xl md:text-7xl py-4">20 °C</h1>
              <p class="text-sm md:text-xl font-light md:py-2">PARTIALY CLOUDY</p>
              <p class="font-light">FEELS LIKE : 99 C</p>
            </div>
            <div class="mx-auto py-4">
              <p class="font-light"><i class='text-2xl bx bx-wind'></i> 99 KPH-N</p>
              <p class="py-2 font-light"><i class="fa-solid fa-droplet"></i> 99 %</p>
              <p class="font-light"><i class='text-2xl bx bx-wind'></i> 99 MB</p>
            </div>
          </div>
          <div class="md:grid grid-cols-5">
            <div class="leading-8 p-2 m-2 md:m-0 md:border-r text-center border-black rounded-md">
              <h1 class="font-light">MON</h1>
              <i class='text-5xl bx bx-cloud-light-rain'></i>
              <p class="py-2 font-light text-xs">Partially Cloudy</p>
              <div class="text-xs font-light flex items-center justify-between">
                <p>Min : <br />10 °C</p>
                <p>Max : <br />18 °C</p>
              </div>
            </div>
            <div class="leading-8 p-2 m-2 md:m-0 md:border-r text-center border-black rounded-md">
              <h1 class="font-light">TUE</h1>
              <div class="text-5xl">
                <i class='bx bx-cloud-lightning'></i>
              </div>
              <p class="py-2 font-light text-xs">Partially Cloudy</p>
              <div class="text-xs font-light flex items-center justify-between">
                <p>Min : <br />12 °C</p>
                <p>Max : <br />17 °C</p>
              </div>
            </div>
            <div class="leading-8 p-2 m-2 md:m-0 md:border-r text-center border-black rounded-md">
              <h1 class="font-light">WED</h1>
              <i class='text-5xl bx bx-cloud-light-rain'></i>
              <p class="py-2 font-light text-xs">Partially Cloudy</p>
              <div class="text-xs font-light flex items-center justify-between">
                <p>Min : <br />14 °C</p>
                <p>Max : <br />19 °C</p>
              </div>
            </div>
            <div class="leading-8 p-2 m-2 md:m-0 md:border-r text-center border-black rounded-md">
              <h1 class="font-light">THU</h1>
              <div class="text-5xl">
                <i class='bx bx-cloud-rain'></i>
              </div>
              <p class="py-2 font-light text-xs">Partially Cloudy</p>
              <div class="text-xs font-light flex items-center justify-between">
                <p>Min : <br />20 °C</p>
                <p>Max : <br />21 °C</p>
              </div>
            </div>
            <div class="leading-8 p-2 m-2 md:m-0 text-center border-black rounded-md">
              <h1 class="font-light">FRY</h1>
              <div class="text-5xl">
                <i class='bx bx-cloud'></i>
              </div>
              <p class="py-2 font-light text-xs">Partially Cloudy</p>
              <div class="text-xs font-light flex items-center justify-between">
                <p>Min : <br />8 °C</p>
                <p>Max : <br />28 °C</p>
              </div>
            </div>




          </div>
        </div>
      </div> -->
      <div class="sm:w-[500] md:w-[700px] lg:w-[900] mx-auto">
      <section id="currentData">
        <div class="my-2">
          <div class="p-4 md:p-8 sm:w-[500] md:w-[700px] mx-auto">
            <div class="flex items-center">
              <div class="flex gap-2 items-center mx-auto">
                <input type="search" class="md:w-96 px-4 py-2 rounded-full border-none bg-white" placeholder="Search City">
                <button type="submit" class="px-4 py-3 rounded-full bg-[#3C91E6] text-white text-xs" @click="getWeather">Search</button>
              </div>
            </div>
            <div class="py-8 md:flex items-center gap-16">
              <div class="text-center ">
                <i class='text-yellow-500 text-5xl md:text-8xl bx bx-sun'></i>
              </div>
              <div class="text-center">
                <h1 class=" text-3xl md:text-7xl py-4">{{(temp - 273.15).toFixed(2)}} °C</h1>
                <p class="text-sm md:text-xl font-light md:py-2">{{description. toUpperCase()}}</p>
                <p class="font-light">FEELS LIKE :{{(feels_like - 273.15).toFixed(2)}}</p>
              </div>
              <div class="mx-auto py-4">
                <p class="font-light"><i class='text-2xl bx bx-wind'></i> {{wind}} KPH-N</p>
                <p class="py-2 font-light"><i class="fa-solid fa-droplet"></i> {{humidity}} %</p>
                <p class="font-light"><i class='text-2xl bx bx-bot'></i> {{pressure}} MB</p>
              </div>
            </div>

      </section>
      <section id="fututeForcast">
        <div class="md:grid grid-cols-5">
          <div class="leading-8 p-2 m-2 md:m-0 md:border-r text-center border-black rounded-md" v-for="data in filteredForecast" v-if="fullForecast">

            <h1 class="font-light">{{getDay(data.dt_txt)}}</h1>
            <i class='text-5xl bx bx-cloud-light-rain'></i>
            <p class="py-2 font-light text-xs">{{(data.weather)[0].description}}</p>
            <div class="text-xs font-light flex items-center justify-between">
              <p>Min : <br />{{((data.main.temp_min)- 273.15).toFixed(2)}} °C</p>
              <p>Max : <br />{{((data.main.temp_max)- 273.15).toFixed(2)}} °C</p>
            </div>
          </div>


        </div>
      </section>
      </div>
      



    </main>
    <!-- MAIN -->
  </section>
  <!-- CONTENT -->

  <script src="assets/js/script.js"></script>
</body>

</html>

<script>
  const {
    createApp
  } = Vue;

  createApp({
    data() {
      return {
        temp: 300,
        feels_like: 300,
        wind: 0,
        description: "",
        humidity: 0,
        pressure: 0,
        fullForecast: "",

      };
    },
    methods: {
      async getWeather() {
        this.dataLoaded = false;

        const apiUrl = `https://api.openweathermap.org/data/2.5/forecast?lat=26.6563755&lon=87.2869557&appid=9f2e1f455e003246d00a9c41b725bbc8
`;
        const response = await fetch(apiUrl);
        const UnfilteredData = await response.json();
        this.fullForecast = UnfilteredData,

          this.showData(UnfilteredData)

      },
      getDay(date) {
        const day = new Date(date).getDay();
        return day.toDay();
      },

      showData(allData) {

        const todaysData = allData.list[0];

        console.log(JSON.stringify(todaysData))

        this.temp = todaysData.main.temp;
        this.feels_like = todaysData.main.feels_like;
        this.wind = todaysData.wind.speed;
        this.humidity = todaysData.main.humidity;
        this.pressure = todaysData.main.pressure;
        this.description = (todaysData.weather)[0].description;

      }




    },
    /*methods ends*/

    computed: {
      filteredForecast() {
        const uniqueForecastDays = [];
        const fiveDaysForecast = this.fullForecast.list.filter((forecast) => {
          const forecastDate = new Date(forecast.dt_txt).getDate();
          if (!uniqueForecastDays.includes(forecastDate)) {
            uniqueForecastDays.push(forecastDate);
            return true;

          }
          return false;

        });
        return fiveDaysForecast;
      }
    },


  }).mount('main');



  Number.prototype.toDay = function() {
    return ({
      1: "Sun",
      2: "Mon",
      3: "Tue",
      4: "Wed",
      5: "Thu",
      6: "Fri",
      7: "Sat",
    } [this]);
  }
</script>