<?php include('register_db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>

	<link rel="stylesheet" href="style_login.css">
	
</head>
<header>
    <a href="#" class="logo"><i class="fas fa-ytensils"></i>commm</a>

    <div id="menu-bar" class="fas fa-bars"></div>


  

    
    <nav class="navbar">
        <a href="product_menu.php">สินค้า</a>
        <a href="cart.php">ตระกร้าสินค้า</a>
        <a href="order.php">ประวัติการสั่งซื้อ</a>
        <a href="address.php">ที่อยู่</a>
        <?php if (!isset($_SESSION['username'])) : ?>
        <a href="login.php">เข้าสู่ระบบ</a>
        <?php endif ?>
        <?php if (isset($_SESSION['username'])) : ?>
             <a> <strong><?php echo $_SESSION['username']; ?></strong></a>
             <a href="index.php?logout='1'" style="color: red;">Logout</a>
        <?php endif ?>
        
            
            

    </nav>
    
    <div id="menu-bar" class="fas fa-bars"></div>

</header>
<body>
	
	<form id="form">
		<h1>Register</h1>
		<div id="error_msg"></div>
		<div>
			<input type="text" name="username" placeholder="Username" id="username" ><br>
			<span></span>
		</div>
		<div>
			<input type="text" name="email" placeholder="Email" id="email"><br>
			<span></span>
		</div>
        <div>
			<input type="name" name="name" placeholder="name" id="name" >
		</div>
			<span></span>
        <div>
			<input type="Lname" name="Lname" placeholder="Lastname" id="Lname" >
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