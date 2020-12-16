<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $contact_number = $_POST['contact_number'];

    $sql = "INSERT INTO employee VALUES(NULL,'$fname','$lname', '$age','$gender',
      '$contact_number',NOW(), '$position')";

    mysqli_query($con,$sql);
    header("Location: \\Website\\admin\\show_employees.php");
    die;

}













 ?>
