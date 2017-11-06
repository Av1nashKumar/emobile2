
<!DOCTYPE html>
<html>
<head>
<title>E Mobile | Signle</title>
</head>
<body>

<?php
require("header.php");
$id=$_GET["id"];
$sql="SELECT pro_img1,pro_img2,pro_price,pro_img3,pro_name,pro_disc FROM product WHERE pro_id='".$id."';";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($result);

$img1=$rows["pro_img1"];
$img2=$rows["pro_img2"];
$img3=$rows["pro_img3"];
$price=number_format($rows["pro_price"]);
$name=$rows["pro_name"];
$disc=$rows["pro_disc"];
 ?>


		<div class="product">
			<div class="container">
				<div class="col-md-3 product-price">

				<div class=" rsidebar span_1_of_left">
					<div class="of-left">
						<h3 class="cate">Categories</h3>
					</div>
		 <ul class="menu">
       <?php
         require("db.php");
         $sql="SELECT cat_name,cat_id FROM category";
         $result=mysqli_query($conn,$sql);

       while($rows=mysqli_fetch_assoc($result))
        {$i=1;
      echo	"<li class='item1'><a href='#'>".$rows['cat_name']."</a>";
      echo"<ul class='cute'>";
        $sql1="SELECT sub_name,sub_id FROM sub_cat WHERE cat_id=".$rows['cat_id'].";";
      $result1=mysqli_query($conn,$sql1);
        while($rows1=mysqli_fetch_assoc($result1))
        {
          $j=1;
        echo"<li><a href='products.php?id=".$rows1['sub_id']."' class='subitem1'>".$rows1['sub_name']."</a></li>";
        $j++;
          }
        echo	"</ul></li>";
        $i++;
      }
      ?>

					</div>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });

			});
		</script>
<!---->
	<div class="product-middle">

					<div class="fit-top">
						<h6 class="shop-top">E Mobile</h6>
						<a href="#" class="shop-now">SHOP NOW</a>
<div class="clearfix"> </div>
	</div>
				</div>
				<!---->
        <div class="clearfix"> </div>
				<div class="product-bottom">
					<div class="of-left-in">
								<h3 class="best">Best Sellers</h3>
							</div>
					<div class="product-go">
						<div class=" fashion-grid">
									<a href="#"><img class="img-responsive " src="images/p1.jpg" alt=""></a>

								</div>
							<div class=" fashion-grid1">
								<h6 class="best2"><a href="#" >Lorem ipsum dolor sit
amet consectetuer  </a></h6>

								<span class=" price-in1"> $40.00</span>
							</div>

							<div class="clearfix"> </div>
							</div>
							<div class="product-go">
						<div class=" fashion-grid">
									<a href="#"><img class="img-responsive " src="images/p2.jpg" alt=""></a>

								</div>
							<div class="fashion-grid1">
								<h6 class="best2"><a href="#" >Lorem ipsum dolor sit
amet consectetuer </a></h6>

								<span class=" price-in1"> $40.00</span>
							</div>

							<div class="clearfix"> </div>
							</div>

				</div>
<div class=" per1">
				<a href="#" ><img class="img-responsive" src="images/pro.jpg" alt="">
				<div class="six1">
					<h4>DISCOUNT</h4>
					<p>Up to</p>
					<span>60%</span>
				</div></a>
			</div>
				</div>
				<div class="col-md-9 product-price1">
				<div class="col-md-5 single-top">
			<div class="flexslider">
  <ul class="slides">
    <li data-thumb="<?php echo "images/".$img1; ?>">
      <img src="<?php echo "images/".$img1; ?>" class="img img-responsive" />
    </li>
    <li data-thumb="<?php echo "images/".$img2;?>">
      <img src="<?php echo "images/".$img2; ?>" class="img img-responsive" />
    </li>
    <li data-thumb="<?php echo "images/".$img3; ?>">
      <img src="<?php echo "images/".$img3; ?>" class="img img-responsive"/>
    </li>
  </ul>
</div>
<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
					</div>
					<div class="col-md-7 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
						<h4><?php echo $name;?></h4>
							<div class="star-on">
								<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>
								<div class="review">
									<a href="#"> 1 customer review </a>

								</div>
							<div class="clearfix"> </div>
							</div>

							<h5 class="item_price">Rs <?php echo $price;?></h5>
							<p text-align="justified">
            <?php echo $disc;?>
          </p>
								<a href="cart.php?id=<?php echo $_GET['id'];?>"><button  class="btn btn-warning btn-md" name="cart" style="width:120px;">ADD TO CART</button></a><br><br>
                <a href="checkout.php?id=<?php echo $_GET['id']; ?>"><button  class="btn btn-success btn-md" style="width:120px;">BUY NOW</button></a><br><br>
              </div>
					</div>
				<div class="clearfix"> </div>
			<!---->
					<div class="cd-tabs">
			<nav>
				<ul class="cd-tabs-navigation">
					<li><a data-content="fashion"  href="#0">Description </a></li>
					<li><a data-content="cinema" href="#0" >Addtional Informatioan</a></li>
					<li><a data-content="television" href="#0" class="selected ">Reviews (1)</a></li>

				</ul>
			</nav>
	<ul class="cd-tabs-content">
		<li data-content="fashion" >
		<div class="facts">
									  <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
										<ul>
											<li>Research</li>
											<li>Design and Development</li>
											<li>Porting and Optimization</li>
											<li>System integration</li>
											<li>Verification, Validation and Testing</li>
											<li>Maintenance and Support</li>
										</ul>
							        </div>

</li>
<li data-content="cinema" >
		<div class="facts1">

						<div class="color"><p>Color</p>
							<span >Blue, Black, Red</span>
							<div class="clearfix"></div>
						</div>
						<div class="color">
							<p>Size</p>
							<span >S, M, L, XL</span>
							<div class="clearfix"></div>
						</div>

			 </div>

</li>
<li data-content="television" class="selected">
	<div class="comments-top-top">
				<div class="top-comment-left">
					<img class="img-responsive" src="images/co.png" alt="">
				</div>
				<div class="top-comment-right">
					<h6><a href="#">Hendri</a> - August 3, 2017</h6>
					<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>
									<p>Wow nice!</p>
				</div>
				<div class="clearfix"> </div>
				<a class="add-re" href="#">ADD REVIEW</a>
			</div>

</li>
	</ul>
</div>

		</div>
		</div>
  </div>
  <?php
  require_once("footer.php");
  ?>
</body>
</html>
