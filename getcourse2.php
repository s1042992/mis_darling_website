<?php
	session_start();
	if(isset($_GET["textsearch"]))
	{
		$textsearchName=$_GET["textsearch"];
		
		
		//echo $projName;
		include("mysql_connect.inc.php");//連接資料庫
		$name=$_SESSION["user_name"];
		
		
		
		//echo $name;
		echo "</br>";
		$sql="SELECT * FROM `attraction` WHERE `attraction_name` LIKE '%$textsearchName%'";
		$result=mysqli_query($db,$sql);
		echo"<ul class='cards'>";
		 while($row = mysqli_fetch_array($result)):;
			$sql_rate="SELECT * FROM `attraction_evaluation` WHERE `attraction_id`='$row[0]'";//$row[0]=id
			$result_rate=mysqli_query($db,$sql_rate);
			$row_rate = mysqli_fetch_array($result_rate);
			@$average_rate=($row_rate[1]+$row_rate[2]+$row_rate[3])/($row_rate[4]*3);
			
			
			$imgpart="<img src='".$row[3]."'/>";
			$majorName=$row[1];
			
			
			echo"<li class='cards_item'>";
			echo"<div class='card'>";
			echo"<div class='card_image'>";
			echo"<a href='classdetail.php?";
			echo"class=";
			echo $row[0];
			echo"'>";
			echo $imgpart;
			echo"</div>";
			echo"</a>";
			echo"<div class='card_content'>";
			echo"<h2 class='card_heading'>";
			echo $row[1];
			echo"</h2>";
			echo"地址：";
			echo $row[2];
			echo"</br>";
			echo"介紹：";
			echo $row[4];
			echo"</br></br>";
			
			echo"</br>";
			
			echo"</br>";
			echo"平均評價：";
			$rate=number_format($average_rate,1);
			echo $rate;
			echo "<div class='star-ratings-sprite'>";
			echo "<span style='";
			echo "width:";
			$percent=$average_rate*100/5;
			echo $percent;
			echo"%' class='star-ratings-sprite-rating'></span></div>";
			echo"<a href='classdetail.php?";
			echo"class=";
			echo $row[0];
			echo"' class='card_button'><font color='#84dbbd'>查看更多</font></a>";
			echo"</div></div></li>";
		endwhile;
		echo"</ul>";
		
		
	}
?>