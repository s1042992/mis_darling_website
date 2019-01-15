<?php session_start(); ?>
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
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<a href="index.php" class="logo">下一站．大林 </a>
						<nav>
							<ul>
								<li><a href="#menu">Menu</a></li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.html">首頁</a></li>
							<li><a href="course.php">查詢景點</a></li>
							<li><a href="cart_list.php">收藏景點</a></li>
							<?php
								if(isset($_SESSION["user_name"])==null)
								{
									echo '<li><a href="login.php">登入</a></li>';
									
								
								}
							
								if(isset($_SESSION["user_name"])!=null)
								{
									echo '<li><a href="logout.php">登出</a></li>';
									//echo '<li><a href="#" >';
									//echo $_SESSION["user_name"];
									//echo '</a></li>';
								}
							?>
						</ul>
					</nav>

				<!-- Banner -->
				<!--
					Note: If you'd like to use a video as your banner background, set the "data-video" attribute below
					to the full filename of your video, but *exclude* the file extension. The template will automatically
					generate a multi-format* <video> tag on platforms that support background videos, and simply skip the
					step on those that don't (falling back on whatever you've set as the background image).

					* Your video must be offered in both .mp4 and .webm formats to work everywhere.
				-->
					<section id="banner" >
						<div class="inner">
							<header>
								<h1>下一站．大林</h1>
								<p>帶你認識大林之美</p>
							</header>
							<ul class="actions">
								<li><a href="course.php" class="button special big">Get Started</a></li>
							</ul>
						</div>
						<a href="#one" class="more">Learn More</a>
					</section>
				
				<?php 
					include("mysql_connect.inc.php");//連接資料庫
								
					@$name=$_SESSION["user_name"];
					$sql="SELECT * FROM `personal` WHERE `user_name`='$name'";
					$result=mysqli_query($db,$sql);
								
				?>
				<!-- Wrapper -->
					<div id="wrapper">

						<!-- One -->
							<section id="one" class="main">
								<div class="inner spotlight style1">
									<div class="content">
										<header>
											<h2>親子休閒</h2>
										</header>
										<p>想要帶小孩出去玩卻不知道哪邊適合嗎？這裡有老少咸宜的諾德健康休閒生態園區，還有沿路有豐富美景的自行車道等等適合親子一起遊玩的景點哦！</p>
									</div>
									<!--
										Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
										320x340 or at least the same aspect ratio (16:17).
									-->
									<span class="image"><img src="http://clubcp.cw1.tw/article/1151502efbb2c83de10562c965745060-1458698.png" alt="" /></span>
								</div>
							</section>

						<!-- Two -->
							<section id="two" class="main">
								<div class="inner spotlight alt style2">
									<div class="content">
										<header>
											<h2>拍照景點</h2>
										</header>
										<p>大林有非常適合網美網帥來拍照及參觀的觀光工廠和其他景點。</p>
									</div>
									<!--
										Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
										320x340 or at least the same aspect ratio (16:17).
									-->
									<span class="image"><img src="https://cdn2-digiphoto.techbang.com/system/excerpt_images/8118/inpage/dc79fb5955cc421d164d09e929d4dc45.jpg?1442482535" alt="" /></span>
								</div>
							</section>
							
						<!-- three -->
							<section id="three" class="main">
								<div class="inner spotlight style3">
									<div class="content">
										<header>
											<h2>歷史文化</h2>
										</header>
										<p>大林有著豐富的宮廟文化，甚至被譽為全台八大名寺之一的昭慶禪寺也在大林，還有日治時期建設的糖廠，可以前往參觀並了解大林的歷史文化。</p>
									</div>
									<!--
										Note: You can replace the image below with a JPEG or PNG. Just make sure it's exactly
										320x340 or at least the same aspect ratio (16:17).
									-->
									<span class="image"><img src="https://www.tbocc.gov.tw/SightLib/Files/24a4592c-9dd3-e411-a5d3-e4115b13f301/Title/Title201503261748091.jpg" alt="" /></span>
								</div>
							</section>

					
						<!-- CTA -->
							<section id="cta" class="main special">
								<div class="inner">
									<ul class="actions vertical">
										<li><a href="course.php" class="button special big">Get Started</a></li>
										<li><a href="https://iroutine.ml/green/coursetable.php" class="button big">收藏景點</a></li>
									</ul>
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