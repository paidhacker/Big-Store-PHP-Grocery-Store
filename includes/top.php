<?php
if(!defined("ACCESS")){
	die('Access denied');
}
require("database.php");
require("setting.php");
$category = mysqli_query($conn, "SELECT * FROM `categories` where status='1'");
$ch = mysqli_num_rows($category);
?>
<title><?php echo $fname; ?> <?php echo $lname; ?> <?php echo $title; ?></title>
<img src="images/download.png" class="img-head" alt="">
<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 ><a href="index.php"><b>T<br>H<br>E</b><?php echo $fname; ?> <?php echo $lname; ?> <span>The Best Supermarket</span></a></h1>
			</div>
			<div class="head-t">
				<ul class="card">
					<li><a href="wishlist.php" ><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</a></li>
					<?php
					if(isset($_SESSION['USER_LOGIN'])){
	$n = $_SESSION["USER_NAME"];
echo '<li><a href="my-account.php" ><i class="fa fa-user" aria-hidden="true"></i>Welcome '.$n.'</a><a href="functions/logout.php"><i class="fa fa-power-off"></i></a></li>';
					}
					else{
						echo '					<li><a href="login.php" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
						<li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>';
					}
					?>
					<li><a href="track_order.php" ><i class="fa fa-list" aria-hidden="true"></i>Track Order</a></li>
				</ul>	
			</div>
			
			<div class="header-ri">
				<ul class="social-top">
					<li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
				</ul>	
			</div>
		

				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						

					</div> 
					<?php
if(isset($page)){
if($page == "index"){
	$home = "active";
	$aboutus = "unactive";
	$contactus = "unactive";
}
elseif($page == "about"){
	$home = "unactive";
	$aboutus = "active";
	$contactus = "unactive";
}
elseif($page == "contact"){
	$home = "unactive";
	$aboutus = "unactive";
	$contactus = "active";
}
}
else{
	$home = "unactive";
	$aboutus = "unactive";
	$contactus = "unactive";	
}
					?>
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class=" <?php echo $home; ?>"><a href="index.php" class="hyper "><span>Home</span></a></li>	
							<?php
while($cat = mysqli_fetch_assoc($category)){
	if(isset($_GET['catid']) && $_GET['catid'] == $cat["id"]){
		echo '<li class=" active"><a href="category.php?catid='.$cat["id"].'" class="hyper"> <span>'.$cat["name"].'</span></a></li>';
 }
 else{
	echo '<li><a href="category.php?catid='.$cat["id"].'" class="hyper"> <span>'.$cat["name"].'</span></a></li>';
}
}
?>
							<li class=" <?php echo $aboutus; ?>"><a href="about.php" class="hyper"> <span>About Us</span></a></li>
							<li class=" <?php echo $contactus; ?>"><a href="contact.php" class="hyper"><span>Contact Us</span></a></li>
						</ul>
					</div>
					</nav>
					<?php
if(isset($_SESSION["count"])){
	echo ' <div class="cart" >
	<a href="cart.php"><span class="fa fa-shopping-cart" style="font-size : 25px; color : green;" aria-hidden="true"></span></a> '.$_SESSION["count"].'
</div>';
}
else{
	echo ' <div class="cart" >
	<a href="cart.php"><span class="fa fa-shopping-cart" style="font-size : 25px; color : green;" aria-hidden="true"></span></a> 0
</div>';
}
					?>

					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
