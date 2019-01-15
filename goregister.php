<?php

		$db = new mysqli("120.113.173.17","iroutine", "j;6u.40 #000000", "2018_ncyu_hackathon");
		if ($db->connect_error) {
			die('無法連上資料庫：' . $db->connect_error);
		}
		$db->set_charset("utf8");
		
			
			
			$get_account=htmlspecialchars($_POST["account"]);
			$get_password=htmlspecialchars($_POST["password"]);
            
			
			$defult_value="0,0,0,0,0,0"; //預設的觀光地點為空
			
			$sql = "INSERT INTO userdata(account, password, attraction_cart) VALUES ('$get_account','$get_password','$defult_value')";
			
			//$sql2 = "INSERT INTO timetable(account,sunday, monday, tuesday, wednesday, thursday, friday, saturday) VALUES ('$get_account','$defult_value','$defult_value','$defult_value','$defult_value','$defult_value','$defult_value','$defult_value')";
			
			
			

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
						<<ul class="links">
							<li><a href="index.php">Home</a></li>
							<?php
								if(isset($_SESSION["user_name"])==null)
								{
									echo '<li><a href="login.html">登入</a></li>';
									
								
								}
							
								if(isset($_SESSION["user_name"])!=null)
								{
									echo '<li><a href="logout.php">登出</a></li>';
									echo '<li><a href="member.php" class="icon fa-user" >';
									echo $_SESSION["user_name"];
									echo '</a></li>';
								}
							?>
							<li><a href="course.php">選課</a></li>
							<li><a href="cart_list.php">課表</a></li>
						</ul>
					</nav>

				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Main -->
							<section id="main" class="main">
								<div class="inner">
									<?php
										if (mysqli_query($db, $sql)) {
											  echo "<h1> 註冊成功</h1>";
											  echo"<h3>New record created successfully...</h3>";
											  echo"<p>稍待幾秒，網頁將會重新導向...</p>";
											 
											  //Redirect using the Location header.
											  header('refresh:3;url= index.php');
											  
										} else {
											  echo "<h1>Error: " . $sql . "<br>" . mysqli_error($db)."</h1>";
										}
										mysqli_close($db);
									?>
									
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