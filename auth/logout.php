<?php
session_start();
require_once  "../partials/_dbconnect.php";
session_unset();
session_destroy();
header("Location: ../index.php");
exit;