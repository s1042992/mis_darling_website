<?php session_start();

    session_start();
    $account=$_SESSION["user_name"];
    if(isset($_SESSION["user_name"])==null)
    {
        die("請先登入");
    }
    $servername = "localhost";
	$username = "iroutine";
	$password = "j;6u.40 #000000";
	$database = "2018_ncyu_hackathon";
	$con=new mysqli($servername, $username, $password, $database);
	if (mysqli_connect_errno($con)) {
		echo "Faindexiled to connect to MySQL: " . mysqli_connect_error();
    }
	$con->set_charset("utf8");
    $class_time[0]="第 1 節</br>08:10-09:00";  $class_time[1]="第 2 節</br>09:10-10:00";  $class_time[2]="第 3 節</br>10:10-11:00";
    $class_time[3]="第 4 節</br>11:10-12:00";  $class_time[4]="第 F 節</br>12:10-13:00";  $class_time[5]="第 5 節</br>13:20-14:10";
    $class_time[6]="第 6 節</br>14:20-15:10";  $class_time[7]="第 7 節</br>15:20-16:10";  $class_time[8]="第 8 節</br>16:20-17:10";
    $class_time[9]="第 9 節</br>17:20-18:10";  $class_time[10]="第 A 節</br>18:30-19:15";  $class_time[11]="第 B 節</br>19:20-20:05";
    $class_time[12]="第 C 節</br>20:10-20:55";  $class_time[13]="第 D 節</br>21:00-21:45";
    $td_bgcolor[0]="#A74E40";
    $td_bgcolor[1]="#E28AFB";
    $td_bgcolor[2]="#F5A623";
    $td_bgcolor[3]="#9BCD09";
    $td_bgcolor[4]="#00D0AE";
    $td_bgcolor[5]="#0794BF";
    $td_bgcolor[6]="#F89882";
    $td_bgcolor[7]="#F46D9D";
    $td_bgcolor[8]="#01CFE4";
    $td_bgcolor[9]="#C6BCBB";
