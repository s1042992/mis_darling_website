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
							<?php
								if(isset($_SESSION["user_name"])==null)
								{
									echo '<li><a href="login.php">登入</a></li>';
									
								
								}
							
								if(isset($_SESSION["user_name"])!=null)
								{
									echo '<li><a href="course.php">收藏景點</a></li>';
									echo '<li><a href="logout.php">登出</a></li>';
									echo '<li><a href="#" class="icon fa-user" >';
									echo $_SESSION["user_name"];
									echo '</a></li>';
								}
							?>
						</ul>
					</nav>

				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Main -->
							<section id="main" class="main">
								<div class="inner">
									<header>
										<h1>登入</h1>
										<!--<p>Login</p>-->
									</header>
									
									<p>沒有帳號?  <a href="register.php">點我申辦</a></p>
									
									<form method="post" action="./connect.php">
										<div class="6u 12u$(xsmall)">
											<input type="text" name="account" placeholder="Enter Account"/><br>
											<input type="password" name="password" placeholder="Enter Password"/><br>
										</div>
										<input type="submit" value="登入" class="special"/>
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