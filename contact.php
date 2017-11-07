<?php
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$sub=$_POST['subject'];
$msg=$_POST['message'];
require_once('db.php');
$sql="INSERT INTO contact(con_name,con_email,con_sub,con_msg) VALUES('".$name."','".$email."','".$sub."','".$msg."');";
if(mysqli_query($conn,$sql))
{
	mysqli_close($conn);
	echo"<script>alert('Your Response Successfully Recorded');";
	echo "window.location='index.php';</script>";
}
}
require("header.php");
 ?>
<html>
<head>
<title>E Mobile | Contact </title>
</head>
<body>
<div class="contact">

			<div class="container">
				<h1>Contact</h1>
			<div class="contact-form">

				<div class="col-md-8 contact-grid">
					<form action="" method="post">
						<input type="text" name="name" placeholder="Enter Name" required>

						<input type="email" name="email" placeholder="Enter Email" required>
						<input type="text" name="subject" placeholder="Subject"required>

						<textarea cols="77" rows="6" name="message" placeholder="Enter Message" required></textarea>
						<div class="send">
							<input type="submit" name="submit" value="Send">
						</div>
					</form>
				</div>
				<div class="col-md-4 contact-in">

						<div class="address-more">
						<h4>Address</h4>
							<p>E Mobile,</p>
							<p>Jalandhar,</p>
							<p>Punjab</p>
						</div>
						<div class="address-more">
						<h4>Address1</h4>
							<p>Tel:+919872440301</p>
							<p>Fax:190-4509-494</p>
							<p>Email:<a href="mailto:prat3185@gamil.com"> avinash.7355@gmail.com</a></p>
						</div>

				</div>
				<div class="clearfix"> </div>
			</div>
			
		</div>

	</div>

<?php
require("footer.php");
?>
</body>
</html>
