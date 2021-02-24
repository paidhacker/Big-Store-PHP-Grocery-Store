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
require("includes/top.php");
$id = $_GET['id'];
$product = mysqli_query($conn, "SELECT * FROM `product` where id='$id' and status='1' and quantity > 0");

if(empty($id)){
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';
}
else{
	if(mysqli_num_rows($product) < 1){
		echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';
	}
}
?>
  <!---->

 <!--banner-->
 <?php
 while($row = mysqli_fetch_assoc($product)){
 ?>
 <meta name="title" content="<?php echo $row['meta_title']; ?>">
 	<meta name="description" content="<?php echo $row['meta_desc']; ?>">
	 <meta name="keywords" content="<?php echo $row['meta_tags']; ?>">
<div class="banner-top">
	<div class="container">
		<h3 >Product Details</h3>
		<h4><a href="index.php">Home</a><label>/</label><?php echo $row['name']; ?></h4>
		<div class="clearfix"> </div>
	</div>
</div>
		<div class="single">
			<div class="container">
						<div class="single-top-main">
	   		<div class="col-md-5 single-top">
	   		<div class="single-w3agile">
						<form action="functions/add_to_cart.php" method="post">	
						<input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
						<input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>">
						<?php
$_SESSION["price"] = $row['price'];
						?>
						<input type="hidden" name="image" value="<?php echo $row['img1']; ?>">
<div id="picture-frame">
			<img src="media/<?php echo $row['img1']; ?>" data-src="images/<?php echo $row['img1']; ?>" alt="" style="width : 700px; height : 300px;" class="img-responsive"/>
		</div>
										<script src="js/jquery.zoomtoo.js"></script>
								<script>
			$(function() {
				$("#picture-frame").zoomToo({
					magnify: 1
				});
			});
		</script>
		
		
		
			</div>
			</div>
			<div class="col-md-7 single-top-left ">
								<div class="single-right">
				<h3><?php echo $row['name']; ?></h3>
				
					
				 <div class="pr-single">
				  <p class="reduced "><del><?php echo $ps; ?><?php echo $row['mrp']; ?></del><?php echo $ps; ?><?php echo $row['price']; ?></p>
				</div>
				<?php
$cat = mysqli_query($conn, "SELECT * FROM `categories` where id='$row[category]'");
$best_product = mysqli_query($conn, "SELECT * FROM `product` where status='1' and category='$row[category]' and id !='$id' order by orders desc limit 8");
while($row2 = mysqli_fetch_assoc($cat)){
				?>
				<p>Category: <b><a href="category.php?catid=<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></a></b></p>
		<?php } ?>
				<p class="in-pa"> <?php echo $row['long_desc']; ?></p>
				<lable>Quantity</lable>
			   	<input type="number" name="qty" value="1" min="1" max="100" required>
				<ul class="social-top">
					<li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
				</ul>
					<div class="add add-3">
										   <button type="submit" class="btn btn-danger my-cart-btn my-cart-b" >Add to Cart</button>
										</div>
				
				 </form><br>
				 <form action="functions/add_to_wishlist.php" method="post">	
						<input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
						<input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>">
						<?php
$_SESSION["price"] = $row['price'];
						?>
						<input type="hidden" name="image" value="<?php echo $row['img1']; ?>">
						<input type="hidden" name="qty" value="1" required>
						<button type="submit" class="btn btn-danger" style="border-radius : 20px;">Add to Wishlist</button>
</form>
			<div class="clearfix"> </div>
			</div>
		 

			</div>
		   <div class="clearfix"> </div>
	   </div>	
				 
				
	</div>
</div>
		<?php } ?>
		<!---->
<div class="content-top offer-w3agile">
	<div class="container ">
			<div class="spec ">
				<h3>Special Offers</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
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
	<input type="hidden" name="qty" value="1">
								<a href="#" data-toggle="modal" data-target="#myModal17" class="offer-img">
								<a href="single.php?id=<?php echo $best_pro['id']; ?>"><img src="media/<?php echo $best_pro['img1']; ?>" style="width : 350px; height : 250px;" class="img-responsive" alt=""></a>
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
<!--footer-->
<?php
require("includes/footer.php");
?>
<!-- //footer-->

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