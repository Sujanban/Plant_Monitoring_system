<?php
date_default_timezone_set('Asia/Kathmandu');
$error = "";
$accountCreated="";
if (isset($_POST['btn'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    //connecting to database
    include_once "../partials/_dbconnect.php";
    $result = mysqli_query($conn, "SELECT * FROM users where email='$email'");
    $affectedRow = mysqli_num_rows($result);
    if ($affectedRow > 0) {
        $error = "User already exists!!";
    } else {
        if($password == $cpassword){
            //hashing password
            $pass= md5($password);
            $sql = "INSERT INTO users(`name`,email,`password`) VALUES ('$name','$email','$pass')";
            $insertUser = mysqli_query($conn,$sql);
            if ($insertUser) {
                $accountCreated="Account Created Sucessfully!! ";
            }
        }
        else{
            $error= "Password Do not Match!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup- Plant Monitoring System</title>
    <!-- Box icons link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/signup_style.css">
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
    if($accountCreated){
        echo '<div id="userExits" 
        style=" padding:5px;
        text-align:center;
        background: lightgreen;
        font-size: large;">'.$accountCreated.'</div>';
    }
    ?>
    <div class="signup-container">
        <h1 style="text-align: center;color: rgb(247, 247, 248);margin-bottom:10px;">Sign Up to your account</h1>
        <p style="text-align: center;color: rgb(247, 247, 248);margin-bottom:10px;">Please fill this form to create an account</a></p>
        <form action="" method="post" onsubmit="return validateUserDetails()" name="frmUserDetails">

            <div class="form-item">
                <label class="form-label" for="name">Username</label>
                <input class="form-control" type="text" name="name" id="name">
                <div class="error" id="name-error">Name field is required and should have 3-20 character</div>
            </div>
            
            <div class="form-item">
                <label class="form-label" for="email">Email Address</label>
                <input class="form-control" type="text" name="email" id="email">
                <div class="error" id="email-error">You have entered an invalid email address. Please try again</div>
            </div>

            <div class="form-item">
                <label for="password">Password</label>
                <div class="password-input">
                <input class="form-control" type="password" name="password" id="password" required >
                <span class="eye-icon" onclick="return PasswordVisibility()"><i class="fa fa-eye"></i></span>
            </div>
            </div>
            <div class="form-item">
                <label for="cpassword">Confirm Password</label>
                <div class="password-input">
                <input class="form-control" type="password" name="cpassword" id="cpassword" required >
                <span class="eye-icon" onclick="return PasswordVisibility()"><i class="fa fa-eye"></i></span>
            </div>
                <div class="error" id="cpassword-error">Your password do not match</div>
            </div>
            
            <div class="form-item">
                <button class="signup-btn" type="submit" id="btn" name="btn">Sign Up</button>
            </div>

            <div>
                <p style="text-align: center;color: rgb(247, 247, 248);">Already have an account? <a href="login.php">Log in</a></p>
            </div>

            <hr>
            <div class="home-link">
                <p style="text-align: center;color: rgb(247, 247, 248);">Go back to <a href="../index.php" style='color:black;'><i class='bx bxs-home'></i></a></p>
            </div>

        </form>
    </div>


    <script>
        function validateUserDetails() {
            var ok = true;

            //retrieving name value and validating
            let name = document.frmUserDetails.name.value;
            let namePattern = /^[A-Za-z\s]{3,20}$/i;
            if (!namePattern.test(name)) {
                ok = false;
                // document.getElemenById('name.error').innerText='Your are wrong';
                document.getElementById('name-error').style = 'display:block';
            }

            //email validation
            let email = document.frmUserDetails.email.value;
            let emailpattern = /^[\w]+([.-\w]+)?@[\w.-]+\.[A-Za-z]{2,6}$/i;
            if (!emailpattern.test(email)) {
                ok = false;
                document.getElementById('email-error').style = 'display:block';
            }

            //confirm-password validation
            let password = document.frmUserDetails.password.value;
            let cpassword = document.frmUserDetails.cpassword.value;
            if (password !== cpassword) {
                ok = false;
                document.getElementById('cpassword-error').style = 'display:block';
            }

            return ok;

        }
        function PasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordInput2 = document.getElementById("cpassword");
            var eyeIcon = document.querySelector(".eye-icon");
  
            if (passwordInput.type === "password" ) 
            {
                passwordInput.type = "text";
                passwordInput2.type='text';
                eyeIcon.classList.add("clicked");
            }
            else
            {
                passwordInput.type = "password";
                passwordInput2.type='text';
                eyeIcon.classList.remove("clicked");
            }
        }

    </script>
</body>

</html>