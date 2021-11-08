<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

	<link rel="stylesheet" href="style_login.css">
</head>
<body>
	
	<form id="form" action="login_db.php" method="post">
		<h1>Login</h1>
		<div id="error_msg"></div>
		<div>
			<input type="text" name="username" placeholder="Username" id="username">
			<span></span>
		</div>
		<div>
			<input type="text" name="password" placeholder="Password" id="password">
			<span></span>
		</div>
		<div>
			<button tyoe="button" name="login_btn" id="login_btn">login</button>
		</div>
		<a href="register.php">ลงทะเบียน</a>
	</form>

	
</body>
</html>
