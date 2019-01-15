<?php session_start();
	include("mysql_connect.inc.php");//連接資料庫
	
	//echo $_SESSION['class_num'];
	//echo "</br>";
	$sql="SELECT * FROM `userdata` WHERE `account` = '$_SESSION[user_name]'";
	$result=mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);
	
	
	$cart_array=explode(",", $row['attraction_cart']);
	//echo $cart_array[3];
	if($_SESSION['class_num']==1)
	{
		$cart_array[0]="1";
	}
	else if($_SESSION['class_num']==2)
	{
		$cart_array[1]="1";
	}
	else if($_SESSION['class_num']==3)
	{
		$cart_array[2]="1";
	}
	else if($_SESSION['class_num']==4)
	{
		$cart_array[3]="1";
		echo $cart_array[3];
	}
	else if($_SESSION['class_num']==5)
	{
		$cart_array[4]="1";
	}
	else if($_SESSION['class_num']==6)
	{
		$cart_array[5]="1";
	}
	$final_cart=$cart_array[0].",".$cart_array[1].",".$cart_array[2].",".$cart_array[3].",".$cart_array[4].",".$cart_array[5];
	//echo $final_cart;
	$cart_sql="UPDATE `userdata` SET attraction_cart='$final_cart' WHERE `account`='$_SESSION[user_name]'";
	mysqli_query($db,$cart_sql)or die (mysqli_error($db)); //執行sql語法
	$flag=1;
?>
<!DOCTYPE HTML>
<!--
	Formula by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<html>
	<head>
		<title>下一站．大林</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="assets/css/output.css" />
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">下一站．大林</a>
						<nav>
							<ul>
								<li><a href="#menu">Menu</a></li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.php">首頁</a></li>
							<li><a href="course.php">查詢景點</a></li>
							<li><a href="cart_list.php">收藏景點</a></li>
							<?php
								if(isset($_SESSION["user_name"])==null)
								{
									echo '<li><a href="login.html">登入</a></li>';
									
								
								}
							
								if(isset($_SESSION["user_name"])!=null)
								{
									echo '<li><a href="logout.php">登出</a></li>';
									//echo '<li><a href="member.php" class="icon fa-user" >';
									//echo $_SESSION["user_name"];
									//echo '</a></li>';
								}
							?>
						</ul>
					</nav>

				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Main -->
							<section id="main" class="main">
								<div class="inner">
								<?php
									if($flag==1)
									{	?>
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
										  <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
										  <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
										</svg>
										<p class="success">成功加入觀光清單!</p>
									<?php
									}
									else
									{?>
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
										  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
										  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
										  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
										</svg>
										<p class="error">可惜出錯了!再試試看ㄅ</p>
									<?php
									}
									?>
									
									<div class="6u 12u$(small)" style="display:inline">
										<a href="course.php" class="button special fit">繼續選地點</a> <a href="cart_list.php" class="button fit">看看目前清單</a></li>
					
									</div>
									
									
									
								</div>
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon alt fa-youtube"><span class="label">YouTube</span></a></li>
								<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
							</ul>
						</div>
						<p class="copyright">&copy; Untitled. All rights reserved.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			
			

	</body>
</html>