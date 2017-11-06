<?php
$id=$_GET['id'];
require_once("header.php");
require("db.php");
$sql="SELECT img1,img2,img3 FROM sub_cat WHERE sub_id='".$id."';";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);
$img1=$rows['img1'];
$img2=$rows['img2'];
$img3=$rows['img3'];
mysqli_close($conn);
 ?>
<html>
<head>
  <title> E Mobile | Products</title>

  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .price
  {
    margin:20px 30px;
  }
  .pro
  {
    padding: 0 0 20px;
  }
  .j1
  {
  padding: 0;
  }
.r1
{
  margin-top:30px;
}
.column1
{
  border:0 !important;
  padding: 0;
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

  </style>
</head>
<body>
  <div class="container-fluid">
      <div id="myCarousel" class="carousel slide" data-ride="carousel" style="z-index: 0;">
          <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">


              <div class="item">
                  <img src="images/bg1.png" class="img img-responsive" alt="Chania" width="460" height="345">
              </div>

              <div class="item">
                  <img src="images/bg2.png" class="img img-responsive" alt="Flower" width="460" height="345">
              </div>

              <div class="item active">
                  <img src="images/bg3.png" class="img img-responsive" alt="Flower" width="460" height="345">
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
  <div class="container">
<?php
$id=$_GET["id"];
require("db.php");
$sql="SELECT pro_id,pro_name,pro_price,pro_img1 FROM product WHERE sub_id='".$id."';";
$result=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_assoc($result)){
  echo"<div class='jumbotron j1' style='background-color:white;'><div class='row r1' >";
      for($i=0;$i<2;$i++)
      {
          if(isset($rows['pro_price'])){
        echo "<div class='col-sm-4 column1'>";
        echo"<h3 class='pro'>".$rows['pro_name']."</h3>";
        $pro=$rows['pro_id'];
        echo "<a href='single.php?id=$pro'><img  src='images/".$rows['pro_img1']."' style='height:250px;'></a>";
        echo"<h4 class='price'>Rs ".number_format($rows['pro_price'])."</h4>";
        echo "</div>";
        $rows = mysqli_fetch_assoc($result);
          }
      }
    if(isset($rows['pro_price']))
{          
echo "<div class='col-sm-4 col1'>";
echo"<h3 class='pro'>".$rows['pro_name']."</h3>";
$pro=$rows['pro_id'];
echo "<a href='single.php?id=$pro'><img  src='images/".$rows['pro_img1']."' style='height:250px;'></a>";
echo"<h4 class='price'>Rs ".number_format($rows['pro_price'])."</h4>";
echo "</div>";}
      echo "</div></div>";
}
mysqli_close($conn);
 ?>
 </div>

 <?php
 require_once("footer.php"); ?>
</body>
</html>
