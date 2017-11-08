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







<div class="content">
	<div class="container">
	<div class="content-top">
		<h1>Search Results</h1>
		<hr style=" margin:2px !important; padding:5px !imporatant;">
		<?php
		$item=0;
        $proIDs =  $_SESSION['pro_ids'] ;
        if(empty($proIDs))
        {
            header("Location:index.php");
        }
        $query = "SELECT * FROM product WHERE pro_id IN (".implode(',', $proIDs).")";
        $select_all_product_query = mysqli_query($conn,$query);


		echo"<div class='row newrel'>";
	        
        while($rows = mysqli_fetch_assoc($select_all_product_query))
        {

			echo"<div class='col-sm-4 box'>";
			echo"<h3 class='pro'>".$rows['pro_name']."</h3><br>";
			$pro=$rows['pro_id'];
			echo "<a href='single.php?id=$pro'><img  src='images/".$rows['pro_img1']."'  style='height:250px;'></a><br><br>";
			echo"<h4 class='price'>Rs ".number_format($rows['pro_price'])."</h4><br>";
			echo"</div>";
			$item++;
			if($item%3==0)
			{
				echo"</div>";
				echo"<div class='row'>";
			}
		}
        
    
		echo"</div></div>";
       
	mysqli_close($conn);
	?>


</div>
    </div>
    </div>






<?php
require("footer.php");
?>
</body>
</html>
