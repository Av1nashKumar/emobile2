<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<script src="js/jquery.min.js"></script>


<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="EMobile" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
</head>
<body>



<!--header-->
<div class="header" >
	<div class="header-top" >
		<div class="container">
			
				<form>	
        <div class="input-group">
        <input type="text"  class="form-control" placeholder="Search" >
        <span class="input-group-btn">
            <input class="btn btn-primary" name="go" type="submit" value="Go">               
        </span>
        
    </div>
    
					</form>
		
			
			<div class="header-left">

						<?php

						session_start();
						echo "<ul>";
						 if(isset($_SESSION["uid"]))
						 {

                             if($_SESSION['user_role']=='admin')
                             {
                             echo "<li><a href='admin/index.php'>Admin</a></li>";    
                             }
							 echo "<li class='dropdown '><a href='#'>".$_SESSION['u_name']."</a></li>";
							 echo "<li><a href='orders.php' >My Orders</a></li>";
							  echo "<li><a href='logout.php' >Logout</a></li>";
								echo"</ul>";
								echo"<div class='cart box_1'>";
									echo"<a href='cartview.php'>";
									echo"<h3> <div class='total'>";
										echo"<span>Rs ".number_format($_SESSION['total'])."</span> (".$_SESSION['items']." items)</div>";
										echo"<img src='images/cart.png' alt=''/></h3></a>";
									echo"<p><a href='emptycart.php' class='simpleCart_empty'>Empty Cart</a></p></div>";
						 }
						 else {
						 	echo"<li><a href='login.php' >Login</a></li>";
						echo "<li><a href='register.php' >Register</a></li>";
						echo"</ul>";
						echo"<div class='cart box_1'>";
							echo"<a href='cartview.php'>";
							echo"<h3> <div class='total'>";
								echo"<span>Rs 0</span> (0 items)</div>";
								echo"<img src='images/cart.png' alt=''/></h3></a>";
							echo"<p><a href='emptycart.php' class='simpleCart_empty'>Empty Cart</a></p></div>";
					}

					?>


					<div class="clearfix"> </div>
			</div>
				<div class="clearfix"> </div>
		</div>
		</div>
		<div class="container">
			<div class="head-top" >
				<div class="logo">
					<a href="index.php"><img class="img img-responsive site_logo  h_menu4"  width="150px" height="100px" src="images/EMobileicon.png" alt="hello"></a>
		         </div>
		  <div class=" h_menu4">
				<ul class="memenu skyblue">
					  <li><a class="color1" href="index.php">Home</a></li>
						<li><a class="color1" href="about.php">About Us</a></li>
						<li><a class="color1" href="contact.php">Contact Us</a></li>
				      <li><a class="color1" href="#">Categories</a>
				      	<div class="mepanel">
						<div class="row">

							<?php
							 require("db.php");
							 $sql="SELECT cat_name,cat_id FROM category";
							 $result=mysqli_query($conn,$sql);
							 $colclass="";
							 echo"<style>";
							if(mysqli_num_rows($result)==1)
							{
							 echo".memenu>li>.mepanel{width:50%;left:50%;}";
							 echo "</style>";
							 $colclass="col6";
							}
							else if((mysqli_num_rows($result)==2))
							{
							 echo".memenu>li>.mepanel{width:100%;left:-2%;}";
							 echo "</style>";
							$colclass="col3";
							}
							else if((mysqli_num_rows($result)==3))
							{
							 echo".memenu>li>.mepanel{width:150%;left:-52%;}";
							 echo "</style>";
							$colclass="col2";
							}
							else if((mysqli_num_rows($result)>=4))
							{
							echo".memenu>li>.mepanel{width:200%;left:-102%;}";
							echo "</style>";
							$colclass="col1";
							}
							while($rows=mysqli_fetch_assoc($result))
							{
						echo	"<div class='".$colclass."'>";
							echo	"<div class='h_nav'>";
							echo		"<h4>".$rows['cat_name']."</h4>";
							$sql1="SELECT sub_name,sub_id FROM sub_cat WHERE cat_id=".$rows['cat_id'].";";
						$result1=mysqli_query($conn,$sql1);
							while($rows1=mysqli_fetch_assoc($result1))
							{
									echo "<ul>";
										echo"<li><a href='products.php?id=".$rows1['sub_id']."'>".$rows1['sub_name']."</a></li>";
									echo "</ul>";
								}
							echo	"</div></div>";
						}

						?>
						  </div>
						</div>
					</li>
			  </ul>
			</div>
		</div>
		</div>
		<hr style=" margin:1px !important; padding:5px !imporatant;">
	</div>
	
	
	
	
	
	
</body>
</html>