?>
<!DOCTYPE HTML>
<!--
	Formula by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<html>
	<head>
		<title>選課好嘉在</title>
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
						<a href="index.php" class="logo">選課好嘉在</a>
						<nav>
							<ul>
								<li><a href="#menu">Menu</a></li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.php">Home</a></li>
							<?php
								if(isset($_SESSION["user_name"])==null)
								{
									echo '<li><a href="login.html">登入</a></li>';
									header("Location: login.php"); 
								
								}
							
								if(isset($_SESSION["user_name"])!=null)
								{
									echo '<li><a href="logout.php">登出</a></li>';
									echo '<li><a href="#" >';
									echo $_SESSION["user_name"];
									echo '</a></li>';
								}
							?>
							<li><a href="course.php">選課</a></li>
							<li><a href="https://iroutine.ml/green/coursetable.php">課表</a></li>
						</ul>
						
					</nav>

				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Main -->
							<section id="main" class="main">
								<div class="inner">
									<header class="major">
										<h1>我的課表</h1>
									</header>
									<input type="button" value="下載pdf檔" onclick="Export()"/>
									<div></br></div>
									<table id="tbl" rules="all" align="center">
										<tr height="50" align="center">
											<th width="100" style="text-align: center; vertical-align: middle;">星期日</th>
											<th width="100" style="text-align: center; vertical-align: middle;">星期六</th>
											<th width="100" style="text-align: center; vertical-align: middle;">星期五</th>
											<th width="100" style="text-align: center; vertical-align: middle;">星期四</th>
											<th width="100" style="text-align: center; vertical-align: middle;">星期三</th>
											<th width="100" style="text-align: center; vertical-align: middle;">星期二</th>
											<th width="100" style="text-align: center; vertical-align: middle;">星期一</th>
											<th width="100" style="text-align: center; vertical-align: middle;"></th>
										</tr>
										<?php

											for($i=0;$i<10;$i++){
												for($j=0;$j<7;$j++){
													$course[$i][$j]="0";
												}
											}

											$sql="SELECT * FROM timetable WHERE account = '$account'";
											$result = $con->query($sql);
											$course_temp=array();
											while($row = mysqli_fetch_assoc($result)){
												$course_temp[0]=explode(",",$row["sunday"]);
												$course_temp[1]=explode(",",$row["saturday"]);
												$course_temp[2]=explode(",",$row["friday"]);//1
												$course_temp[3]=explode(",",$row["thursday"]);//1~3
												$course_temp[4]=explode(",",$row["wednesday"]);//6~7
												$course_temp[5]=explode(",",$row["tuesday"]);//3~4 5
												$course_temp[6]=explode(",",$row["monday"]);//2~4
											}

											//creat course table
											$course=array();
											for($i=0;$i<10;$i++){
												$course[]=array();
											}
											for($i=0;$i<10;$i++){
												for($j=0;$j<7;$j++){
													$course[$i][$j]=$course_temp[$j][$i];
												}
											}
											//

											$column_num=array();
											for($i=0;$i<14;$i++)    //初始化每列8個欄位
												$column_num[$i]=8;

											/*$course=array();
											for($i=0;$i<14;$i++){
												$course[]=array();
											}
											for($i=0;$i<14;$i++){
												for($j=0;$j<8;$j++){
													$course[$i][$j]="0";
													if(($i==2 || $i==3) && $j==2)
														$course[$i][$j]="123456";
													if(($i==1 || $i==2 || $i==3) && $j==4)
														$course[$i][$j]="12345";
													if(($i==0) && $j==1)
														$course[$i][$j]="123456";
												}
											}*/

											// check all course
											$course_index=array();
											for($i=0;$i<10;$i++){
												for($j=0;$j<7;$j++){
													if($course[$i][$j]!="0" && !(in_array($course[$i][$j],$course_index))){
														$course_index[]=$course[$i][$j];
													}
												}
											}
											//

											$course_name="123456";
											for($i=0;$i<10;$i++){
												echo "<tr align=center height=\"60\" align=\"center\" style=\"text-align: center; vertical-align: middle;\">";
												for($j=0;$j<8;$j++){
													if($j==7){    //這一列最後一欄 輸出節次時間
														echo "<td>";
														echo $class_time[$i];
														echo "</td>";
													}
													else{
														if($i>0){   //不是第一節
															if($course[$i][$j]!="0"){   //有課程
																$courseID=$course[$i][$j];
																$sql="SELECT course_name FROM course WHERE permanent_class_number = '$courseID'";
																$result=$con->query($sql);
																$course_name="";
																while($row = mysqli_fetch_assoc($result)){
																	$course_name=$row["course_name"];
																}

																$key = array_search($course[$i][$j], $course_index);
																$bg_color=$td_bgcolor[$key%10];
																if($course[$i][$j]!=$course[$i-1][$j]){
																	if($i<13 && $course[$i+1][$j]==$course[$i][$j]){    //下堂課跟這堂課一樣
																		//$column_num[$i+1]--;
																		//$course_name=$course[$i][$j];
																		if($i<12 && $course[$i+2][$j]==$course[$i][$j]){    //下下堂課跟這堂課一樣
                                                                            //$column_num[$i+2]--;
                                                                            if($course[$i+3][$j]==$course[$i][$j]){
                                                                                echo "<td rowspan=\"4\" bgcolor=$bg_color style=\"text-align: center; vertical-align: middle;\"><font color=\"white\">$course_name</font></td>";
                                                                            }
                                                                            else{
                                                                                echo "<td rowspan=\"3\" bgcolor=$bg_color style=\"text-align: center; vertical-align: middle;\"><font color=\"white\">$course_name</font></td>";
                                                                            }
																		}
																		else{
																			echo "<td rowspan=\"2\" bgcolor=$bg_color style=\"text-align: center; vertical-align: middle;\"><font color=\"white\">$course_name</font></td>";
																		}
																	}
																	else{   //這堂課跟下堂課不同
																		//$course_name=$course[$i][$j];
																		echo "<td bgcolor=$bg_color style=\"text-align: center; vertical-align: middle;\"><font color=\"white\">$course_name</font></td>";
																	}
																}
																
															}
															else if($course[$i][$j]=="0"){
																echo "<td></td>";
															}
														}
														else{       //第一節
															if($course[$i][$j]!="0"){
																$courseID=$course[$i][$j];
																$sql="SELECT course_name FROM course WHERE permanent_class_number = '$courseID'";
																$result=$con->query($sql);
																$course_name="";
																while($row = mysqli_fetch_assoc($result)){
																	$course_name=$row["course_name"];
																}
																$key = array_search($course[$i][$j], $course_index);
																$bg_color=$td_bgcolor[$key%10];    
																if($course[$i+1][$j]==$course[$i][$j]){ //下堂課跟這堂課一樣
																	$column_num[$i+1]--;
																	if($course[$i+2][$j]==$course[$i][$j]){    //下下堂課跟這堂課一樣
																		$column_num[$i+2]--;
																		if($course[$i+3][$j]==$course[$i][$j]){
                                                                            echo "<td rowspan=\"4\" bgcolor=$bg_color style=\"text-align: center; vertical-align: middle;\"><font color=\"white\">$course_name</font></td>";
                                                                        }
                                                                        else{
                                                                            echo "<td rowspan=\"3\" bgcolor=$bg_color style=\"text-align: center; vertical-align: middle;\"><font color=\"white\">$course_name</font></td>";
                                                                        }
																	}
																	else{
																		echo "<td rowspan=\"2\" bgcolor=$bg_color style=\"text-align: center; vertical-align: middle;\"><font color=\"white\">$course_name</font></td>";
																	}
																}
																else{
																	//$course_name=$course[$i][$j];
																	echo "<td bgcolor=$bg_color style=\"text-align: center; vertical-align: middle;\"><font color=\"white\">$course_name</font></td>";
																}
															}
															else{   //空堂
																echo "<td></td>";
															}
														}
													}
												}
												echo "</tr>";
											}
										?>
									</table>

									<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
									<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
									<script type="text/javascript">
										function Export() {
											html2canvas(document.getElementById('tbl'), {
												onrendered: function (canvas) {
													var data = canvas.toDataURL();
													var docDefinition = {
														content: [{
															image: data,
															width: 500
														}]
													};
													pdfMake.createPdf(docDefinition).download("Table.pdf");
												}
											});
										}
									</script>
								
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