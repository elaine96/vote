<?php
	session_start();
	header("content-type:text/html;charset=utf-8");
	if ($_POST['name']!=""&&$_POST['password']!=""){
		$conn=mysql_connect("localhost","root","zyl19961020") or die("数据库连接失败");
		mysql_query("set names utf8");
		mysql_select_db("elaine");
		$name=addslashes(trim($_POST['name']));
		$password=md5(addslashes(trim($_POST['password'])));
		$sql="select * from user where name='{$name}'";  
		$rs=mysql_query($sql); 
		$num=mysql_num_rows($rs);
		if($num){ 
			$row=mysql_fetch_array($rs);
			if($password===$row['password']){
				if($_SESSION['code']==$_POST['code']){
					$_SESSION['name']=$name;
					echo "<script language=\"javascript\">";
					echo "alert(\"登录成功！\\n欢迎".$_SESSION['name']."\");";
					echo "location.href=\"vote.php\"";
					echo "</script>";
				}
				else{
					echo "<script language=\"javascript\">";
					echo "alert(\"验证码不正确！\");";
					echo "location.href=\"login.php\"";
					echo "</script>";
					echo "<br>";
				}
			}else{
				echo "<script language=\"javascript\">";
				echo "alert(\"密码不正确！\");";
				echo "location.href=\"login.php\"";
				echo "</script>";
				echo "<br>";
			} 
		}else{
			echo "<script language=\"javascript\">";
			echo "alert(\"用户不存在！\");";
			echo "location.href=\"login.php\"";
			echo "</script>";
			echo "<br>";
		}		
	}else{
		echo "<script language=\"javascript\">";
		echo "alert(\"用户名和密码不能为空！\");";
		echo "location.href=\"login.php\"";
		echo "</script>";
		echo "<br>";
	}
	
?>