<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "123";
$dbname = "points_and_discount";

$con = new mysqli($dbhost,$dbuser,$dbpassword,$dbname);

if(!$con->connect_error){
  die("Connection failed: " . $con->connect_error);

}
echo "Connected successfully";
 ?>
