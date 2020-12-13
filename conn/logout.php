<?php
session_start();
$_SERVER['DOCUMENT_ROOT']."Website/conn/connection.php";
if(isset($_SESSION['customer_id'])){
    unset($_SESSION['customer_id']);
}
header("Location: \\Website\\login.php");
die;

 ?>
