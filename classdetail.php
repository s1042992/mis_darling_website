<?php session_start();
if(isset($_GET["class"]))
{
	$classnum=$_GET["class"];
}
include("mysql_connect.inc.php");//連接資料庫

$sql="SELECT * FROM `attraction` WHERE `attraction_id` = '$classnum'";
$result=mysqli_query($db,$sql);
$row = mysqli_fetch_array($result);
$_SESSION['class_num']=$classnum;
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
		<link rel="stylesheet" href="assets/css/star.css" />
		<link rel="stylesheet" href="assets/css/ratestars.css" />
		<link rel="stylesheet" href="assets/css/plusbutton.css" />
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

				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Main -->
							<section id="main" class="main">
							
								<div class="inner">
									<header class="major">
										<h1>
										<?php
											echo $row[1];
										?>
										</h1>
										
									</header>
									
									<?php
									$sql_rate="SELECT * FROM `attraction_evaluation` WHERE `attraction_id`='$row[0]'";
									$result_rate=mysqli_query($db,$sql_rate);
									$row_rate = mysqli_fetch_array($result_rate);
									@$coolness=($row_rate[1]*100/5)/$row_rate[4];
									@$sweetness=($row_rate[2]*100/5)/$row_rate[4];
									@$depth=($row_rate[3]*100/5)/$row_rate[4];
									
									
									$imgpart="<img src='".$row[3]."'/>";
									
									?>
									<span class="image main"><?php echo $imgpart?></span>
									(總評分人數: <?php echo $row_rate[4];?>)
									<div class="table-wrapper">
										<table>
											
											<thead>
												<tr>
													<td><div style="font-weight:bold;">評價種類</div></td>
													<td><div style="font-weight:bold;">平均得分</div></td>
													
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>設施建設</td>
													<td><?php 
														echo "<div class='star-ratings-sprite'>";
														echo "<span style='";
														echo "width:";
														echo $coolness;
														echo"%' class='star-ratings-sprite-rating'></span></div>";
													?></td>
												</tr>
												<tr>
													<td>景點服務</td>
													<td><?php 
														echo "<div class='star-ratings-sprite'>";
														echo "<span style='";
														echo "width:";
														echo $sweetness;
														echo"%' class='star-ratings-sprite-rating'></span></div>";
													?></td>
												</tr>
												<tr>
													<td>景點魅力</td>
													<td><?php 
														echo "<div class='star-ratings-sprite'>";
														echo "<span style='";
														echo "width:";
														echo $depth;
														echo"%' class='star-ratings-sprite-rating'></span></div>";
													?></td>
												</tr>
											</tbody>
										</table>
									
										<table width="100%">
											<thead>
												<tr>
													<td width="10%"><div style="font-weight:bold;">景點資訊</div></td>
													<td width="90%"><div style="font-weight:bold;">景點描述</div></td>
													
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>景點名稱</td>
													<td><?php echo $row[1];?></td>
												</tr>
												<tr>
													<td>景點地址</td>
													<td><?php echo $row[2];?></td>
												</tr>
												<tr>
													<td>景點介紹</td>
													<td><?php echo $row[4];?></td>
												</tr>
												
															
											</tbody>
											
										</table>
										<?php
											if(isset($_SESSION["user_name"])!=null)
											{
												echo "<div class='container'>";
												echo "<span class='pulse-button' ";
												echo 'onclick="addclass()">收藏</span>';
												echo "</div></br></br>";
											
											}
										?>
									</div>
									
									</br>
									<?php
										
										if(isset($_SESSION["user_name"])!=null)
										{
											echo '<h1>去過這個景點嗎 ? 那你來評分 !</h1>
													<form>
														<fieldset>設施建設 &nbsp
														<span class="star-cb-group">
															<input type="radio" id="coolness_rate-5" name="coolness_rate" value="5" /><label for="coolness_rate-5">5</label>
															<input type="radio" id="coolness_rate-4" name="coolness_rate" value="4" /><label for="coolness_rate-4">4</label>
															<input type="radio" id="coolness_rate-3" name="coolness_rate" value="3" /><label for="coolness_rate-3">3</label>
															<input type="radio" id="coolness_rate-2" name="coolness_rate" value="2" /><label for="coolness_rate-2">2</label>
															<input type="radio" id="coolness_rate-1" name="coolness_rate" value="1" /><label for="coolness_rate-1">1</label>
															<input type="radio" id="coolness_rate-0" name="coolness_rate" value="0" class="star-cb-clear" /><label for="coolness_rate-0">0</label>
														</span>
														</fieldset>
													</form> 
													<form>
														<fieldset>景點服務 &nbsp
														<span class="star-cb-group">
															<input type="radio" id="sweetness_rate-5" name="sweetness_rate" value="5" /><label for="sweetness_rate-5">5</label>
															<input type="radio" id="sweetness_rate-4" name="sweetness_rate" value="4" /><label for="sweetness_rate-4">4</label>
															<input type="radio" id="sweetness_rate-3" name="sweetness_rate" value="3" /><label for="sweetness_rate-3">3</label>
															<input type="radio" id="sweetness_rate-2" name="sweetness_rate" value="2" /><label for="sweetness_rate-2">2</label>
															<input type="radio" id="sweetness_rate-1" name="sweetness_rate" value="1" /><label for="sweetness_rate-1">1</label>
															<input type="radio" id="sweetness_rate-0" name="sweetness_rate" value="0" class="star-cb-clear" /><label for="sweetness_rate-0">0</label>
														</span>
														</fieldset>
													</form>
													<form>  
														<fieldset>景點魅力 &nbsp
														<span class="star-cb-group">
															<input type="radio" id="depth_rate-5" name="depth_rate" value="5" /><label for="depth_rate-5">5</label>
															<input type="radio" id="depth_rate-4" name="depth_rate" value="4" /><label for="depth_rate-4">4</label>
															<input type="radio" id="depth_rate-3" name="depth_rate" value="3" /><label for="depth_rate-3">3</label>
															<input type="radio" id="depth_rate-2" name="depth_rate" value="2" /><label for="depth_rate-2">2</label>
															<input type="radio" id="depth_rate-1" name="depth_rate" value="1" /><label for="depth_rate-1">1</label>
															<input type="radio" id="depth_rate-0" name="depth_rate" value="0" class="star-cb-clear" /><label for="depth_rate-0">0</label>
														</span>
														</fieldset>
													</form>';

											$account=$_SESSION["user_name"];
											$sql="SELECT * FROM `userdata` WHERE `account` = '$account'";
											$result = $db->query($sql);
											$attraction_mark="";
											while($row = mysqli_fetch_assoc($result)){
												$attraction_mark=$row["attraction_mark"];
											}
											$arr_mark=explode(",",$attraction_mark);
											$isMarked=false;
											if($arr_mark[$classnum-1]=="0"){
												echo '<input type="button" value="評分" onclick="sendrate()"/>';
											}
											else{
												$isMarked=true;
												echo '<input type="button" value="您已經評分過了 ! " />';
											}
										}
									?>

									
								</div>
							</section>
							
					</div>
					<script>
						function sendrate()
						{
							var newcool = document.querySelector('input[name="coolness_rate"]:checked').value ;
							var newsweet = document.querySelector('input[name="sweetness_rate"]:checked').value;
							var newdepth = document.querySelector('input[name="depth_rate"]:checked').value;
							window.location.replace('updaterate.php?coolness='+newcool+'&sweetness='+newsweet+'&depth='+newdepth);
						}
						
						function addclass()
						{
							window.location.replace("addclass.php");
						}
					</script>

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
			<script src="assets/js/ratestars.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>