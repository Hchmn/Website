# Customer view
  - Show user data
  - Edit user data
  - Claim user card
  - Make purchases
  - Purchase history
  - View the product sell in the store
  - Claim redeemable products
  - card data



# Population of html tags using php
  1. Query all products
  2. Inside the while loop paste the html tags you wanted to populate.

### sample code snippet
```
<?php
  $sql = "SELECT * FROM product";
  $all_products = mysqli_query($con, $sql);

  while($product_data = mysqli_fetch_assoc($all_products)){
?>
  <div id="product id here" class="col-4 m-2 p-3 w-25 flex-column products" style="background: #f39c12;border-radius:10px;">
    <p class="m-0 h5 text-dark text-center"><?php echo $product_data['product_name'];?></p>
    <p class="m-0 text-dark"><?php echo $product_data['product_price'];?></p>
  </div>
<?php
  }
?>
```
