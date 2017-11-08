<!DOCTYPE html>
<html>
<head>
<title>E Mobile | CART </title>
</head>
<body>
<?php
require("header.php");
     if(isset($_SESSION['uid']))
     {
   require("db.php");
   $sql ="SELECT product.pro_id, product.pro_name, product.pro_img1, product.pro_price, product.pro_disc, cart.pro_id FROM product INNER JOIN cart ON product.pro_id = cart.pro_id WHERE cart.cust_id = ".$_SESSION['uid']." ;";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) < 1)
    {
      echo"<div class='container'><center><h1 style='margin-top:200px; text-align:center; '>NO ITEM IN CART</h1><br><br>";
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
          echo"<div class='col-sm-4' ><img class='img img-responsive' style='height:250px;' src='images/".$rows['pro_img1']."'></div>";
          echo"<div class='col-sm-6' ><h2>".$rows['pro_name']."</h2><br><h3>PRICE: Rs ".number_format($rows['pro_price'])."</h3></div>";
          echo"<div class='col-sm-2' ><a href='remove.php?id=$rows[pro_id]'><button class='btn btn-warning btn-lg' style='width:150px;'>Remove</button></a><br><br>";
          echo "<a href='checkout.php?id=$rows[pro_id]'><button class='btn btn-success btn-lg' style='width:150px;'>BUY NOW</button></a></div></div></div>";
    }
    mysqli_close($conn);
    echo "</div>";
    require_once('footer.php');
}
}
else {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
    ?>
