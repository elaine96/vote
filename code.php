<?php
	include 'vcode.class.php';
	$vcode=new Vcode(80,30,4);
	$_SESSION['code']=$vcode->getcode();
	$vcode->outimg();



?>