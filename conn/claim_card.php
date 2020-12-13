<?php
 require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $customer_id = $_SESSION['customer_id'];

   $sql = "INSERT INTO customer_card VALUES (NULL, NOW(), '1', '0', '$customer_id')";

   mysqli_query($con,$sql);

   header("Location: \\Website\\customer\\customer_edit.php");
   die;
 }







 ?>
