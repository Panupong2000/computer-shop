<?php

session_start();
include "connect.php" ;

if (isset($_POST['add'])){
    $p_id = $_POST['product_id'];
    if(isset($_SESSION['cart'][$p_id]))
		{
            
			$_SESSION['cart'][$p_id]++;
            
		}
		else
		{
           
			$_SESSION['cart'][$p_id]=1;
		}
        
        echo "<script>alert('เพิ่มสินค้าลงในตระกร้าแล้ว')</script>";
   
}


?>
<html>
    <head> 
        <meta charset="utf-8">
        <link rel="stylesheet" href="./style_product.css">
    </head>

    
<body >

<header>
    <a href="index.php" class="logo"><i class="fas fa-ytensils"></i>commm</a>

    <div id="menu-bar" class="fas fa-bars"></div>
    

  <div style="overflow: hidden;
  background-color: #e9e9e9;
  size:50px">
    <form action="product_menu.php" method="POST">
        <input type="text" name="search" placeholder="ค้นหา.." >
        <input type="submit">
    </form>
    </div>
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

    <div class="section">
        <?php
        if(isset($_GET['cate'])){
            $id_cate = $_GET['cate'];
            $sql1 = "SELECT * FROM product WHERE id_cate = $id_cate"; 
        }else if (isset($_POST['search'])){
            $search = $_POST['search'];
            $sql1 = "SELECT * FROM `product` WHERE pname LIKE '%$search%'";

        }
        else{
            $sql1 = "SELECT * FROM product ";
        }
          
         $result1 = mysqli_query($conn, $sql1);
         
          $sql2 = "SELECT * FROM category ";

          $result2 = mysqli_query($conn, $sql2);

        ?>
    <div class="menu">
        <div style="text-align: center; font-size :20px;"><h1>หมวดหมู่สินค้า</h1>   </div>
    <?php while ($row1 = mysqli_fetch_array($result2)) : ?>
        <div class="vertical-menu">
            <a href="product_menu.php?cate=<?=$row1["Id_cate"]?>" class="active"><?=$row1["cate_name"]?></a>
        </div>
    <?php endwhile; ?>
    </div> 

         <section class="product">
             
            <div class="box-container">
        <?php while ($row = mysqli_fetch_array($result1)) : ?>
            <div class="box">
                <form action="product_menu.php" method="post">
                <div class="relative">
                    <div class="image" style="text-align: center;">
                        <img src='images/<?=$row["imgpro"]?>' alt="">
                     </div>
                    <div class="namepro">
                    <span><h4><?=$row ["pname"]?></h4></span>
                    </div>
                    <div style="height: 120px;">
                    <span><?=$row ["detail_product"]?></span>
                    </div>
                    <div style="height: 20px;">
                    <span>ราคา  <?=number_format($row ["price"])?> บาท</span>
                    </div><br>
                    <div style="text-align: center;">
                    <button class="btn" type="submit"  name="add">Add to Cart</button>
                    <input type='hidden' name='product_id' value='<?=$row['id_product']?>'>
                    </div>
                </div>
                </form>
        </div>
    <?php endwhile; ?>
            </div>
    </section>
        </div>
</body>
</html>