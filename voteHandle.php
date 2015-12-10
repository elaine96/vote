<?php
	header("content-type:text/html;charset=utf-8");
	$conn=mysql_connect("localhost","root","zyl19961020") or die("数据库连接失败");
	$vote_id=$_POST['vote_id'];
	$num=
	$sql="insert into vote(name,vote_id,num) values('".$_SESSION['name']."','".$vote_id."','".$num."')";
	$rs=mysql_query($sql); 
?>