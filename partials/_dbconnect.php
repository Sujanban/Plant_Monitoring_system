<?php
$host='localhost';
$user='root';
$pass='';
$db='plant_db';
$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn){
    echo mysqli_connect_error();
}
