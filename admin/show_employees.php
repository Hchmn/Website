<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
$admin = $_SESSION['admin_id'];

$sql = "SELECT * FROM admin where admin_id = '$admin'";
$result = mysqli_query($con,$sql);
$employee_id = 0;
while ($rows = mysqli_fetch_assoc($result)) {
    $employee_id = $rows['employee_id'];
 }


$sql = "SELECT * FROM employee where employee_id = '$employee_id'";
$result = mysqli_query($con, $sql);

while ($rows = mysqli_fetch_assoc($result)) {
  $fname = $rows['fname'];
  $lname = $rows['lname'];
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
   <style type="text/css">
     /* h1{
       border-collapse: collapse;
       width: 100%;
       color: #d96459;
       font-family: monospace;
       font-size: 25px;
       text-align: center;

     } */
     table {
       border-collapse: collapse;
       width: 100%;
       color: #d96459;
       font-family: monospace;
       font-size: 25px;
       text-align: left;
     }
     th{
       background-color: #588c7e;
       color: white;
     }

   </style>
 </head>
 <body class="h-100" style="background: rgb(251, 251, 251);">
   <!-- Header -->
   <div class="container-fluid border border-danger d-flex flex-row" style="height:50px;background: #c0392b !important;">
     <a href="..\customer\index.php" class="col-7"><img src="..\img\logo_250x250.png" alt="logo" class="h-100" style=""></a>
     <div class="col-5 d-flex flex-row pt-2 pb-2 justify-content-end">

       <!-- Redirect to customer page edit -->
       <a href="admin_index.php" class="col btn btn-outline-light border-top-0 border-bottom-0 border-right-0 rounded-0 pt-0" style=""><p class="m-0"><small><?php echo "$fname $lname"; ?></small></p></a>
       <!-- Unset the session first (create a file logout.php in conn folder)
       before you go back to the login pa  ge -->
       <a href="\Website\conn\logout.php" class="col btn btn-outline-light border-top-0 border-bottom-0 rounded-0 pt-0" style=""><p class="m-0"><small>logout</small></p></a>
     </div>
   </div>

   <div class="container mh-100 p-3" style="background: #588c7e;height:30vh;">
     <!-- <div class="h-100 rounded d-flex justify-content-center" style="background: #f39c12;"> -->
       <!-- <img src="..\img\logo_500x500.png" alt="" class="h-100" style="border-radius: 50%;"> -->
       <table>
         <tr>
           <th>Employee Id</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Age</th>
           <th>Gender</th>

           <th>Contact Number</th>
           <th>Shift</th>
         </tr>
         <?php
           $sql = "SELECT employee_id, fname, lname, age, gender, contact_number, shift from  employee";
           $result = mysqli_query($con,$sql);

           while ($rows = mysqli_fetch_assoc($result)) {
             echo "<tr><td>" . $rows["employee_id"] . "</td> <td>" . $rows["fname"] . "</td> <td>" . $rows["lname"] . "<t/d>
             <td>" . $rows["age"] . "</td><td>" . $rows["gender"] . "</td><td>" . $rows["contact_number"] . "</td>
             <td>" . $rows["shift"] . "</td></tr>";

           }
           echo "<table/>";
          ?>
       </table>
     </div>





 </body>
 </html>
