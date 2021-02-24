<?php
if(!defined("ACCESS")){
	die('Access denied');
}
define("SESSION",true);
require("database.php");
$cat = mysqli_query($conn, "SELECT * FROM `categories` where status='1'");
?>
<!--footer-->
<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-grid">
			<h3>About Us</h3>
			<?php 
			$aq = substr($about, 0, 100);
			?>
			<p><?php echo $aq; ?></p>
		</div>
		<div class="col-md-3 footer-grid ">
			<h3>Menu</h3>
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php
				while($row5 = mysqli_fetch_assoc($cat)){
			echo '<li><a href="category.php?catid='.$row5["id"].'">'.$row5["name"].'</a></li>';
				}
				?>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
		<div class="col-md-3 footer-grid ">
			<h3>Customer Services</h3>
			<ul>
				<li><a href="terms.php">Terms & Conditions</a></li>
				<li><a href="faqs.php">Faqs</a></li>
				<li><a href="contact.php">Contact</a></li>					 
				 
			</ul>
		</div>
		<div class="clearfix"></div>
			<div class="footer-bottom">
				<h2 ><a href="index.php"><b>T<br>H<br>E</b><?php echo $fname; ?> <?php echo $lname; ?> <span>The Best Supermarket</span></a></h2>
				<p class="fo-para"><?php echo $desc; ?></p>
				<ul class="social-fo">
					<li><a href="#" class=" face"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" twi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" pin"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" dri"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				</ul>
				<div class=" address">
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-home" aria-hidden="true"></i><?php echo $add; ?></p>
					</div>
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-phone" aria-hidden="true"></i><?php echo $pno; ?></p>	
					</div>
					<div class="col-md-4 fo-grid1">
						<p><a href="mailto:<?php echo $mail; ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $mail; ?></a></p>
					</div>
					<div class="clearfix"></div>
					
					</div>
			</div>
		<div class="copy-right">
			<p> &copy; <script>document.write(new Date().getFullYear());</script> <?php echo $fname; ?> <?php echo $lname; ?>. All Rights Reserved | Design by  <a href="https://youtube.com/paidhacker/"> Paid Hacker</a></p>
		</div>
	</div>
</div>
<!-- //footer-->