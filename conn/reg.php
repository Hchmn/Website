<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];

    $sql = "INSERT INTO customer VALUES(NULL,'$fname','$lname','$username','$password','$age','$gender',
      '$contact_number', NOW())";

    mysqli_query($con,$sql);
    header("Location: \\Website\\login.php");
    die;
}













 ?>
