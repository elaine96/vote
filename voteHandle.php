<?php
	header("content-type:text/html;charset=utf-8");
	$conn=mysql_connect("localhost","root","zyl19961020") or die("数据库连接失败");
	$vote_id=$_POST['vote_id'];
	$name=$_SESSION['name'];
	mysql_select_db('elaine');
	mysql_query("set names utf8");
	$sql="update vote set name='$name' where vote_id='$vote_id'";
	$rs=mysql_query($sql);
	if($rs)
	{
		echo "<script type=\"text/javascript\">";
		echo "alert(\"添加投票成功！\");";
		echo "location.href=\"vote.php\"";
		echo "</script>";
	}
	else{
		echo mysql_error();
		// echo "<script type=\"text/javascript\">";
		// echo "alert(\"添加投票失败！\");";
		// echo "location.href=\"vote.php\"";
		// echo "</script>";
	}
?>