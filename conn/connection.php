<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "123";
$dbname = "points_and_discount";

$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

if(!$con){
  die("Connection failed: " . $con->connect_error);
}

 ?>
