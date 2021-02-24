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
error_reporting(0);
if(!isset($_SESSION['USER_LOGIN'])){
	echo '<script>alert("Please Login before Checkout");</script>';
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=login.php">';
}
else{
$user = mysqli_query($conn, "SELECT * FROM `users` where id='$_SESSION[USER_ID]'");
?>
  <!---->

   <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Checkout</h3>
		<h4><a href="index.php">Home</a><label>/</label>Checkout</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<!-- contact -->
		<div class="check-out">	 
		<div class="container">	 
	 <div class="spec ">
				<h3>Cart Details</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cross').fadeOut('slow', function(c){
							$('.cross').remove();
						});
						});	  
					});
			   </script>
			<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cross1').fadeOut('slow', function(c){
							$('.cross1').remove();
						});
						});	  
					});
			   </script>	
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cross2').fadeOut('slow', function(c){
							$('.cross2').remove();
						});
						});	  
					});
			   </script>	
			   	<a href="index.php" class="btn btn-info">Continue Shopping</a><br><br>
 <table class="table ">
		  <tr>
			<th class="t-head head-it ">Product</th>
			<th class="t-head">Price</th>
		<th class="t-head">Quantity</th>
		<th class="t-head">Sub-Total</th>
		  </tr>
		  <?php
		  $total = 0;
		  $stotal = 0;
		  $count = 0;
foreach($_SESSION as $products){

	foreach($products as $key => $value){
		if($key == 0){
			echo '<tr class="cross">';
			echo '<form action="checkout-process.php" method="post">';
			echo '<input type="hidden" name="name0" value="'.$value.'">';
			$pid = $value;
			$count += 1;
		}
		elseif($key == 1){
	echo '<td class="t-data">'.$value.'</td>';
	echo '<input type="hidden" name="name1" value="'.$value.'">';
		 } 
		 elseif($key == 2){
		echo	'<td class="t-data"><?php echo $ps; ?>'.$value.'</td>';
		echo '<input type="hidden" name="name2" value="'.$value.'">';
		$price = $value;
		 }
		 elseif($key == 3){
			echo '<input type="hidden" name="name3" value="'.$value.'">';
		 }
		 elseif($key == 4){
			echo '<td class="t-data">
			<p>'.$value.'</p>
			</td>';
$qty = $value;
$stotal = $price * $qty;
$total = $total + $stotal;
echo '<td class="t-data"><?php echo $ps; ?>'.$stotal.'</td>';
		echo'
		  </tr>';
			} 
				}
			}
				?>
	</table>
	<?php
$_SESSION["count"] = $count;
$_SESSION['h'] = true;
if(!isset($_SESSION["coupon"]) && !isset($_SESSION["coupon_dis"])){
	echo '<h4>Total: '.$ps.''.$total.'</h4>';
}
else{
	$discount_percent = ($_SESSION["coupon_dis"] / 100) * $total;
	$ntotal = $total - $discount_percent;
	echo '<h4>Total: <strike>'.$ps.''.$total.'</strike> '.$ps.''.$ntotal.'</h4>';
}
	?>
	<br>
<h4>Payment Method:</h4>
<select name="pay" required>
<option value="COD" selected>POD (Pay On Delevery)</option>
</select>
<br><br>
<h4>Your Details: <a href="my-account.php" class="btn btn-warning">Edit</a></h4>
<?php
while($row = mysqli_fetch_assoc($user)){
	echo '<h5>Name: <b>'.$row["name"].'</b></h5>';
	echo '<h5>Phone Number: +91<b>'.$row["phno"].'</b></h5>';
	echo '<h5>Street Address: <b>'.$row["stadd"].'</b></h5>';
	echo '<h5>City: <b>'.$row["city"].'</b></h5>';
	echo '<h5>Pincode: <b>'.$row["pincode"].'</b></h5>';
}
?>
<br>
<h4>By clicking "Place Order" you agree to our <a href="terms.php">Terms & Conditions</a></h4>
<input type="submit" name="place_order" class="btn btn-success" value="Place Order">
</form>
<br>
<br>
<h4>Coupon Code:</h4>
<?php
if(!isset($_SESSION["coupon"]) && !isset($_SESSION["coupon_dis"])){
	echo '<form action="functions/coupon_manage.php" method="post">';
echo '<input type="text" name="coupon" placeholder="Enter Coupon Code" class="form-control" style="width : 200px;">';
echo '<input type="submit" value="Add" name="ac" class="btn btn-warning" style="width : 200px;">';
echo "</form>";
}
else{
echo '<h5 style="color : green;">Coupon "'.$_SESSION["coupon"].'" applied successfully!</h5>';
echo '<a href="functions/coupon_manage.php?action=remove" class="btn btn-danger">Remove</a>';
}
?>
		 </div>
		 </div>
		 				
	<!--quantity-->
			<script>
			$('.value-plus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
				divUpd.text(newVal);
			});

			$('.value-minus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) divUpd.text(newVal);
			});
			</script>
			<!--quantity-->
			

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
<?php } ?>