<?php
$nameErr = $pwdErr = $phoneErr = $emailErr="";
$name = $email = $pwd = $phone = $repwd = "";

if (isset($_POST["submit"])) {
	include_once("db.php");
    $name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$pwd = test_input($_POST["pwd"]);
		$repwd = test_input($_POST["re_pwd"]);
		$phone=test_input($_POST["ph_no"]);

		$sql="select cust_email,cust_pwd from customer where cust_email='".$email."';";
		$result=mysqli_query($conn,$sql);
		$rows=mysqli_fetch_assoc($result);
		    if(mysqli_num_rows($result)!=0)
		    {$emailErr="Email Already Registered";
					echo"<script>";
		      echo "alert('".$emailErr."');";
					echo "</script>";
		    }

    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
			echo "<script>alert('Invalid Name : ".$nameErr."');";
			echo "</script>";
    }
		if(!preg_match("/^[0-9]*$/",$phone) && strlen($phone)!= 10)
{
$phoneErr = "Invalid phone number";
echo "<script>alert('".$phoneErr."');";
echo "</script>";
}
if(strlen($pwd)<8)
{
	$pwdErr="Password must be more than 8 character";
	echo "<script>alert('".$pwdErr."');";
	echo "</script>";
}
else if($pwd!=$repwd) {
	$pwdErr="Password not matched";
	$repwd="";
	echo "<script>alert('ReEnter password : ".$pwdErr."')";
	echo "</script>";
}


if($nameErr=="" && $pwdErr == "" && $phoneErr == "" && $emailErr =="")
{


	if(mysqli_query($conn,"INSERT INTO customer(cust_name,cust_email,cust_pwd,cust_contact) VALUES('".$name."','".$email."','".$pwd."','".$phone."');"))
	{
		echo "<script>alert('Successfully Registered');";
		echo 'window.location="index.php";';
		echo "</script>";
}
	else{
		echo "<script>alert('UnKnown Error Occured')";
		echo "</script>";
	}
	mysqli_close($conn);
}

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>E Mobile | Register </title>
</head>
<body>
<?php
require("header.php");
?>


<!--content-->
<div class=" container">
<div class=" register">
	<h1>Register</h1>
		  	  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				 <div class="col-md-6 register-top-grid">
					<h3>Personal infomation</h3>
					 <div>
						<span>Name</span>
						<input type="text" name="name" value="<?php echo $name; ?>" required>
					 </div>
					 <div>
						 <span>Phone Number</span>
						 <input type="text" name="ph_no" value="<?php echo $phone; ?>" required>
					 </div>
					 <div>
						<span>Email Address</span>
						<input type="email" name="email" value="<?php echo $email; ?>" required>
					 </div>
					 </div>
				     <div class="col-md-6 register-bottom-grid">
						    <h3>Login information</h3>

							 <div>
								<span>Password</span>
								<input type="password" name="pwd" value="<?php echo $pwd; ?>" required>
							 </div>
							 <div>
								<span>Confirm Password</span>
								<input type="password" name="re_pwd" value="<?php echo $repwd; ?>"  required>
							 </div>

							 <input type="submit" value="submit" name="submit">

					 </div>
					 <div class="clearfix"> </div>
				</form>
			</div>
</div>
<!--//content-->
<?php
require("footer.php"); ?>

</body>
</html>
