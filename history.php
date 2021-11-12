<?php
	session_start();
	
	
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style_cart.css">
<title>Shopping Cart</title>
</head>

<body>

<header>
    <a href="#" class="logo"><i class="fas fa-ytensils"></i>commm</a>

    <div id="menu-bar" class="fas fa-bars"></div>


  

    
    <nav class="navbar">
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

<section class="home" id="home">
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
	 
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
<?php
$idd=$_SESSION["user_id"];
echo $idd;
if(!empty($_SESSION['username']))
{
	include("connect.php");

    $username=$_SESSION["username"];

		$sql = "SELECT * FROM orders JOIN user ON orders.id_user=user.id_user where user.username ='$username'";
    $query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_array($query)){
		
		echo "<tr>";
		echo "<td width='300'>" . $row["order_date"] . "></td>";
		echo "<td width='334'>" . $row["totalprice"] . "</td>";
		echo "<td width='46' align='right'>" . $row["status"] . "</td>";
		echo "<td width='57' align='right'></td>";  
		
		echo "</tr>";
}
}
?>
<tr>
<td><a href="product_menu.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
	
	<input type='hidden' name='id_product' value='<?=$row['id_product']?>'>
    
</td>
</tr>
</table>
</form>
</section>
</body>
</html>