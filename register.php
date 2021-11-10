<?php include('register_db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>

	<link rel="stylesheet" href="style_login.css">
	
</head>
<body>
	
	<form id="form">
		<h1>Register</h1>
		<div id="error_msg"></div>
		<div>
			<input type="text" name="username" placeholder="Username" id="username" >
			<span></span>
		</div>
		<div>
			<input type="text" name="email" placeholder="Email" id="email">
			<span></span>
		</div>
        <div>
			<input type="name" name="name" placeholder="name" id="name" required pattern="^[ก-๏\s]+$">
		</div>
        <div>
			<input type="Lname" name="Lname" placeholder="Lastname" id="Lname" required pattern="^[ก-๏\s]+$">
		</div>
        <div>
			<input type="phone" name="phone" placeholder="Phone" id="phone">
		</div>
		<div>
			<input type="password" name="password" placeholder="Password" id="password">
		</div>
		<div>
			<button tyoe="button" name="register" id="reg_btn">Register</button>
		</div>
		<a href="login.php">กลับหน้า login</a>
	</form>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="script_ajax.js"></script>
</body>
</html>