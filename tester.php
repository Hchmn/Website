<div class="list_of_product">

 <?php
 $sql = "SELECT * FROM product";

 $products = mysqli_query($con,$sql);
 $counter = 0;
 $total = 0;
 // I think buhat ko dres if statement to test if naa bai sulod ang product_id nga gi check_out
 while($rows = mysqli_fetch_assoc($products) and $counter < count($output))

   {
   foreach ($output as $id => $value) {
       if ($id == $rows['product_id'])
       {
         $id = $rows['product_id'];
         $product_name = $rows['product_name'];
         $product_price = $rows['price'];
         $product_quantity = $value;
         $total_product_price = ($product_quantity * $product_price);
       }
   }
?>
  <div class="border h-auto rounded p-3 d-flex flex-row text-center" style="background: #f39c12;">
    <input type="hidden" name="product_id[]" value="<?php echo "$id";?>">
    <input type="hidden" name="product_quantity[]" value="<?php echo "$product_quantity";?>">
    <input type="hidden" name="product_price[]" value="<?php echo "$product_price";?>">
    <p class="col m-2"><?php echo $product_name;?></p>
    <p class="col m-2"><?php echo $product_price;?></p>
    <p class="col m-2"><?php echo $product_quantity;?></p>
    <p class="col m-2"><?php echo $total_product_price;?></p>
  </div>
 <?php
$counter++;
$total = $total + $total_product_price;
}
  ?>
  if(count($output) > 0){

    foreach($output as $id => $value){
      $sql = "SELECT * FROM purchase where purchase_id = $id";
      $result = mysqli_query($con, $sql);

      while ($rows = mysqli_fetch_assoc($result)) {
        $id = $rows['product_id'];
        $product_name = $rows['product_name'];
        $product_price = $rows['price'];
        $product_quantity = $value;
        ?>
<div class="border h-auto rounded p-3 d-flex flex-row text-center" style="background: #f39c12;">
    <input type="hidden" name="product_id[]" value="<?php echo "$id";?>">
    <input type="hidden" name="product_quantity[]" value="<?php echo "$product_quantity";?>">
    <input type="hidden" name="product_price[]" value="<?php echo "$product_price";?>">
    <p class="col m-2"><?php echo $product_name;?></p>
    <p class="col m-2"><?php echo $product_price;?></p>
    <p class="col m-2"><?php echo $product_quantity;?></p>
    <p class="col m-2"><?php echo $total_product_price;?></p>
    </div>
  <?php
  } ?>
}
}
