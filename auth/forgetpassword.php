<?php
session_start();
date_default_timezone_set('Asia/Kathmandu');
$error=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //database connection
    include_once "../partials/_dbconnect.php";
    $email=htmlspecialchars(stripslashes(trim($_POST['email'])));

    //creating $password variable globally
    $password=null;

    //checking if the user exist in our website
    $check_mail_in_db=mysqli_query($conn,"SELECT `email` FROM users WHERE `email`='$email'");
    if(mysqli_num_rows($check_mail_in_db)== 1){
        // including php page to recover password by sending mail
        require_once "../partials/_forgetpassword.php";

        if(isset($_SESSION["password_recovered"])){
            //hashing password before inserting into table
            $pass=md5($password);
            //sql command to set the recoverd and hashed password into db
            $sql = "UPDATE users SET `password`='$pass' WHERE `email`='$email'";
            //executing query
            mysqli_query($conn,$sql);
        }
    }
    else{
        $error= "There is no account linked to this Mail. Please Signup to our website !!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobspark</title>
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
    if(isset($_SESSION['password_recovered'])){
        echo '<div id="userExits" 
        style=" padding:5px;
        text-align:center;
        background: lightgreen;
        font-size: large;">'.$_SESSION['password_recovered'].'</div>';

        //unseting the session after displaying message
        unset($_SESSION['password_recovered']);
    }?>
    <div class="login-container">
        <h1 style="text-align: center;color: rgb(247, 247, 248)" >Forget Password?</h1>
        <p style="text-align: center;color: rgb(247, 247, 248);">Recoverd password? Now <a href="login.php">Log in Here</a></p>
        <form action="" method="post" onsubmit="return validateUserDetails()" name="frmUserDetails">
            <div class="form-item">
                <label class="form-label"  for="email">Email Address</label>
                <input class="form-control" type="text" name="email" id="email" required>
                <div class="error" id="email-error">You have entered an invalid email address. Please try again</div>
            </div>
            
            <div class="form-item">
                <button class="login-btn" type="submit" id="btn" name="btn">Forget Password</button>
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
    </script>
</body>
</html>