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

<?php
session_start();
define("SESSION",true);
define("ACCESS",true);
$_SESSION["count"] = 0;
require("includes/top.php"); 
?>
<meta HTTP-EQUIV="REFRESH" content="12; url=index.php">
</head>
<body>
<?php
error_reporting(0);
if(!isset($_SESSION['h'])){
    header('location:index.php');
}
else{
if(!isset($_SESSION['USER_LOGIN'])){
header('location:index.php');
}

$payment_method = $_POST['pay'];
$total = 0;
if(isset($total)){
$order_no = uniqid('','');
foreach($_SESSION as $products){
    foreach($products as $key => $value){
        if($key == 0){
            $pid= $value;
        }
        elseif($key == 1){
            $name = $value;
            unset($_SESSION[$name]);
		}
		elseif($key == 2){
			$price = $value;
		}
       elseif ($key == 4) {
		   $qty = $value;
		   $stotal = $price * $qty;
		   $total += $stotal;
		   if($total==0){
			echo '<script>alert("Please select some products before placing an order");</script>';
			echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';
			die();
		}
		if(isset($_SESSION["coupon"]) && isset($_SESSION["coupon_dis"])){
			$discount_percent = ($_SESSION["coupon_dis"] / 100) * $total;
			$ntotal = $total - $discount_percent;
		}
           $order_details = array($order_no,$pid,$qty,$_SESSION['USER_ID']);
         //insert order detials
         mysqli_query($conn, "INSERT INTO `order_details` (order_no,product_id,product_qty,`user_id`) values ('$order_no','$pid','$qty','$_SESSION[USER_ID]')");
   mysqli_query($conn, "UPDATE `product` SET quantity=quantity-'$qty' where id='$pid'");
   mysqli_query($conn, "UPDATE `product` SET orders=orders+'$qty' where id='$pid'");
       }
    }
}
      //insert order summary
      mysqli_query($conn, "INSERT INTO `orders` (order_no,user_id,payment,total,status) values ('$order_no','$_SESSION[USER_ID]','$payment_method','$ntotal','1')");
     
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
				<h3>Thanks for purchasing</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
			<center>
			<h4>Your Order Number is</h4><br>
			<div id="box" style="border : solid 2px black; padding : 50px 60px; width : 50%;">
			<h4><?php echo $order_no; ?></h4>
</div>
</center>
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
<?php
unset($_SESSION['h']);
unset($_SESSION["coupon"]);
unset($_SESSION["coupon_dis"]);
}
}
?>