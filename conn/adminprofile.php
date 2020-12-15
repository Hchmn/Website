<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $admin_id = $_SESSION['admin_id'];

  // echo "$customer_id <br>";
  // echo "$fname <br>";
  // echo "$lname <br>";
  // echo "$contact_number <br>";
  // echo "$age <br>";
  // echo "$gender <br>";
  $sql = "SELECT * FROM admin where admin_id = '$admin_id'";
  $result = mysqli_query($con,$sql);
  $employee_id = 0;

  while ($rows = mysqli_fetch_assoc($result)) {
      $employee_id = $rows['employee_id'];
   }
   $fname = $_POST['fn'];
   $lname = $_POST['ln'];
   $contact_number = $_POST['contact_number'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];

   echo "$employee_id <br>";
   echo "$fname <br>";
   echo "$lname <br>";
   echo "$contact_number <br>";
   echo "$age <br>";
   echo "$gender <br>";

  $sql = "UPDATE employee set fname = '$fname', lname = '$lname', contact_number = '$contact_number'
  , age = '$age', gender = '$gender' where employee_id = '$employee_id'";

  mysqli_query($con,$sql);
  header("Location: \\Website\\admin\\admin_edit.php");
  die;
}






 ?>
