<?php
$email=$pwd="";
if(isset($_POST["submit"]))
{
include_once("db.php");
$email=test_input($_POST["email"]);
$pwd=test_input($_POST["pwd"]);
$sql="select cust_id,cust_name,cust_email,cust_pwd from customer where cust_email='".$email."';";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)<=0)
    { echo"<script>";
      echo "alert('Invalid email or password');";
			echo "</script>";
    }
    else
      {
        if($rows["cust_pwd"]==$pwd)
        {
          session_start();
          $total=0;
          $items=0;
        $_SESSION['uid']=$rows["cust_id"];
          $_SESSION['u_name']=$rows["cust_name"];
          include_once("db.php");
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
          header("location:index.php");

        }
        else
          {
						echo"<script>";
				      echo "alert('Invalid password');";
							echo "</script>";
          }
}

  mysqli_close($conn);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
require_once("header.php");
?>
<html>
<head>
	<title>E Mobile | Login </title>
</head>
<body>
<div class="container">
		<div class="account">
		<h1>Account</h1>
		<div class="account-pass">
		<div class="col-md-8 account-top">
			<form method="post" action="">

			<div>
				<span>Email</span>
				<input type="email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div>
				<span >Password</span>
				<input type="password" name="pwd" required>
			</div>
				<input type="submit" value="Login" name="submit">
			</form>
		</div>
		<div class="col-md-4 left-account ">
			<a href="single.html"><img class="img-responsive " src="images/s1.jpg" alt=""></a>
			<div class="five">
			<h2>25% </h2><span>discount</span>
			</div>
			<a href="register.php" class="create">Create an account</a>
<div class="clearfix"> </div>
		</div>
	<div class="clearfix"> </div>
	</div>
	</div>

</div>

<?php
require("footer.php");  ?>
</body>
</html>
