<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $customer_id = $_SESSION['customer_id'];

  $get_card = "SELECT * FROM customer_card WHERE customer_id = '$customer_id'";
  $result = mysqli_query($con, $get_card);
  $card_id = 0;
  $counter = 0;
  $points = 0;

  while($rows = mysqli_fetch_assoc($result) and $counter < 1){
    $card_id = $rows['card_id'];
    $counter = $counter + 1;
    $points = $rows['total_points'];
  }

  $total_amount = $_POST['total_amount'];
  if($points >= $total_amount){
    $redeem_rewards = "INSERT INTO redeem_rewards VALUES (NULL,'$card_id', '$total_amount', NOW())";
        mysqli_query($con,$redeem_rewards);

    $update_points = "UPDATE customer_card SET total_points = total_points - '$total_amount '
        WHERE card_id = '$card_id'";
        mysqli_query($con,$update_points);
        header("Location: \\Website\\customer\\redeem.php");
        die;

  }
  else {
    echo "not enough points";
    header("Location: \\Website\\customer\\redeem.php");
    die;
  }

}

 ?>
