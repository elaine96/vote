<!DOCTYPE html>
<html>
<head>
   <title>古风</title>
   <meta charset="utf8">
   <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/css.css">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<audio autoplay="autoplay" loop="-1" height="100" width="100">
	   <source src="music/乱红.mp3" type="audio/mp3">
	</audio>
	<div class="register">
		<br/><form class="form-inline" role="form" action="registerHandle.php" method="post">
		&nbsp;&nbsp;&nbsp;用户名:<input type="text" name="name" class="form-control"><br/><br/>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;密码:<input type="password" name="password" class="form-control"><br/><br/>
		&nbsp;确认密码:<input type="password" name="password1" class="form-control"><br/><br/>
		&nbsp;电子邮箱:<input type="text" name="email" class="form-control"><br/><br/>      		
      &nbsp;验证码：<input type="text" name="code" class="form-control" placeholder="区分大小写" style="width:100px" >
      <img src="code.php" onclick="this.src='code.php?d='+Math.random();"><br/><br/>
      <div style="text-align:center">
         <table>
            <td>
               <tr><input type="submit" name="register" value="完成注册" class="button"/></form></tr>
               <tr><form class="form-inline" role="form" action="login.php" method="post">
               &nbsp;&nbsp;<input type="submit" name="exit" value="退出" class="button"/></form></tr>
            </td> 
         </table>
      </div>
	</div>
</body>
</html>