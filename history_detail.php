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


  
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>รายละเอียดสินค้า</span></td>
    </tr>
    <tr>
	 
      <td align="center" bgcolor="#EAEAEA">ลำดับที่</td>
      <td align="center" bgcolor="#EAEAEA">ชื่อสินค้า</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
	    <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">ชื่อ</td>
      
     
    </tr>
<?php
if(!empty($_SESSION['username']))
{
	include("connect.php");
    $id = $_GET["ID"];
    $username=$_SESSION["username"];
    $query = "SELECT * FROM detail WHERE id_order = '$id'" ;
    $result = mysqli_query($conn, $query);
    $query2 = "SELECT * FROM orders WHERE ID_Orders = '$id'" ;
    $result2 = mysqli_query($conn, $query2);
  
    $i = 1; 


     while ($row = mysqli_fetch_array($result)) {


        echo "<tr align='center'>";
        echo "<td width='600'>" . $i .  "</td> ";
        echo "<td width='600' align='center'>" . $row["name"] . "</td>";
        echo "<td>" . $row["amount"] .  " ชิ้น</td> ";
        echo "<td width='600'> &nbsp; &nbsp; &nbsp; &nbsp;" . number_format($row["price"], 2) .  " บาท</td> ";


        echo "</tr>";
        
        $i++;
      }
      
        $row1 = mysqli_fetch_array($result2);
        $id_user = $row1["id_user"];
        $id_address = $row1["id_address"];
        $query3 = "SELECT * FROM user where id_user = '$id_user'";
        $query4 = "SELECT * FROM `address` where id_address = '$id_address'";
        $result3 = mysqli_query($conn, $query3);
        $row3 = mysqli_fetch_array($result3);
        $result4 = mysqli_query($conn, $query4);
        $row4 = mysqli_fetch_array($result4);

        
        

      

      
  }
?>
<tr>
<td><a href="product_menu.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
	
	<input type='hidden' name='id_product' value='<?=$row['id_product']?>'>
    
</td>
</tr>

</table>

<p> <?=$row3["name"]?> </p>
<p> <?=$row4["address"]?> </p>
<p> <?=$row4["country"]?> </p>
<p> <?=$row4["state"]?> </p>
<p> <?=$row4["city"]?> </p>
<p> <?=$row4["zipcode"]?> </p>

 

</section>
</body>
</html>