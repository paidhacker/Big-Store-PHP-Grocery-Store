<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Big store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- js -->
   <script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<!--- start-rate---->
<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
		<script type="text/javascript">
			jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
					starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
					}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
					var val = Math.random();
					starbox.next().text(' '+val);
					return val;
					} 
				})
			});
		});
		</script>
<!---//End-rate---->

</head>
<body>
<?php
define("ACCESS",true);
$page = "index";
require("includes/top.php");
$latest_product = mysqli_query($conn, "SELECT * FROM `product` where status='1' order by id desc limit 4");
$best_product = mysqli_query($conn, "SELECT * FROM `product` where status='1' and quantity > 0 order by orders desc limit 8");
$cat = mysqli_query($conn, "SELECT * FROM `categories` where status='1'");
$cato = mysqli_query($conn, "SELECT * FROM `categories` where status='1'");
?>
  <!---->
<div data-vide-bg="images/video.jpg?<?php echo $unique_name; ?>">
    <div class="container">
		<div class="banner-info">
			<h3><?php echo $header1; ?> </h3>	
			<div class="search-form">
				<form action="search.php" method="post">
					<input type="text" placeholder="Search..." name="search">
					<input type="submit" value=" " >
				</form>
			</div>		
		</div>	
    </div>
</div>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>

<!--content-->
<div class="content-top ">
	<div class="container ">
		<div class="spec ">
			<h3>Latest Products</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
			<div class="tab-head ">

				<center>
				<h3>Newest arrivals from our site</h3>
	</center>
			<br>
				<div class=" tab-content tab-content-t ">
					<div class="tab-pane active text-style" id="tab1">
						<div class=" con-w3l">
<?php
$check1 = mysqli_num_rows($latest_product);
if($check1>0){
while($latest_pro = mysqli_fetch_assoc($latest_product)){
?>
							<div class="col-md-3 m-wthree">
								<div class="col-m">								
	<form action="functions/add_to_cart.php" method="post">
	<input type="hidden" name="hidden_name" value="<?php echo  $latest_pro['name']; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo  $latest_pro['price']; ?>">
						<input type="hidden" name="image" value="<?php echo  $latest_pro['img1']; ?>">
	<input type="hidden" name="pid" value="<?php echo $latest_pro['id']; ?>">
	<input type="hidden" name="qty" value="1">
										<a href="single.php?id=<?php echo $latest_pro['id']; ?>"><img src="media/<?php echo $latest_pro['img1']; ?>" style="width : 350px; height : 200px;" class="img-responsive" alt=""></a>
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.php?id=<?php echo $latest_pro['id']; ?>"><?php echo $latest_pro['name']; ?></a></h6>							
										</div>
										<div class="mid-2">
											<p ><label><?php echo $ps; ?><?php echo $latest_pro['mrp']; ?></label><em class="item_price"><?php echo $ps; ?><?php echo $latest_pro['price']; ?></em></p>
											  <div class="block">
							
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="add">
										   <button type="submit" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</button>
										</div>
										
									</div>
</form>
								</div>
							</div>
	<?php }
}
else{
	echo '<center><h3>No data to show</h3></center>';
}
?>
							<div class="clearfix"></div>
						 </div>
					</div>
			</div>
		
	</div>
	</div>
	</div>

<!--content-->
<br>
<!--content-->
  <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
<?php		
		$no = 0;
		$class = "active";
foreach($cat as $key => $value){
    echo '<li data-target="#myCarousel" data-slide-to="'.$no.'" class="'.$class.'"></li>';
	$no+=1;
	$class = "";
}
?>
       
      </ol>
      <div class="carousel-inner" role="listbox">
		<?php 
		$state = "item active";
foreach($cato as $key => $value){
echo '<div class="'.$state.'  data-vide-bg="video/video"">';
echo         '<a href="category.php?catid='.$value["id"].'"> <img class="second-slide " src="media/'.$value["img"].'" style="height : 40%; width : 100%;" alt="Second slide"></a> 
		 </div>';
		$state = "item";
 } ?>
      </div>
    
    </div><!-- /.carousel -->

<!--content-->
	<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Best Sellers</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
			<center>
				<h3>Most ordered products from our site</h3>
	</center>
			<br>
				<div class=" con-w3l">
					<?php
					$check1 = mysqli_num_rows($best_product);
					if($check1>0){
while($best_pro = mysqli_fetch_assoc($best_product)){
					?>
							<div class="col-md-3 pro-1">
								<div class="col-m">
								<form action="functions/add_to_cart.php" method="post">
								<input type="hidden" name="pid" value="<?php echo $best_pro['id']; ?>">
								<input type="hidden" name="hidden_name" value="<?php echo  $best_pro['name']; ?>">
						<input type="hidden" name="hidden_price" value="<?php echo  $best_pro['price']; ?>">
						<input type="hidden" name="image" value="<?php echo  $best_pro['img1']; ?>">
	<input type="hidden" name="qty" value="1">
								<a href="#" data-toggle="modal" data-target="#myModal17" class="offer-img">
								<a href="single.php?id=<?php echo $best_pro['id']; ?>"><img src="media/<?php echo $best_pro['img1']; ?>" style="width : 350px; height : 200px;" class="img-responsive" alt=""></a>
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.php?id=<?php echo $best_pro['id']; ?>"><?php echo $best_pro['name']; ?></a></h6>							
										</div>
										<div class="mid-2">
											<p ><label><?php echo $ps; ?><?php echo $best_pro['mrp']; ?></label><em class="item_price"><?php echo $ps; ?><?php echo $best_pro['price']; ?></em></p>
											  <div class="block">
											
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add add-2">
											<button type="submit" class="btn btn-danger my-cart-btn my-cart-b ">Add to Cart</button>
										</div>
									</div>
</form>
								</div>
							</div>
							<?php }
}
else{
	echo '<center><h3>No data to show</h3></center>';
}
?>
							<div class="clearfix"></div>
						 </div>
		</div>
	</div>
<?php
require("includes/footer.php");
?>

<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>
</body>
</html>