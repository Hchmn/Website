<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $username = $_POST['username'];
  $password = $_POST['password'];


  $sql = "SELECT * FROM admin WHERE username LIKE '$username' AND
    password LIKE '$password'";
  $result = mysqli_query($con,$sql);

  //test if data exists
  if($result && mysqli_num_rows($result) > 0){
      $user_data = mysqli_fetch_assoc($result);

      //SESSION key holder identity
      $_SESSION['admin_id'] = $user_data['admin_id'];
      header("Location: \\Website\\admin\\admin_index.php");
      die;

  }

  else {
    $_SESSION['ERROR 1'] = 1;
    header("Location: \\Website\\admin.php");
    die;
  }




}











 ?>
