<?php 

    session_start();
    include("connect.php");  

    if (isset($_GET['logout'])) {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
        header('location: index.php');
    }
    $id = $_GET["id"];

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
        <a href="">ออเดอร์</a>
        <a href="">ผู้ใช้</a>
        <a href="admin.php?logout='1'" style="color: red;">logout</a>
    </nav>
    <div id="menu-bar" class="fas fa-bars"></div>

</header>
<section>
    <div style="width: 800px;">
<form style="padding-top: 100px;" action="edit_productd_db.php" method="post">
    <h1>แก้ไขสินค้า</h1>
    <input type="hidden" name="pid" value="<?=$id?>">
    <label for="fname">ชื่อสินค้า</label>
    <input type="text" name="pname"><br>
    <label for="fname">ราคาสินค้า</label>
    <input type="number" name="price"><br>
    <label for="fname">จำนวน</label>
    <input type="number" name="amount"><br>
    <label for="fname">ชื่อรูป</label>
    <input type="text" name="imgpro"><br>
    <label for="fname">รายละเอียดสินค้า</label>
    <input type="text" name="detail" row="3" cols="40"></input><br>


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
    <br>
    <input type="submit" value="แก้ไขสินค้า">
    </div>
</section>
</form>


    <!-- custom js file link -->
    <script src="script.js"></script>
    
</body>
</html>