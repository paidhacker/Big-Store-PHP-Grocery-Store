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
require('includes/top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=login.php">';
}
$details = mysqli_query($conn, "SELECT * FROM `users` where id='$_SESSION[USER_ID]'");
$orders = mysqli_query($conn, "SELECT * FROM `orders` where user_id='$_SESSION[USER_ID]'");
if(isset($_POST['save'])){
    mysqli_query($conn, "UPDATE `users` SET `phno` = '$_POST[phno]', `name` = '$_POST[name]', `stadd` = '$_POST[stadd]', `city` = '$_POST[city]', `pincode` = '$_POST[pincode]' WHERE `users`.`id` = '$_SESSION[USER_ID]';");
    unset($_SESSION['USER_NAME']);
	$_SESSION['USER_NAME'] = $_POST['name'];
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=my-account.php">';
    }
    else{}
?>
  <!---->

    <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Your Account</h3>
		<h4><a href="index.php">Home</a><label>/</label>My account</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!-- faqs -->
	<div class="faq-w3 main-grid-border">
		<div class="container">
			
			<div class="spec ">
			<h3>Account Details</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
			<?php 
while($row = mysqli_fetch_assoc($details)){
                    ?>
                    <form action="my-account.php" method="post">
                                    <lable>Phone Number</lable><input type="tel" class="form-control" id="name" name="phno" value="<?php echo $row['phno']; ?>"
                                            placeholder="Enter Phone Number" maxlength="10" required>
                                            <lable>Name</lable><input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>"
                 placeholder="Enter Name" required>
              
                 <lable>Street Address</lable><input type="text" class="form-control" id="name" name="stadd" value="<?php echo $row['stadd']; ?>"
                 placeholder="Enter Street Address" required>
                 <?php
                 $stadd = $row['stadd'];
                 ?>
                 <lable>City</lable><input type="text" class="form-control" id="name" name="city" value="<?php echo $row['city']; ?>"
                 placeholder="Enter City" required>
                 <?php
                 $city = $row['city'];
                 ?>
                 <lable>Pincode</lable><input type="number" minlength="6" maxlength="6" class="form-control" id="name" name="pincode" value="<?php echo $row['pincode']; ?>"
                 placeholder="Enter Pincode" required>
                 <?php
                 $pincode = $row['pincode'];
                 ?>
                 <br>
                 <button type="submit" name="save" value="save" class="btn btn-info">Save</button>
                    </form>
<?php } ?>
<br>
<div class="spec ">
			<h3>Your Orders</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
				<br>
        <br>
				<center>
				<table class="table">
                    <thead>
                    <tr>
                    <td class="t-head">Order Number<td>
                    <td class="t-head">Payment Type<td>
                    <td class="t-head">Total<td>
                    <td class="t-head">Status<td>
                    <td class="t-head">Action<td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
while($row2 = mysqli_fetch_assoc($orders)){
                    ?>
                    <tr>
                    <td><?php echo $row2['order_no']; ?></td>
                    <td>&nbsp;</td>
                    <td><?php echo $row2['payment']; ?></td>
                    <td>&nbsp;</td>
                    <td><?php echo $ps; ?><?php echo $row2['total']; ?></td>
<?php
if($row2['status'] == 1){
    echo "<td>&nbsp;</td>";
echo "<td>Pending</td>";
}
elseif($row2['status'] == 2){
    echo "<td>&nbsp;</td>";
    echo "<td>Shipped</td>";
    }
    elseif($row2['status'] == 3){
        echo "<td>&nbsp;</td>";
        echo "<td>Completed</td>";
        }
        else{
            echo "<td>&nbsp;</td>";
            echo "<td>Rejected</td>"; 
        }
?>
<?php
if($row2['status'] == 1){
    echo "<td>&nbsp;</td>";
echo '<td><a href="functions/move_order.php?oid='.$row2['order_no'].'&id='.$row2['id'].'" class="btn btn-danger">Cancel order</a></td>';
echo '<td><a href="functions/view_order.php?oid='.$row2['order_no'].'" class="btn btn-success">View Details</a></td>';
}
elseif($row2['status'] == 2){
    echo "<td>&nbsp;</td>";
    echo "<td>&nbsp;</td>";
    echo '<td><a href="functions/view_order.php?oid='.$row2['order_no'].'" class="btn btn-success">View Details</a></td>';
    }
    elseif($row2['status'] == 3){
        echo "<td>&nbsp;</td>";
        echo "<td>&nbsp;</td>";
        echo '<td><a href="functions/view_order.php?oid='.$row2['order_no'].'" class="btn btn-success">View Details</a></td>';
        }
        else{
            echo "<td>&nbsp;</td>";
            echo '<td><a href="functions/move_order.php?oid='.$row2['order_no'].'&id='.$row2['id'].'" class="btn btn-danger">Cancel order</a></td>';
            echo '<td><a href="functions/view_order.php?oid='.$row2['order_no'].'" class="btn btn-success">View Details</a></td>';
        }
?>
                    </tr>
<?php } ?>
                    </tbody>
                    </table>
					</center>
		</div>	
	</div>
	<!-- // Terms of use -->

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
        return total * 0.5;
      }
    });

  });
  </script>
</body>
</html>