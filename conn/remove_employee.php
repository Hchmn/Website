<?php
require($_SERVER['DOCUMENT_ROOT']."/Website/conn/connection.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$admin_id = 2;
$admin = $_SESSION['admin_id'];
$employee_id = $_POST['employee'];

$type_id = 1;
$get_employee = "SELECT * FROM employee where employee_id = '$employee_id'";
$get_result = mysqli_query($con,$get_employee);

$count = 0;
while($rows = mysqli_fetch_assoc($get_result)){
  if($rows['emp_type_id'] == $type_id){
    $count = 0;

    $query = "SELECT * FROM employee where emp_type_id = '$type_id'";
    $emp_result = mysqli_query($con,$query);

    while ($row = mysqli_fetch_assoc($emp_result)) {
        $count = $count + 1;
    }

  if($employee_id != 2 and $count > 1 ){
    $update = "UPDATE receipt_details set employee_id = '$admin_id' where employee_id = '$employee_id'";
    mysqli_query($con,$update);

    $description = "Removing Employee";
    $sys_log = "INSERT INTO sys_log VALUES(NULL, NOW(), '$admin', '$description')";
    mysqli_query($con,$sys_log);

    $sql = "DELETE FROM employee where employee_id = '$employee_id'";
    mysqli_query($con,$sql);
    }
  }

  elseif ($employee_id != 2) {

    $description = "Removing Employee";
    $sys_log = "INSERT INTO sys_log VALUES(NULL, NOW(), '$admin', '$description')";
    mysqli_query($con,$sys_log);
    $sql = "DELETE FROM employee where employee_id = '$employee_id'";
    mysqli_query($con,$sql);

  }
}
header("Location: \\Website\\admin\\show_employees.php");
die;
}
 ?>
