<?php

  require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
  echo "Welcome customer ".$_SESSION['customer_id'];
  $customer_id = $_SESSION['customer_id'];

  $sql = "SELECT * FROM customer where customer_id = '$customer_id'";
    $result = mysqli_query($con,$sql);

    // $row is a dictionary where the keys are the column names of the table
    // $row['customer_id'], $row['firstname'] ... etc
    while($row = $result->fetch_assoc()) {
    echo "id: " . $row["customer_id"]. " - Name: " . $row["fname"]. " " . $row["lname"]. "<br>";
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>N & N store | Customer</title>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body class="h-100" style="background: rgb(251, 251, 251);">
  <div class="container-fluid border border-danger d-flex flex-row" style="height:5vh;background: #c0392b !important;">
    <a href="..\customer\index.php" class="col-7"><img src="..\img\logo_250x250.png" alt="logo" class="h-100" style=""></a>
    <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
      <!-- Redirect to checkout page edit -->
      <a href="#" class="col btn btn-outline-light border-top-0 border-bottom-0 border-right-0 rounded-0 pt-0" style="">
        <p class="m-0"><i class="fas fa-shopping-cart"></i><small class="">  Check out</small></p></a>
      <!-- Redirect to customer page edit -->
      <a href="#" class="col btn btn-outline-light border-top-0 border-bottom-0 border-right-0 rounded-0 pt-0" style=""><p class="m-0"><small>Customer Name</small></p></a>
      <!-- Unset the session first (create a file logout.php in conn folder)
      before you go back to the login page -->
      <a href="#" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style=""><p class="m-0"><small>logout</small></p></a>
    </div>
  </div>
  <div class="container mh-100 p-3" style="background: #60a3bc;height:30vh;">
    <div class="h-100 rounded d-flex justify-content-center" style="background: #f39c12;">
      <img src="..\img\logo_500x500.png" alt="" class="h-100" style="border-radius: 50%;">
    </div>
  </div>
  <div class="container mh-100 p-3" style="background: rgba(97, 162, 187, 0.54);">
    <div class="d-flex justify-content-center align-items-center" style="background: #f39c12;height: 5vh;border-radius:20px;">
      <p class="m-0 h3 text-dark">Products</p>
    </div>
    <div class="d-flex row p-3 mt-3 justify-content-center">
      <!-- See readme how it will be populate -->
      <?php
        for($i = 0; $i < 10; $i++){
       ?>
        <div id="product id here" class="col-4 m-2 p-3 w-25 flex-column d-flex justify-content-center" style="background: #f39c12;border-radius:10px;">
          <p class="m-0 h5 text-dark text-center">Products name</p>
          <p class="m-0 text-dark text-center">Product Price</p>
          <button type="button" name="button" class="mt-5 btn btn-outline-dark ">
            <i class="fas fa-shopping-cart"></i>
            ADD TO CART
          </button>
        </div>
    <?php } ?>
    </div>

  </div>
</body>
</html>
