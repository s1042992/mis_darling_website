<?php
	session_start();
	include("mysql_connect.inc.php");//連接資料庫
	if(isset($_GET['coolness'])&&isset($_GET['sweetness'])&&isset($_GET['depth']))
	{
		echo  $_GET['coolness'];
		echo  $_GET['sweetness'];
		echo  $_GET['depth'];
		$classnum=$_SESSION['class_num'];
		$account=$_SESSION['user_name'];
		$sql="SELECT * FROM `attraction_evaluation` WHERE `attraction_id` = '$_SESSION[class_num]'";
		$result=mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result);
		
		echo $row[1];
		echo $row[2];
		echo $row[3];
		$newcoolness=$_GET['coolness']+$row[1];
		$newsweetness=$_GET['sweetness']+$row[2];
		$newdepth=$_GET['depth']+$row[3];
		$newtotal=$row[4]+1;
		$sql2="UPDATE `attraction_evaluation` SET facility='$newcoolness',service='$newsweetness',charm='$newdepth',num='$newtotal' WHERE `attraction_id` = '$classnum'";
		
		mysqli_query($db,$sql2)or die (mysqli_error($db)); //執行sql語法

		$sql="SELECT * FROM `userdata` WHERE `account` = '$account'";
		$result = $db->query($sql);
		$attraction_mark="";
		while($row = mysqli_fetch_assoc($result)){
			$attraction_mark=$row["attraction_mark"];
		}
		$arr_mark=explode(",",$attraction_mark);
		$arr_mark[$classnum-1]=1;
		$new_mark=$arr_mark[0];
		for($i=1;$i<count($arr_mark);$i++){
			$new_mark=$new_mark.",".$arr_mark[$i];
		}
		$sql="UPDATE `userdata` SET attraction_mark='$new_mark' WHERE `account` = '$account'";
		mysqli_query($db,$sql)or die (mysqli_error($db));

		header("location:thankyou.php");
	}
?>