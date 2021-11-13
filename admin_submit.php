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
      <b>ประวัติการสั่งซื้อ</span></td>
    </tr>
    <tr>
	 
      <td align="center" bgcolor="#EAEAEA">เวลา</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">รายละเอียด</td>
	  <td align="center" bgcolor="#EAEAEA">จำนวน</td>
	   <td align="center" bgcolor="#EAEAEA">สถานะการสั่งซื้อ</td>
     
    </tr>
<?php
if(!empty($_SESSION['username']))
{
	include("connect.php");

    $username=$_SESSION["username"];

		$sql = "SELECT * FROM orders JOIN user ON orders.id_user=user.id_user where user.username ='$username'";
    $query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_array($query)){
		
		echo "<tr>";
		echo "<td width='1200' align='center'>" . $row["order_date"] . "></td>";
		echo "<td width='334' align='center'>" . $row["totalprice"] . "</td>";
		// echo "<td width='800' align='center'>รายละเอียดออเดอร์</td>";
		echo "<td width='1200' align='center'>" ."<a href='history_detail.php?ID=$row[0]' >".'รายละเอียดออเดอร์'."</td>";
		echo "<td width='334' align='center'>" . $row["amount"] . "</td>";
        echo "<td width='20000' align='center'>" . $row["status"] . "</td>";
		echo "<td width='20000' align='center' >" . "<a href='history_detail.php?ID=$row[0]' >" . '<i class="bi bi-clipboard-data " style="color : #529714;font-size: 25px;"></i>' .  "</td> ";
        echo "<td width='20000' align='center'>";
                if ($row["status"] == "รอดำเนินการ") {
        echo "<a href='#!'  ><span class='spinner-border spinner-border-sm' role='status' ></span>กำลังดำเนินก</a>";
                } else if ($row["status"] == "cancel") {
        echo "<a href='#!' class='btn btn-danger  mt-1 mb-1'>ยกเลิกแล้ว</a>";
                } else {
        echo   "<a  class='btn btn-success  mt-1 mb-1'>เสร็จสิ้นแล้ว</a>";
                }
        echo "</td>";
        echo "<td width='20000' align='center'>";
                if ($row["status"] == "รอดำเนินการ") {
        echo "<a href='admin_submit1.php?ID_Orders=$row[0]' onclick=\"return confirm('ยืนยันการยอมรับ... !!!')\"  >ยอมรับออเดอร์</a>";
        echo "<a href='admin_submit2.php?ID_Orders=$row[0]' onclick=\"return confirm('ยืนยันการยกเลิก... !!!')\"  >ยกเลิกออเดอร์</a>";}
		 
		
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