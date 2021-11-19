<?php include('register_db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>

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
	
	<form id="form">
		<h1>ฟอร์มลงทะเบียน</h1>
		<div id="error_msg"></div>
		<div>
			<input type="text" name="username" placeholder="ชื่อผู้ใช้" id="username" ><br>
			<span></span>
		</div>
		<div>
			<input type="text" name="email" placeholder="อีเมล์" id="email"><br>
			<span></span>
		</div>
        <div>
			<input type="name" name="name" placeholder="ชื่อ" id="name"><br>
			<span></span>
		</div>
        <div>
			<input type="Lname" name="Lname" placeholder="นามสกุล" id="Lname"><br>
			<span></span>
		</div>
        <div>
			<input type="phone" name="phone" placeholder="เบอร์โทรศัพท์" id="phone"><br>
			<span></span>
		</div>
		<div>
			<input type="password" name="password" placeholder="รหัสผ่าน" id="password">
		</div>
		<div>
			<button tyoe="button" name="register" id="reg_btn">ลงทะเบียน</button>
		</div>
		<a href="login.php">กลับหน้า login</a>
	</form>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="script_ajax.js"></script>

</body>
</html>