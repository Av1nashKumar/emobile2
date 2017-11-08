<?php
$id=$_GET['id'];
 require_once("header.php");
if(!(isset($_SESSION["uid"])))
{
echo"<script>alert('you need to login first');";
echo  "window.location='login.php';";
echo"</script>";
}
else{
  if(isset($_POST["submit"]))
  {
require("db.php");
$sql="SELECT * FROM product WHERE pro_id=".$id.";";
  $result=(mysqli_query($conn,$sql));
  $rows=mysqli_fetch_assoc($result);
  $pro_name=$rows['pro_name'];
  $pro_price=$rows['pro_price'];
  $pro_img=$rows['pro_img1'];
  $disc=htmlspecialchars($rows['pro_disc']);
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=test_input($_POST["phone"]);
  $add=$_POST['address'];
  $pin=test_input($_POST["pin_code"]);
  $city=$_POST['city'];
  $state=$_POST['state'];
  $cust_id=$_SESSION['uid'];
$phoneErr= $pinErr="";
  if(!preg_match("/^[0-9]*$/",$phone))
{
  $phoneErr = "Invalid phone number";
echo "<script>alert('".$phoneErr."');";
echo "</script>";
}
if(!preg_match("/^[0-9]*$/",$pin) && (strlen($pin)!= 6))
{
$pinErr = "Invalid pin code";
echo "<script>alert('".$pinErr."');";
echo "</script>";
}
  if($phoneErr=="" && $pinErr=="")
  {
$sql1='INSERT INTO cust_order(cust_id,pro_id,pro_name,pro_price,pro_img,pro_disc,name,phone,email,address,pin_code,city,state) VALUES('.$cust_id.','.$id.',"'.$pro_name.'",'.$pro_price.',"'.$pro_img.'","'.$disc.'","'.$name.'","'.$phone.'","'.$email.'","'.$add.'","'.$pin.'","'.$city.'","'.$state.'");';
if(mysqli_query($conn,$sql1))
{
echo"<script>alert('Order Succesfully Placed. Check My Orders for Details');window.location='index.php';</script>";

}
}
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>
<head>
  <title>E Mobile | Checkout </title>
  <style>
  .form
  {
    padding-left: 15%;
  }
  .c1
  {
    padding-top: 20px;
  }
  .form-control
  {
    border:1px solid black;
    border-radius:0;
    height:50px;
  }
  </style>
</head>
<body>
<div class="container" style="margin-top:30px; margin-bottom:100px;">
  <h2>Checkout</h2><hr><br>
  <form class="form" action="<?php  $id=$_GET['id']; echo $_SERVER['PHP_SELF']."?id=$id"; ?>" method="post">
    <div class="col-sm-10 c1">
      <label class="control-label col-sm-4" required>Name:</label>
      <input type="text" name="name" class="form-control" id="email" placeholder="Enter Name" required>
    </div>
      <div class="col-sm-5 c1">
        <label class="control-label col-sm-2" required>Email:</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
      </div>
      <div class="col-sm-5 c1">
        <label class="control-label col-sm-4" required>Phone no:</label>
        <input type="text" class="form-control" name="phone" placeholder="Enter Phone no." required>
      </div>

      <div class="col-sm-10 c1">
        <label class="control-label col-sm-4" required>Address:</label>
        <input type="text" class="form-control" name="address" placeholder="Enter Address." required>
      </div>
      <div class="col-sm-5 c1">
        <label class="control-label col-sm-4" required>Pin Code:</label>
        <input type="text" class="form-control" name="pin_code" placeholder="Enter Pin Code" required>
      </div>
      <div class="col-sm-5 c1">
        <label class="control-label col-sm-4" required>City:</label>
        <input type="text" class="form-control" name="city" placeholder="Enter City" required>
      </div>
      <div class="col-sm-10 c1">
        <label class="control-label col-sm-4" required>State:</label>
        <input type="text" class="form-control" name="state" placeholder="Enter State" required>
      </div>
      <div class="col-sm-5 c1">
        <br>
        <button type="submit" name="submit" class="btn btn-primary btn-lg" style="width:150px;"> Submit </button>
</div>
    </form>
  </div>
    <?php
    require_once("footer.php");  ?>
</body>
</html>
