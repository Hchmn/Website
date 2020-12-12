<?php
require("connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM customer WHERE username LIKE '$username' AND
    password LIKE '$password'";
  $result = mysqli_query($con,$sql);

  //test if data exists
  if($result && mysqli_num_rows($result) > 0){
      $user_data = mysqli_fetch_assoc($result);

      //SESSION key holder identity
      $_SESSION['customer_id'] = $user_data['customer_id'];
      header("Location: \\Website\\customer\\index.php");
      die;

  }




}











 ?>
