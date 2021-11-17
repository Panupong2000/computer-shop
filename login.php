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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<header>
    <a href="#" class="logo"><i class="fas fa-ytensils"></i>commm</a>

   


  

    
    <nav class="navbar">
		<a href="index.php">หน้าหลัก</a>
        <a href="product_menu.php">สินค้า</a>
        <a href="cart.php">ตระกร้าสินค้า</a>
        <a href="history.php">ประวัติการสั่งซื้อ</a>
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

	<script src="script.js"></script>
</body>
</html>
