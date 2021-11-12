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


  

    
    <nav class="navbar">
        <a href="product_menu.php">สินค้า</a>
        <a href="cart.php">ตระกร้าสินค้า</a>
        <a href="order.php">ประวัติการสั่งซื้อ</a>
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
        }else{
            $sql1 = "SELECT * FROM product ";
        }
          
          $sql2 = "SELECT * FROM category ";

          $result1 = mysqli_query($conn, $sql1);
          $result2 = mysqli_query($conn, $sql2);

        ?>
    <div class="menu">   
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
                    <div class="image">
                        <img src='images/<?=$row["imgpro"]?>' alt="">
                     </div>
                    <div class="namepro">
                    <span><?=$row ["pname"]?></span>
                    </div>
                    <div>

                    </div>
                    <div>
                    <span><?=number_format($row ["price"])?></span>
                    </div>
                    <div>
                    <button type="submit"  name="add">Add to Cart</button>
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