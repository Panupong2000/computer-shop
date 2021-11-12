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
        <a href="">ออเดอร์</a>
        <a href="">ผู้ใช้</a>
        <a href="admin.php?logout='1'" style="color: red;">logout</a>
    </nav>
    <div id="menu-bar" class="fas fa-bars"></div>

</header>
<table width="600" border="0" align="center" class="square" style="padding-top:100px">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
	  <td align="center" bgcolor="#EAEAEA">รูป</td>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รายละเอียด</td>
      <td align="center" bgcolor="#EAEAEA">หมวดหมู่</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
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
		echo "<td width='300'><img src='images/" . $row["imgpro"] . "'width='150' height='150'></td>";
		echo "<td width='334'>" . $row["pname"] . "</td>";
		echo "<td width='46' align='right'>" .$row["price"] . "</td>";
		echo "<td width='57' align='right'> ".$row["Amount"] ."</td>";
		echo "<td width='93' align='right'>".$row["detail_product"] ."</td>";
        echo "<td width='93' align='right'>".$row["catename"] ."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='admin_product.php?del=del&id=" .$row["id_product"] . "'>ลบ</a></td>";
		echo "</tr>";
        }

?> 
<tr>
<td><a href="product_menu.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
	<input type="submit" name="button" id="button" value="ปรับปรุง" />
	<input type='hidden' name='id_product' value='<?=$row['id_product']?>'>
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='submit_order.php';" />
</td>
</tr>
</table>


    <!-- custom js file link -->
    <script src="script.js"></script>
    
</body>
</html>