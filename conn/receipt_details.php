<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $customer_id = $_SESSION['customer_id'];

  $get_card = "SELECT * FROM customer_card WHERE customer_id = '$customer_id'";
  $result = mysqli_query($con, $get_card);
  $card_id = 0;
  $counter = 0;
  while($rows = mysqli_fetch_assoc($result) and $counter < 1){
    $card_id = $rows['card_id'];
    $counter = $counter + 1;
  }
  $type_id = 1;
  $get_employee = "SELECT * FROM employee";
  $employee_result = mysqli_query($con,$get_employee);
  $employee_id = NULL;

  while($rows = mysqli_fetch_assoc($employee_result)) {
      if($type_id == $rows['emp_type_id']){
      $employee_id = $rows['employee_id'];
      }
  }

  $total_amount = $_POST['total_amount'];
  $discount = $total_amount * 0.05;
  $paid_amount = $_POST['amount_paid'];
  $points_earned = 50;

  $query = "INSERT INTO receipt_details VALUES (NULL, NOW(),'$total_amount', '$discount', '$paid_amount', '$points_earned',
            '$customer_id', '$card_id', '$employee_id')";

  $update_points = "UPDATE customer_card set total_points = total_points + '$points_earned ' WHERE card_id =
                      '$card_id'";

  mysqli_query($con,$update_points);
  mysqli_query($con,$query);
  
  //
  // $receipt_detail = "SELECT * FROM receipt_details";
  // $result = mysqli_query($con,$receipt_detail);
  //
  // $receipt_id = 0;
  // while($row = mysqli_fetch_assoc($result)){
  //   $receipt_id = $row['receipt_id'];
  // }
  //
  // $product_id = $_POST['product_id[]'];
  // $list_product_purchased = "INSERT INTO list_product_purchased VALUES ('$receipt_id','$product_id')";
  // mysqli_query($con,$list_product_purchased);

  header("Location: \\Website\\customer\\checkout.php");
  die;
}

 ?>
