<?php
require("connection.php");
echo "Welcome customer ".$_SESSION['customer_id'];
$customer_id = $_SESSION['customer_id'];

$sql = "SELECT * FROM customer where customer_id = '$customer_id'";
    $result = mysqli_query($con,$sql);

    while($row = $result->fetch_assoc()) {
    echo "id: " . $row["customer_id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }





 ?>
