<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
$customer_id = $_SESSION['customer_id'];
$sql = "SELECT * FROM customer where customer_id = '$customer_id'";
$result = mysqli_query($con,$sql);

 ?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Customer | Edit</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body class="h-100">
  <!-- Header -->
  <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #c0392b !important;">
    <a href="..\customer\index.php" class="col-7"><img src="..\img\logo_250x250.png" alt="logo" class="h-100" style=""></a>
    <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
      <p class="col"></p>
      <!-- Redirect to customer page edit -->
      <a href="index.php" class="col btn btn-outline-light border-top-0 border-bottom-0 border-right-0 rounded-0 pt-0" style=""><p class="m-0"><small>Customer Name</small></p></a>
      <!-- Unset the session first (create a file logout.php in conn folder)
      before you go back to the login page -->
      <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style=""><p class="m-0"><small>logout</small></p></a>
    </div>
  </div>
  <div class="container h-100 p-3" style="background: #60a3bc;">
    <div class="h-auto rounded p-3" style="background: #f39c12;">
      <p class="h5">Customer profile</p>
      <form class="" action="Website\conn\customer_profile.php" method="post">
        <?php while ($rows = mysqli_fetch_assoc($result)) {
             $gender = $row['gender'];
             $fn = $row['fname'];
             $ln = $row['lname'];
             $contact_number = $row['contact_number'];
             $age = $row['age'];
             // $address
         }
        ?>

        <div class="input-group mb-3 w-50">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Firstname</span>
          </div>
          <input type="text" name="fn" placeholder="<?php echo "$fn"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3 w-50">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Lastname</span>
          </div>
          <input type="text" name="ln" placeholder="<?php echo "$ln"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3 w-50">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Gender</span>
          </div>
          <!-- SELECT -->
          <select name="Gender" class="form-select">
          <?php
            if($gender == 1){
              ?><option value="1">Male</option><?php
            }else{
              ?><option value="2">Female</option><?php
            }
           ?>
           </select>
        </div>
        <div class="input-group mb-3 w-50">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Contact number</span>
          </div>
          <input type="text" name="contact_number" placeholder="<?php echo "$contact_number"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3 w-50">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Age</span>
          </div>
          <input type="text" name="age" placeholder="<?php echo "$age"; ?>" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
      </form>
    </div>
    <div class="h-auto rounded p-3 mt-3" style="background: #f39c12;">

      <form class="" action="\Website\conn\claim_card.php" method="post">
      <div class="d-flex flex-row justify-content-around">
        <p class="h5 col">Card</p>
        <button class="col-2 btn btn-outline-dark"><i class="far fa-credit-card"></i name="claim_card">  Claim Card</button>
      </div>
      </form>

      <div class="d-flex flex-row">
        <div id="card id here" class="border border-dark m-2 p-3 w-25 flex-column d-flex justify-content-center"
        style="background: #f39c12;border-radius:10px;">
          <p>Card ID #</p>
          <p>Card Points: </p>
        </div>
        <div id="card id here" class="border border-dark m-2 p-3 w-25 flex-column d-flex justify-content-center"
        style="background: #f39c12;border-radius:10px;">
          <p>Card ID #</p>
          <p>Card Points: </p>
        </div>
      </div>

    </div>
    <div class="h-auto rounded p-3 mt-3" style="background: #f39c12;">
      Purchase history here
      <div class="">
        <div class="border border-dark">
          <p>Reciept #</p>
          <p>Purchase Information here</p>
          <p>TTL Amount</p
        </div>
      </div>
    </div>
  </div>
</body>
</html>
