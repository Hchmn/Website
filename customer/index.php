<?php
  require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
  echo "Welcome customer ".$_SESSION['customer_id'];
  $customer_id = $_SESSION['customer_id'];

  $sql = "SELECT * FROM customer where customer_id = '$customer_id'";
    $result = mysqli_query($con,$sql);

    // $row is a dictionary where the keys are the column names of the table
    // $row['customer_id'], $row['firstname'] ... etc
    while($row = $result->fetch_assoc()) {
    echo "id: " . $row["customer_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }

 ?>
