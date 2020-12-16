<?php
  require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
  // echo "Welcome customer ".$_SESSION['customer_id'];
  $customer_id = $_SESSION['customer_id'];

  $sql = "SELECT * FROM customer where customer_id = '$customer_id'";
    $result = mysqli_query($con,$sql);

    // $row is a dictionary where the keys are the column names of the table
    // $row['customer_id'], $row['firstname'] ... etc
    while ($rows = mysqli_fetch_assoc($result)) {
         $gender = $rows['gender'];
         $fn = $rows['fname'];
         $ln = $rows['lname'];
         $contact_number = $rows['contact_number'];
         $age = $rows['age'];
         // $address
     }

// Testing product
/*
 let $products be the result of your query
*/
$product_query = "SELECT * FROM product";
$all_products = mysqli_query($con, $product_query);

$products = array();

while($product_row = mysqli_fetch_assoc($all_products)){
    $products[] = $product_row;
}


// $products = array(
//   array('product_id' => 1, 'product_name' => 'Logitech mechanical keyboard', 'product_price' => 2500),
//   array('product_id' => 2, 'product_name' => 'ASUS IPS monitor', 'product_price' => 7500),
//   array('product_id' => 3, 'product_name' => 'Razer death adder rgb', 'product_price' => 3500),
//   array('product_id' => 4, 'product_name' => 'Faber Castel', 'product_price' => 250)
// );
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
      <button id="checkout" class="col btn btn-outline-light border-top-0 border-bottom-0 border-right-0 rounded-0 pt-0" style="">
        <p class="m-0">
          <i class="fas fa-shopping-cart"></i>
          <small id="num_of_items"> (0)</small>
          <small class="">  Check out</small>
        </p>
      </button>
      <a href="redeem.php" class="col btn btn-outline-light border-top-0 border-bottom-0 border-right-0 rounded-0 pt-0" style=""><p class="m-0"><small>Redeem </small></p></a>
      <!-- Redirect to customer page edit -->
      <a href="customer_edit.php" class="col btn btn-outline-light border-top-0 border-bottom-0 border-right-0 rounded-0 pt-0" style=""><p class="m-0"><small><?php echo "$fn $ln"; ?></small></p></a>
      <!-- Unset the session first (create a file logout.php in conn folder)
      before you go back to the login pa  ge -->
      <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style=""><p class="m-0"><small>logout</small></p></a>
    </div>
  </div>

  <div class="container mh-100 p-3" style="background: #60a3bc;height:30vh;">
    <div class="h-100 rounded d-flex justify-content-center" style="background: #f39c12;">
      <img src="..\img\logo_500x500.png" alt="" class="h-100" style="border-radius: 50%;">
    </div>
  </div>
  <div class="container mh-100 p-3" style="background: rgba(97, 162, 187, 0.54);">
    <div class="d-flex justify-content-center align-items-center" style="background: #f39c12;height: 5vh;border-radius:20px;">
      <p class="m-0 h3 text-dark"> Products</p>
    </div>
    <div class="d-flex row p-3 mt-3 justify-content-center">
      <!-- See readme how it will be populate -->
      <?php
      // while ($data = mysqli_fetch_assoc($products))
        foreach($products as $record => $data){
       ?>
        <div  class="col-4 m-2 p-3 w-25 flex-column d-flex justify-content-center" style="background: #f39c12;border-radius:10px;">
          <p class="m-0 h5 text-dark text-center h-75 "><?php echo $data['product_name']; ?></p>
          <p class="m-0 text-dark text-center h-25 p-2"><?php echo $data['price']." Php"; ?></p>
          <button id="<?php echo $data['product_id']; ?>"
             type="button" name="button" class="mt-2 btn btn-outline-dark add_to_cart">
            <i class="fas fa-shopping-cart"></i>
            ADD TO CART <small class="quantity" id="0"></small>
          </button>
        </div>
    <?php } ?>
    </div>

  </div>
</body>
</html>
<script type="text/javascript">
// I'm using jquery (search google for what is jquery)
  var cart = []; // an array in which the product_id is being stored
    $(document).ready(function(){
      var add_to_cart_btn = $('.add_to_cart'); // get all the element containg with class name "add_to_cart"
      add_to_cart_btn.click(function(){

        var get_product_id = $(this).attr('id') // get the element id of the specific element being click in the class "add_to_cart"
        // alert(get_product_id); // just for you to know what is id being clicked
        cart.push(get_product_id); // push the product id to the cart array
        //alert(cart); // just for you to know what is inside in the cart array
        $('#num_of_items').html('('+ cart.length +')'); // update cart item number

      var quantity = $(this).children('small').attr('id');
      quantity = Number(quantity) + 1;
      $(this).children('small').attr('id',quantity);
      $(this).children('small').html('x'+quantity);

    });

    var checkout = $('#checkout');
    checkout.click(function(){
      // I'll show you what is $_GET and how it being done in php
      // observe the url in your brower (e.g localhost/website/...)
      var url = '../customer/checkout.php?pid='+cart;
      window.location.replace(url);
    });
  });
</script>
