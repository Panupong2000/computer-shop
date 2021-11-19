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

<section class="home" id="home">
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ประวัติการสั่งซื้อ</span></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#EAEAEA">ลำดับออเดอร์</td>
      <td align="center" bgcolor="#EAEAEA">เวลา</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">รายละเอียด</td>
	  <td align="center" bgcolor="#EAEAEA">จำนวน</td>
	   <td align="center" bgcolor="#EAEAEA">สถานะการสั่งซื้อ</td>
     <td align="center" bgcolor="#EAEAEA"></td>
     <td align="center" bgcolor="#EAEAEA">ปุ่มยืนยัน</td>
     <td align="center" bgcolor="#EAEAEA">ปุ่มยกเลิก</td>
     

     
    </tr>
<?php
if(!empty($_SESSION['username']))
{
	include("connect.php");

    $username=$_SESSION["username"];

		$sql = "SELECT * FROM orders ";
    $query = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_array($query)){
		
		echo "<tr>";
        echo "<td width='334' align='center'>" . $row["ID_Orders"] . "</td>";
		echo "<td width='1200' align='center'>" . $row["order_date"] . "></td>";
		echo "<td width='334' align='center'>" . $row["totalprice"] . "</td>";
		// echo "<td width='800' align='center'>รายละเอียดออเดอร์</td>";
		echo "<td width='1200' align='center'>" ."<a href='admin_history_detail.php?ID=$row[0]' >".'รายละเอียดออเดอร์'."</td>";
		echo "<td width='334' align='center'>" . $row["amount"] . "</td>";
        echo "<td width='20000' align='center'>" . $row["status"] . "</td>";
		
        echo "<td width='20000' align='center'>";
                if ($row["status"] == "รอดำเนินการ") {
        
                } else if ($row["status"] == "cancel") {
        echo "<a>ยกเลิกแล้ว</a>";
                } else {
        
                }
        echo "</td>";
        echo "<td width='20000' align='center'>";
                if ($row["status"] == "รอดำเนินการ") {
        echo "<a href='admin_submit1.php?ID_Orders=$row[0]' onclick=\"return confirm('ยืนยันการยอมรับ... !!!')\"  >ยอมรับออเดอร์</a>";}
        echo "<td width='20000' align='center'>";
                if ($row["status"] == "รอดำเนินการ") {
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