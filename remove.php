<?php
session_start();
$id=$_GET['id'];
require('db.php');
$sql="DELETE FROM cart WHERE cart_pro_id=".$id." AND cust_id=".$_SESSION['uid'].";";
if(mysqli_query($conn,$sql))
{
  $total=0;
  $items=0;
  $sql1="SELECT cust_id,sum(pro_price),count(pro_price) FROM cart WHERE cust_id=".$_SESSION['uid']." GROUP BY cust_id ;";
  $result=mysqli_query($conn,$sql1);
  $rows=mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)>0)
  {
    $total=$rows['sum(pro_price)'];
    $items=$rows['count(pro_price)'];
  }
$_SESSION['total']=$total;
$_SESSION['items']=$items;
echo"<script>alert('1 Item Removed From Cart');";
echo"window.location='cartview.php';</script>";
}

?>
