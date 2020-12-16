<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $admin = $_SESSION['admin_id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $contact_number = $_POST['contact_number'];

    $sql = "INSERT INTO employee VALUES(NULL,'$fname','$lname', '$age','$gender',
      '$contact_number',NOW(), '$position')";
    mysqli_query($con,$sql);

    $description = "Adding Employee";
    $sys_log = "INSERT INTO sys_log VALUES (NULL, NOW(), '$admin', '$description')";
    mysqli_query($con,$sys_log);
    header("Location: \\Website\\admin\\show_employees.php");
    die;
}













 ?>
