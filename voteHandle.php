<?php
	header("content-type:text/html;charset=utf-8");
	$conn=mysql_connect("localhost","root","zyl19961020") or die("数据库连接失败");
	mysql_select_db('elaine');
	mysql_query("set names utf8");
	$name=$_SESSION['name'];
	$vote=$_POST['vote_id']; 
	$sql="select * from user where name='$name'";
	$query=mysql_query($sql);
	$rs=mysql_fetch_array($query);
	if($rs['vote']==1)
	{
		echo "<script type=\"text/javascript\">";
		echo "alert(\"您已投过票！\");";
		echo "location.href=\"vote.php\"";
		echo "</script>";
	}
	else{		
		$conn=mysql_connect("localhost","root","zyl19961020") or die("数据库连接失败");
		$vote=$_POST['vote_id'];
		$name=$_SESSION['name'];
		mysql_select_db('elaine');
		mysql_query("set names utf8");
		$sql1="update vote set num=num+1,name=concat('$name,',name) where vote_id=$vote";
		$rs1=mysql_query($sql1);		
		if($rs1)
		{
			$conn=mysql_connect("localhost","root","zyl19961020") or die("数据库连接失败");
			mysql_select_db('elaine');
			mysql_query("set names utf8");
			$sql2="update user set vote=1 where name='$name'";
			$rs2=mysql_query($sql2);
			if($rs2){
				echo "<script type=\"text/javascript\">";
				echo "alert(\"添加投票成功！\");";
				echo "location.href=\"vote.php\"";
				echo "</script>";
			}
			else{
				echo "<script type=\"text/javascript\">";
				echo "alert(\"添加投票失败！\");";
				echo "location.href=\"vote.php\"";
				echo "</script>";
			}	
		}
		else{
			echo "<script type=\"text/javascript\">";
			echo "alert(\"添加投票失败！\");";
			echo "location.href=\"vote.php\"";
			echo "</script>";
		}
	}
?>