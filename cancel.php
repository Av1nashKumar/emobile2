<?php
session_start();
$id=$_GET['id'];
require('db.php');
$sql="DELETE FROM cust_order WHERE order_id=".$id." AND cust_id=".$_SESSION['uid'].";";
if(mysqli_query($conn,$sql))
{
  echo"<script>alert('Order Successfully Canceled');";
  echo"window.location='orders.php';</script>";
}

?>
