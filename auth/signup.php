<?php
date_default_timezone_set('Asia/Kathmandu');
$error = "";
$accountCreated="";
if ($_SERVER["REQUEST_METHOD"]=="POST") {
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
    <link rel="stylesheet" href="../assets/css/login.css">
    <!-- Box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Toast css -->
    <link rel="stylesheet" href="../assets/css/toast.css">
    <title>Sign Up</title>
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
                    <h2>Sign Up to New Account</h2>
                    <p>Welcome !</p>
                </div>
                <div class="input-field">
                    <i class='bx bx-user'></i>
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>
                <div class="input-field">
                    <i class='bx bx-envelope'></i>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-field">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" name="password" id="password" placeholder="New Password" required>
                    <span class="eye-icon" onclick="return PasswordVisibility()"><i class='bx bxs-low-vision'></i></span>
                </div>
                <div class="input-field">
                    <i class='bx bx-lock-alt'></i>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
                    <span class="eye-icon" onclick="return PasswordVisibility()"><i class='bx bxs-low-vision'></i></span>
                </div>
                <div class="right-bottom">
                    <button type="submit" name="submitBtn">Sign Up</button>
                    <p>Already have a account?<a href="login.php">Login</a></p>
                </div>
            </div>
        </form>
     </div>
    <script src="../assets/js/toast.js"></script> 
     <script>
        <?php if ($accountCreated) { ?>
            showToast("<?php echo $accountCreated;?>","success",5000);
        <?php } ?>
        <?php if ($error) { ?>
            showToast("<?php echo $error;?>","danger",5000);
        <?php } ?>
        function PasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordInput2 = document.getElementById("cpassword");
            var eyeIcon = document.querySelectorAll('.eye-icon');
  
            if (passwordInput.type === "password" || passwordInput2.type === "password" ) 
            {
                passwordInput.type = "text";
                passwordInput2.type = "text";
                eyeIcon.forEach((eye)=>{
                    eye.classList.add("clicked");
                })
            }
            else
            {
                passwordInput.type = "password";
                passwordInput2.type = "password";
                eyeIcon.forEach((eye)=>{
                    eye.classList.remove("clicked");
                })
            }
        }
     </script>
</body>
</html>