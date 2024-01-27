<!-- 
<?php
session_start();
if (!isset($_SESSION['userData']) && $_SESSION['loggedin'] != true) {
  header("Location: ../auth/login.php");
} else {
  $user_id = $_SESSION['userData']['id'];
}
?>
 -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css"
        integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <a class="active" href="weather.html">Weather</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="sm:w-[500] md:w-[700px] lg:w-[900] mx-auto">
                <section id="currentData">
                    <div class="my-2">
                        <div class="p-4 md:p-8 sm:w-[500] md:w-[700px] mx-auto">
                            <div class="flex items-center">
                                <div class="flex gap-2 items-center mx-auto">
                                    <input type="search" class="md:w-96 px-4 py-2 rounded-full border-none bg-white"
                                        placeholder="Search City" v-model="queryCity" @keyup.enter="getCoordinates">
                                    <button type="submit" class="px-4 py-3 rounded-full bg-[#3C91E6] text-white text-xs"
                                        @click="getCoordinates">Search</button>

                                    <button @click="getUserCoordinates()"
                                        class="px-4 py-3 rounded-full bg-[#3C91E6] text-white text-xs"><i
                                            class="fas fa-location-dot"></i></button>
                                </div>
                            </div>
                            <div class="py-8 md:flex items-center gap-16">
                                <div class="align-self-center ">

                                    <!-- <i class='text-yellow-500 text-5xl md:text-8xl bx bx-sun'></i> -->
                                    <img :src="'http://openweathermap.org/img/wn/'+icon+'.png'" alt="" class=""
                                        style="height: 50px;width:50px; self-align:center;">

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



                <section id="localeData">





                    <div class="md:grid grid-cols-6">
                        <div class="leading-8 p-2 m-2 md:m-0 md:border-r text-center border-black rounded-md"
                            v-for="data in show_locale_forecast_data" v-if="fullForecast == '' ">

                            <h1 class="font-light">{{getDay(data.dt_txt)}}</h1>
                            <!-- <i cldass='text-5xl bx bx-cloud-light-rain' :class="get_weather_icons((data.weather)[0].description) "></i> -->

                            <img :src="'https://openweathermap.org/img/wn/'+((data.weather)[0].icon)+'.png'" alt=""
                                style="height: 50px;width:50px; self-align:center;">

                            <p class="py-2 font-light text-xs">{{(data.weather)[0].description}}</p>
                            <div class="text-xs font-light flex items-center justify-between">
                                <p>Min : <br />{{((data.main.temp_min)- 273.15).toFixed(2)}} °C</p>
                                <p>Max : <br />{{((data.main.temp_max)- 273.15).toFixed(2)}} °C</p>
                            </div>
                        </div>

                    </div>












                </section>



















                <section id="fututeForcast">





                    <div class="md:grid grid-cols-5">
                        <div class="leading-8 p-2 m-2 md:m-0 md:border-r text-center border-black rounded-md"
                            v-for="data in filteredForecast" v-if="fullForecast">

                            <h1 class="font-light">{{getDay(data.dt_txt)}}</h1>
                            <!-- <i cldass='text-5xl bx bx-cloud-light-rain' :class="get_weather_icons((data.weather)[0].description) "></i> -->

                            <img :src="'https://openweathermap.org/img/wn/'+((data.weather)[0].icon)+'.png'" alt=""
                                style="height: 50px;width:50px;background:blue; self-align:center;">

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

