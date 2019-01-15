<?php session_start();
include("mysql_connect.inc.php");//連接資料庫
$sql="SELECT * FROM `userdata` WHERE `account` = '$_SESSION[user_name]'";
$result=mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
$cart_array=explode(",", $row['attraction_cart']);
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
		
		<link rel="stylesheet" href="assets/css/course.css" />
		<link rel="stylesheet" href="assets/css/search.css" />
		<link rel="stylesheet" href="assets/css/star.css" />
		
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
									header("Location: login.php"); 
								
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

				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Main -->
							<section id="main" class="main">
								<div class="inner">
									<header class="major">
										<h1>觀光清單</h1>
									</header>
									<h1>想去地點有...</h1>
									
									<?php
										echo"<ul class='cards'>";
										for($i=0;$i<6;$i++)
										{
											if($cart_array[$i]!=0)
											{
												$k=$i+1;
												$attraction_sql="SELECT * FROM `attraction` WHERE `attraction_id` = '$k'";
												$result2=mysqli_query($db,$attraction_sql);
												$row2 = mysqli_fetch_array($result2);
												
												$imgpart="<img src='".$row2[3]."'/>";
												$majorName=$row2[1];

												echo"<li class='cards_item'>";
												echo"<div class='card'>";
												echo"<div class='card_image'>";
												echo $imgpart;
												echo"</div>";
												echo"<div class='card_content'>";
												echo"<h2 class='card_heading'>";
												echo $row2[1];
												echo"</h2>";
												echo"地址：";
												echo $row2[2];
												echo"</br>";
												echo"</div></div></li>";
											}
										}
										echo"</ul>";
									?>
										
											<input class="6u 2u$(xsmall)" type="text" name="textsearch" id="textsearch" value="" placeholder="Search"/>
										
										
											<input type="button" value="查詢" onclick="getcourse2()"/>
										
									
									<form method="post" action="#">
										<div class="">
											<div class="select-wrapper">
												<select name="attractionclass" id="attractionclass" onchange="getattraction()">
													<option value="">- 觀光類別 -</option>
													<option value="親子休閒">親子休閒</option>
													<option value="拍照景點">拍照景點</option>	
													<option value="歷史文化">歷史文化</option>
													
												</select>
											</div>
										</div>
										
										
										
									</form>
									<script>
										
										function getcourse2(){
											var name_value = document.getElementById("textsearch").value;
											
											//alert(name_value);
												$.ajax({
													url: "getcourse2.php",
													type: "GET",
													data: {
															textsearch:name_value
															},
													success: function(data){
													  $('#result').html(data);
													}
												});
											
											}
										
									function getattraction(){
									var attractionvalue = document.getElementById("attractionclass").value;
									//alert(projvalue);
										$.ajax({
											url: "getattraction.php",
											type: "GET",
											data: {attvalue:attractionvalue},
											success: function(data){
											  $('#result').html(data);
											}
										});
									
									}

							

									</script>
									
									
									<div id="result"></div>	
									
								
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

			<script src="assets/js/search.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>