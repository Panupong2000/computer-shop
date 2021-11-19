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
    <link rel="stylesheet" href="style_admin.css">
   

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
<div style="width: 800px;">
<form style="padding-top: 100px;" action="admin_addproduct_db.php" method="post">
    <h1>ฟอร์มเพิ่มสินค้า</h1><br>
    <label for="fname">ชื่อสินค้า</label>
    <input type="text" name="pname"><br>
    <label for="fname">ราคาสินค้า</label>
    <input type="number" name="price"><br>
    <label for="fname">จำนวน</label>
    <input type="number" name="amount"><br>
    <label for="fname">ชื่อรูป</label>
    <input type="text" name="imgpro"><br>

    <div class="custom-select" >
    <select name="cate" style="width:300px; height: 100px; font-size:20px;">
        <?php
            $sql = "select * from category ";
            $query = mysqli_query($conn, $sql);
            echo "<option value='' selected='selected'>เลือกหมวดหมู่</option>";
            while ($row = mysqli_fetch_array($query)){
            echo "<option value=".$row['Id_cate'].">".$row['cate_name']."</option>";

            }
        ?>
    </select>
    </div>
    
    <br>
    <label for="fname">รายละเอียดสินค้า</label>
    <input type="text" name="detail" row="3" cols="40"></input><br>
    <input style="font-size: 20px;" type="submit" value="เพิ่มสินค้า">
    
    </div>
</form>

</section>

<section>
<table width="600" border="0" align="center" class="square" style="padding-top:100px">
<h1>รายการสินค้าสินค้า</h1>
    <tr>
      <td colspan="8" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
	  <td align="center" bgcolor="#EAEAEA" width='200' >รูป</td>
      <td bgcolor="#EAEAEA" width='200'>สินค้า</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>ราคา</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>จำนวน</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>รายละเอียด</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>หมวดหมู่</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>ลบ</td>
      <td align="center" bgcolor="#EAEAEA" width='200'>แก้ไข</td>
    </tr>
 <?php

	include("connect.php");
    if(isset($_GET['del'])){
        $id = $_GET['id'];
        $sql2 = "DELETE FROM product WHERE id_product=$id";
		$query2 = mysqli_query($conn, $sql2);
    }


		$sql = "SELECT id_product , imgpro , pname , price , Amount , detail_product , category.cate_name as catename FROM product JOIN category ON product.Id_cate=category.Id_cate";
		$query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_array($query)){
		echo "<tr>";
		echo "<td '><img src='images/" . $row["imgpro"] . "'width='150' height='150'></td>";
		echo "<td >" . $row["pname"] . "</td>";
		echo "<td  align='right'>" .$row["price"] . "</td>";
		echo "<td  align='right'> ".$row["Amount"] ."</td>";
		echo "<td  align='right'>".$row["detail_product"] ."</td>";
        echo "<td  align='right'>".$row["catename"] ."</td>";
		//remove product
		echo "<td ' align='center'><a href='admin_product.php?del=del&id=" .$row["id_product"] . "'>ลบ</a></td>";
        echo "<td  align='center'><a href='edit_product.php?id=" .$row["id_product"] . "'>แก้ไข</a></td>";
		echo "</tr>";
        }

?> 
</table>

</section>

    <!-- custom js file link -->
    <script src="script.js"></script>
    
</body>
</html>