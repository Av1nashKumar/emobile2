
<!DOCTYPE html>
<html>
<head>
<title>E Mobile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
.price
{
	margin:20px 30px;
}
.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
					width: 100%;
					margin: 0;
					padding: 0;
			}
			.carousel
			{   width: 100%;
					margin: 0 !important;
					padding: 0 !important;
			}
			.container-fluid
			{
				margin:0 !important;
				padding: 0 !important;
			}
	.newrel
	{
		padding:20px 10px 20px 10px;
	}
		</style>
</head>
<body>
<!--header-->
<?php
require("header.php");
?>

<div class="container-fluid">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="z-index: 0;">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">


            <div class="item">
                <img src="images/bg1.png" class="abc" alt="Chania" >
            </div>

            <div class="item">
                <img src="images/bg2.png" class="abc" alt="Flower"	height="340" width="460" >
            </div>

            <div class="item">
                <img src="images/bg3.png" class="abc" alt="Flower" height="340" width="460">
            </div>

            <div class="item active">
                <img src="images/bg4.png" class="abc" alt="Chania" height="340" width="460">
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


<!--content-->
<div class="content">
	<div class="container">
	<div class="content-top">
		<h1>NEW RELEASED</h1>
		<hr style=" margin:2px !important; padding:5px !imporatant;">
		<?php
		$item=0;
        

        $query = "SELECT * FROM product ORDER BY pro_id DESC LIMIT 6 ";
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
    
    echo"<div class='content-top'>";
	echo"	<h1>Featured Collections</h1>";
        
        echo "<hr style='margin:2px !important; padding:5px !imporatant;'>";
	$item=0;
	  

        $query = "SELECT * FROM product ORDER BY pro_id ASC LIMIT 6 ";
        $select_all_product_query = mysqli_query($conn,$query);

       
		echo"<div class='row newrel'>";
	        
        while($rows = mysqli_fetch_assoc($select_all_product_query))
        {

			echo"<div class='col-sm-4'>";
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
<!--footer-->
<?php
require("footer.php");
?>
</body>
</html>
