<?php

date_default_timezone_set('Asia/Kathmandu');
$login=false;
$error=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include_once "../partials/_dbconnect.php";
    $email=htmlspecialchars(stripslashes(trim($_POST['email'])));
    $password=md5($_POST['password']);

    //sql command to select the particular username and password
    $sql = "SELECT id,`name`,email,`password`,`image` FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    //fetching data
    $row=mysqli_fetch_assoc($result);
    if($row){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userData'] = $row; //assgining the user data array in session
        header("Location: ../index.php");
    }
    else{
        $error='Invalid Credentials';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
     <div id="container">
        <div class="left">
            <div class="left-content">
                <img src="../assets/images/plantAndHand.png" alt="logo">
                <div class="text">
                    <h3>Web App Name</h3>
                    <p>our motto Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus error voluptates itaque porro consequuntur nulla. Est asperiores voluptatibus qui facilis?</p>
                </div>
            </div>
        </div>
        <form action="" method="post">
            <div class="right">
                <div class="text">
                    <h2>Login into your account</h2>
                    <p>Welcome Back!</p>
                </div>
                <div class="input-field">
                    <i class='bx bx-envelope'></i>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-field">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <span class="eye-icon" onclick="return PasswordVisibility()"><i class='bx bxs-low-vision'></i></span>
                </div>
                <div class="right-bottom">
                    <a href="#">Forget Password?</a><br>
                    <button type="submit" name="submitBtn">Login</button>
                    <p>Don't have an account?<a href="signup.php">Sign Up</a></p>
                </div>
            </div>
        </form>
     </div>
     <script>
        function PasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.querySelector(".eye-icon");
  
            if (passwordInput.type === "password" ) 
            {
                passwordInput.type = "text";
                eyeIcon.classList.add("clicked");
            }
            else
            {
                passwordInput.type = "password";
                eyeIcon.classList.remove("clicked");
            }
        }
     </script>
</body>
</html>