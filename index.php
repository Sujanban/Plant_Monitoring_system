<?php
session_start();
if (!isset($_SESSION['userData']) && $_SESSION['loggedin'] != true) {
    header("Location: ./auth/login.php");
} else {
    $user_id=$_SESSION['userData']['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>This is the index file</h1>
    <br><br>
    <h1>Hello <?php echo $_SESSION['userData']['name'];?></h1>
    <hr>
    <a href="./auth/logout.php"><button>Logout</button></a>
</body>
</html>