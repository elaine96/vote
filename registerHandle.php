<?php
	header("content-type:text/html;charset=utf-8");	
	if($_POST['name']==''||$_POST['password']==''||$_POST['email']=="")
	{
		echo "<script language=\"javascript\">";
		echo "alert(\"用户名,密码,邮箱不能为空！\");";	
		echo "location.href=\"register.php\"";	
		echo "</script>";
	}
	else
	{
		$conn=mysql_connect("localhost","root","zyl19961020") or die("数据库连接失败");
		mysql_query("set names utf8");
		mysql_select_db("elaine");
		$name=$_POST['name'];
		$password=md5($_POST['password']);
		$password1=md5($_POST['password1']);
		$email=$_POST['email'];
		$sql = "select * from user where name='$name'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0)
		{
			echo "<script language=\"javascript\">";
			echo "alert(\"用户名已存在！\");";	
			echo "location.href=\"register.php\"";		
			echo "</script>";
			echo "<br>";
		}else{
			$sql1="insert into user(name,password,email) values ('$name','$password','$email')";
			$result=mysql_query($sql1);
			if($password!=$password1){
				echo "<script language=\"javascript\">";
				echo "alert(\"密码不一致\");";
				echo "location.href=\"register.php\"";			
				echo "</script>";
				echo "<br>";
			}
			if($result){
				if($_SESSION['code']==$_POST['code']){
					echo "<script language=\"javascript\">";
					echo "alert(\"注册成功！\\n请重新登录！\");";
					echo "location.href=\"login.php\"";		
					echo "</script>";
				}
				else{
					echo "<script language=\"javascript\">";
					echo "alert(\"验证码不正确！\");";
					echo "location.href=\"register.php\"";
					echo "</script>";
					echo "<br>";
				}
			}else{
				echo "<script language=\"javascript\">";
				echo "alert(\"注册失败！\");";
				echo "location.href=\"register.php\"";		
				echo "</script>";
				echo "<br>";
			}
		}		
	}
?>