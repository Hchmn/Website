<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $customer_id = $_SESSION['customer_id'];
  $fname = $_POST['fn'];
  $lname = $_POST['ln'];
  $contact_number = $_POST['contact_number'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];

  // echo "$customer_id <br>";
  // echo "$fname <br>";
  // echo "$lname <br>";
  // echo "$contact_number <br>";
  // echo "$age <br>";
  // echo "$gender <br>";

  $sql = "UPDATE customer set fname = '$fname', lname = '$lname', contact_number = '$contact_number'
  , age = '$age', gender = '$gender' where customer_id = '$customer_id'";

  mysqli_query($con,$sql);
  header("Location: \\Website\\customer\\customer_edit.php");
  die;
}






 ?>
