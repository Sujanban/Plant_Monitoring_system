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
    <title>Login - Plant Monitoring System</title>
    <!-- Box icons link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/login_style.css">
</head>
<body>
<?php
    if ($error) {
        echo '<div id="userExits" 
        style=" padding:5px;
        text-align:center;
        background: lightcoral;
        font-size: large;">'.$error.'</div>';
    }
    if(isset($_SESSION['password_recoverd'])){
        echo '<div id="userExits" 
        style=" padding:5px;
        text-align:center;
        background: lightgreen;
        font-size: large;">'.$_SESSION['password_recoverd'].'</div>';
    }?>
    <div class="login-container">
        <h1 style="text-align: center;color: rgb(247, 247, 248)" >Login to your account</h1>
        <p style="text-align: center;color: rgb(247, 247, 248);">Don't have an account? <a href="signup.php">Sign Up Here</a></p>
        <form action="" method="post" onsubmit="return validateUserDetails()" name="frmUserDetails">
            <div class="form-item">
                <label class="form-label"  for="email">Email Address</label>
                <input class="form-control" type="text" name="email" id="email" required>
                <div class="error" id="email-error">You have entered an invalid email address. Please try again</div>
            </div>

            <div class="form-item">
                <label for="password">Password</label>
                <div class="password-input">
                    <input class="form-control" type="password" name="password" id="password" required >
                    <span class="eye-icon" onclick="return PasswordVisibility()"><i class="fa fa-eye"></i></span>
                </div>
                <div class="error" id="password-error">Your password is invalid.</div>
            </div>

            <div class="form-item" style="display: flex; justify-content: space-between; align-items: center;">

                <p style="text-align:right;"><a href="forgetpassword.php" id="forgot-link">Forgot Password?</a></p>
            </div>
            
            <div class="form-item">
                <button class="login-btn" type="submit" id="btn" name="btn">Login</button>
            </div>
            <hr>
            <div class="home-link">
                <p style="text-align: center;color: rgb(247, 247, 248);">Go back to <a href="../index.php"><i class='bx bxs-home'></i></a></p>
            </div>
        </form>
    </div>


    <script>
        function validateUserDetails(e)
        {
            var ok=true;
            //email validation
            let email=document.frmUserDetails.email.value;
            let emailpattern=/^[\w]+([.-\w]+)?@[\w.-]+\.[A-Za-z]{2,6}$/i;
            if(!emailpattern.test(email))
            {
                ok=false;
                document.getElementById('email-error').style='display:block';
            }

            return ok;
        }
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