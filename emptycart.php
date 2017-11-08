<?php
session_start();
require_once("db.php");
$id=$_SESSION['uid'];
$sql="DELETE FROM cart WHERE cust_id=".$id.";";
if(mysqli_query($conn,$sql))
{ $_SESSION['total']=0;
  $_SESSION['items']=0;
  mysqli_close($conn);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

 ?>
