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
<form style="padding-top: 100px;" action="admin_addcate.php" method="post">
<h1>ฟอร์มเพิ่มประเภทสินค้า</h1><br>
    <label for="fname">ชื่อประเภทสินค้า</label>
    <input type="text" name="pname"><br>
    
    <input type="submit" value="เพิ่มประเภทสินค้า">
    
</form>
</div>
<table width="600" border="0" align="center" class="square" style="padding-top:100px">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#EAEAEA">cate_name</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
      
    </tr>
 <?php

    include("connect.php");
    if(isset($_GET['del'])){
        $id = $_GET['id'];
        $sql2 = "DELETE FROM category WHERE id_cate=$id";
        $query2 = mysqli_query($conn, $sql2);
    }


        $sql = "SELECT * FROM category ";
        $query = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($query)){
        echo "<tr>";
        echo "<td width='334'>" . $row["cate_name"] . "</td>";
        //remove product
        echo "<td width='46' align='center'><a href='admin.php?del=del&id=" .$row["Id_cate"] . "'>ลบ</a></td>";
        echo "</tr>";

        }

?> 
</table>

</section>
    <!-- custom js file link -->
    <script src="script.js"></script>
    
</body>
</html>