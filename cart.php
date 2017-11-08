<?php
session_start();
$id=$_GET['id'];
if(!(isset($_SESSION["uid"])))
{
echo"<script>alert('you need to login first');";
echo  "window.location='login.php?id=$id';";
echo"</script>";
}
else {
  $total=0;
  $items=0;
  $id=$_GET['id'];
  require("db.php");
  $sql2="SELECT pro_price FROM product WHERE pro_id=".$id.";";
  $result2=(mysqli_query($conn,$sql2));
  $rows2=mysqli_fetch_assoc($result2);
  $price=$rows2['pro_price'];
  $sql="INSERT INTO cart(cust_id,pro_id,pro_price) VALUES(".$_SESSION['uid'].",".$id.",".$price.");";
  if(mysqli_query($conn,$sql))
  {
    $sql1="SELECT cust_id,sum(pro_price),count(pro_price) FROM cart WHERE cust_id=".$_SESSION['uid']." GROUP BY cust_id ;";
    $result=mysqli_query($conn,$sql1);
    $rows=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0)
    {
      $total=$rows['sum(pro_price)'];
      $items=$rows['count(pro_price)'];
    }
  }
$_SESSION['total']=$total;
$_SESSION['items']=$items;
mysqli_close($conn);
header("location:single.php?id=$id&price=price");
}
?>
