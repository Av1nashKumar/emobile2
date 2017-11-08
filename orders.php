<!DOCTYPE html>
<html>
<head>
<title>E Mobile | MY ORDERS </title>
<style>
h3,h4
{
  display: inline;
  padding:30px;
}
</style>
</head>
<body>
<?php
require("header.php");
     if(isset($_SESSION['uid']))
     {
   require("db.php");
   $sql ="SELECT order_id,pro_id,pro_name,pro_img,pro_price,pro_disc,order_status,order_time,address,pin_code,city,state FROM cust_order WHERE cust_id=".$_SESSION['uid'].";";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0)
    {
      echo"<div class='container'><center><h1 style='margin-top:200px; text-align:center; '>NO ORDERS TO DISPLAY</h1><br><br>";
      echo"<center><a href='index.php'><button class='btn btn-success btn-lg' style='margin-bottom:200px;'>SHOP NOW</button></a></center></div>";
      require_once("footer.html");
      mysqli_close($conn);
    }
    else {
      echo"<div class='container' style='margin-top:30px;'>";
      while($rows=mysqli_fetch_assoc($result))
      {
          $name=$rows['pro_name'];
            echo"<div class='jumbotron'><div class='row'>";
          echo"<div class='col-sm-2' ><img class='img img-responsive' style='height:150px;' src='images/".$rows['pro_img']."'></div>";
          echo"<div class='col-sm-4' ><h2>".$rows['pro_name']."</h2><br><h3>PRICE: Rs ".number_format($rows['pro_price'])."</h3></div>";
          echo"<div class='col-sm-4' ><h3>Order Placed On:".date( "m/d/Y", strtotime($rows['order_time']))."</h3><br><h3>STATUS : ".$rows['order_status']."</h3></div>";
          echo"<div class='col-sm-2' ><a href='cancel.php?id=$rows[order_id]'><button class='btn btn-warning btn-lg' >CANCEL ORDER</button></a><br><br></div></div>";
          echo"<div class='row'><div class=col-sm-12 style='padding-top:30px;'><h2 style='text-align:center;'>Shipping Address:</h2><br><br><h3>Street Address : ".$rows['address']."</h3><br><br>";
          echo "<h3>City : ".$rows['city']."</h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3>State : ".$rows['state']."</h3>&nbsp;&nbsp;<h3>Pin Code : ".$rows['pin_code']."</h3><br></div></div></div>";
    }
    mysqli_close($conn);
    echo "</div></div>";
    require_once('footer.php');
}
}
else {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
    ?>
