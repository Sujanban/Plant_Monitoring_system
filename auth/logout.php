<?php
session_start();
require_once  "../partials/_dbconnect.php";
mysqli_query($conn,"UPDATE users SET cookieToken=NULL WHERE id=".$_SESSION['userData']['id']);
setcookie('cookieToken',NULL,time()-(60*60));
session_unset();
session_destroy();
header("Location: ../index.php");
exit;
?>