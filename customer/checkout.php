<?php
  $product_id = $_GET['pid']; // get the passed paramenter from the index page named "pid";
  // just delete or comment out this lines below
  echo $product_id; // just to show the value
  echo "<br />";
  echo gettype($product_id); // notice that it's datatype is in string not in array.
  print("<br />");
  // to convert string to array
  $cart_items = explode(',',$product_id);
  print_r($cart_items);
  print("<br />");
  print(gettype($cart_items));
  // --- end
  /*
    algorithm:
      if you notice you can click(add to cart) multiple times in a product
      resulting the product_id will gradually push to the cart.
      Then the result of the cart array will be
      [1,2,2,2,3,3,3,3]

      //lis
      filter it out so that you know the quantity of the
      product being purchase by the customer

      the output should be in a array
      $output = array(
       array('product_id' => 1, 'quantity' => 1),
       array('product_id' => 2, 'quantity' => 3),
       array('product_id' => 3, 'quantity' => 4)
     );

   */
   require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
   $customer_id = $_SESSION['customer_id'];
   $sql = "SELECT * FROM customer where customer_id = '$customer_id'";
   $result = mysqli_query($con,$sql);
   while ($rows = mysqli_fetch_assoc($result)) {
        $gender = $rows['gender'];
        $fn = $rows['fname'];
        $ln = $rows['lname'];
        $contact_number = $rows['contact_number'];
        $age = $rows['age'];
        // $address
    }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Customer | Dashboard</title>
   	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
 </head>
 <body class="h-100" style="background: rgb(251, 251, 251);">
   <!-- Header -->
   <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #c0392b !important;">
     <a href="..\customer\index.php" class="col-7"><img src="..\img\logo_250x250.png" alt="logo" class="h-100" style=""></a>
     <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">
       <!-- Redirect to checkout page edit -->
       <a href="index.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0"><p class="m-0"><small>Home</small></p></a>
       <!-- Redirect to customer page edit -->
       <a href="customer_edit.php" class="col btn btn-outline-light border-top-0 border-bottom-0 border-right-0 rounded-0 pt-0" style=""><p class="m-0"><small><?php echo "$fn $ln";?></small></p></a>
       <!-- Unset the session first (create a file logout.php in conn folder)
       before you go back to the login page -->
       <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style=""><p class="m-0"><small>logout</small></p></a>
     </div>
   </div>
   <div class="container h-100 p-3" style="background: #60a3bc;">
     <div class="h-auto rounded p-3 d-flex flex-row text-center" style="background: #f39c12;">
       <p class="col m-2">Product Name</p>
       <p class="col m-2">Price</p>
       <p class="col m-2">Quantity</p>
       <p class="col m-2">Price</p>
     </div>
     <form class="" action="" method="post">
       <div class="list_of_product">
         <?php  ?>
         <div class="border h-auto rounded p-3 d-flex flex-row text-center" style="background: #f39c12;">
           <input type="hidden" name="product_id[]" value="product_id">
           <input type="hidden" name="product_quantity[]" value="product_quantity">
           <input type="hidden" name="product_price[]" value="product_price">
           <p class="col m-2">Product name 1</p>
           <p class="col m-2">1500</p>
           <p class="col m-2">2</p>
           <p class="col m-2">3000</p>
         </div>
         <?php  ?>
       </div>
       <div class="h-auto rounded p-3 d-flex flex-row text-center" style="background: #f39c12;">
         <p class="col m-2"></p>
         <p class="col m-2"></p>
         <p class="col m-2">Total amount:</p>
         <p class="col m-2">3000</p>
       </div>
       <div class="h-auto rounded p-3 d-flex flex-row text-center" style="background: #f39c12;">
         <p class="col m-2">Cash</p>
         <input type="text" name="ammount_paid" value="" class="col" placeholder="Input your cash" required>
         <button type="submit" class="btn btn-dark" name="button">Purchase</button>
       </div>
     </form>
     </div>

   </div>
</body>
</html>
