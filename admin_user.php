<?php 

    session_start();
    include("connect.php");  

    if (isset($_GET['logout'])) {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
        header('location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style_index.css">
</head>
<body style="font-size: large;">

<!-- header section starts -->

<header>
    <a href="#" class="logo"><i class="fas fa-ytensils"></i>commm</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="admin.php">หมวดหมู่</a>
        <a href="admin_product.php">สินค้า</a>
        <a href="admin_submit.php">ออเดอร์</a>
        <a href="admin_user.php">ผู้ใช้</a>
        <?php if (isset($_SESSION['username'])) : ?>
             <a> <strong><?php echo $_SESSION['username']; ?></strong></a>
             <a href="index.php?logout='1'" style="color: red;">Logout</a>
        <?php endif ?>
    <div id="menu-bar" class="fas fa-bars"></div>

</header>


<section>
<table width="600" border="0" align="center" class="square" style="padding-top:100px">
<h1>รายการสินค้าสินค้า</h1>
    <tr>
      <td colspan="8" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
	  <td align="center" bgcolor="#EAEAEA" width='200' >ชื่อผู้ใช้</td>
      <td bgcolor="#EAEAEA" width='200'>รหัสผ่าน</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>ชื่อ</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>นามสกุล</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>เบอร์</td>
      <td align="center" bgcolor="#EAEAEA" width='400'>อีเมลล์</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>ลบ</td>
    </tr>
 <?php

	include("connect.php");
    if(isset($_GET['del'])){
        $id = $_GET['id'];
        $sql2 = "DELETE FROM user WHERE id_user=$id";
		$query2 = mysqli_query($conn, $sql2);
    }


		$sql = "SELECT * FROM `user`";
		$query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_array($query)){
		echo "<tr>";
        echo "<td >" . $row["username"] . "</td>";
		echo "<td >" . $row["password"] . "</td>";
		echo "<td  align='right'>" .$row["name"] . "</td>";
		echo "<td  align='right'> ".$row["Lname"] ."</td>";
		echo "<td  align='right'>".$row["phone"] ."</td>";
        echo "<td  align='right'>".$row["email"] ."</td>";
		//remove product
		echo "<td ' align='center'><a href='admin_user.php?del=del&id=" .$row["id_user"] . "'>ลบ</a></td>";
		echo "</tr>";
        }

?> 
</table>

</section>

    <!-- custom js file link -->
    <script src="script.js"></script>
    
</body>
</html>