</script>


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
                queryCity: "",
                icon: '',

            };
        },
        methods: {
            async getWeather(lat, lon, name) {
                this.dataLoaded = false;

                const apiUrl =
                    `https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=9f2e1f455e003246d00a9c41b725bbc8`;

                const response = await fetch(apiUrl);
                const UnfilteredData = await response.json();
                this.fullForecast = UnfilteredData,

                   // console.log(`${apiUrl}/02n`);
console.log(UnfilteredData);
                this.showData(UnfilteredData);

            },

            async getCoordinates() {

                if (this.queryCity == "") {
                    return;
                }

                const apiUrl =
                    `https://api.openweathermap.org/geo/1.0/direct?q=${this.queryCity}&limit=1&appid=9f2e1f455e003246d00a9c41b725bbc8`;

                const response = await fetch(apiUrl);
                const coordinatesData = await response.json();

                const {
                    lat,
                    lon,
                    name
                } = coordinatesData[0];

                this.getWeather(lat, lon, name);

                console.log(coordinatesData);

            },



            getDay(date) {
                const day = new Date(date).getDay();
                return day.toDay();
            },

            get_from_locale_data() {

                try {
                    const weatherData = JSON.parse(localStorage.getItem('weatherData'));

                    const forecastData = JSON.parse(localStorage.getItem('forecastData'))


                    if (!(weatherData && forecastData)) {

                        throw new Error(`Weather data or forecast data not found in local storage`);
                    }

                    else {
                        // Or return an empty object {} if preferred
                        this.show_locale_weather_data(weatherData);

                        this.show_locale_forecast_data(forecastData)

                    }
                } catch (error) {
                    console.error('Error retrieving from local storage:', error);
                    return null;
                }

            },

            show_locale_weather_data(weatherData) {
                this.temp = weatherData.temp;
                this.feels_like = weatherData.feels_like;
                this.wind = weatherData.wind;
                this.humidity = weatherData.humidity;
                this.pressure = weatherData.pressure;
                this.description = weatherData.description;
                this.icon = weatherData.icon;
            },
            show_locale_forecast_data(forecastData= JSON.parse(localStorage.getItem('forecastData')) ) {
                return forecastData;
            },



            showData(allData) {

                console.log(allData);

                const todaysData = allData.list[0];

                console.log(JSON.stringify(todaysData))

                this.temp = todaysData.main.temp;
                this.feels_like = todaysData.main.feels_like;
                this.wind = todaysData.wind.speed;
                this.humidity = todaysData.main.humidity;
                this.pressure = todaysData.main.pressure;
                this.description = (todaysData.weather)[0].description;
                this.icon = todaysData.weather[0].icon;

                setLocale_weather(this.temp, this.feels_like, this.humidity, this.wind, this.pressure, this.description, this.icon);


            }, get_weather_icons: function (condition) {

                return {
                    "scattered clouds": "fa-solid fa-cloud",
                    'broken clouds': "fa-solid fa-clouds-sun",
                    "few clouds": "fa-solid fa-cloud-sun",
                    "sunny": "fa-solid fa-sun",
                    "moon": "fa-solid fa-moon",
                    "snow fall": "fa-regular fa-snowflake",
                    "scatter rain": "fa-solid fa-cloud-showers-heavy"
                }[condition];
            },
            getUserCoordinates: () => {
                navigator.geolocation.getCurrentPosition(
                    position => {
                        const { latitude, longitude } = position.coords; // Get coordinates of user location
                        // Get city name from coordinates using reverse geocoding API
                        const API_URL = `https://api.openweathermap.org/geo/1.0/reverse?lat=${latitude}&lon=${longitude}&limit=1&appid=9f2e1f455e003246d00a9c41b725bbc8`;
                        fetch(API_URL).then(response => response.json()).then(data => {
                            const { name } = data[0];
                            this.getWeatherDetails(latitude, longitude, name);
                        }).catch((err) => {
                            alert("An error occurred while fetching the city name!:  ", +err);
                        });
                    },
                    error => { // Show alert if user denied the location permission
                        if (error.code === error.PERMISSION_DENIED) {
                            alert("Geolocation request denied. Please reset location permission to grant access again.");
                        } else {
                            alert(" This feature is available only in secure contexts (HTTPS), ERROR: you dont have secure connection i.e HTTPS");
                        }
                    });
            },




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

                setLocale_forecast(fiveDaysForecast);

                return fiveDaysForecast;
            }
        },


    }).mount('main');



    Number.prototype.toDay = function () {
        return ({
            0: "Sun",
            1: "Mon",
            2: "Tue",
            3: "Wed",
            4: "Thu",
            5: "Fri",
            6: "Sat",
        }[this]);
    }


    // document.body.addEventListener('keypress', function(e) {

    //  console.log(` ${e.key} :   ${e.keyCode}`); 




    // })

    function scale(ratio = 1.0) {

        document.querySelector(`meta[name="viewport"]`).setAttribute('content', `width=device-width, initial-scale=${ratio}`);

    }



    // setlocale(this.temp, this.feels_like, this.humidity, this.wind, this.pressure, this.description, this.icon) code that will set to local storage



    function setLocale_weather(temp, feels_like, humidity, wind, pressure, description, icon) {
        const weatherData = {
            temp,
            feels_like,
            humidity,
            wind,
            pressure,
            description,
            icon
        };

        try {
            localStorage.setItem('weatherData', JSON.stringify(weatherData));
            console.log('Weather data saved to local storage');
        } catch (error) {
            console.error('Error saving to local storage:', error);
        }
    }



    function setLocale_forecast(fiveDaysData) {

        try {
            localStorage.setItem('forecastData', JSON.stringify(fiveDaysData));
            console.log('Weather data saved to local storage');
        } catch (error) {
            console.error('Error saving to local storage:', error);
        }
    }




    function getLocale_forecast() {
        try {
            const storedData = localStorage.getItem('forecastData');
            if (storedData) {
                return JSON.parse(storedData);
            } else {
                return null; // Or return an empty object {} if preferred
            }
        } catch (error) {
            console.error('Error retrieving from local storage:', error);
            return null;
        }
    }





    function getLocale_weather() {
        try {
            const storedData = localStorage.getItem('weatherData');
            if (storedData) {
                return JSON.parse(storedData);
            } else {
                return null; // Or return an empty object {} if preferred
            }
        } catch (error) {
            console.error('Error retrieving from local storage:', error);
            return null;
        }
    }





</script>