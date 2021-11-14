<?php 

    session_start();
    include("connect.php");  

    if (isset($_GET['logout'])) {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
        header('location: index.php');
    }

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
<body>

<header>
    <a href="#" class="logo"><i class="fas fa-ytensils"></i>commm</a>

    <div id="menu-bar" class="fas fa-bars"></div> 
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

<section class="home" id="home">

    <div class="content">
        <h1>commm</h1>
        <p>ขายคอม</p>
        <a href="product_menu.php" class="btn">order now</a>
    </div>

    <div class="image">
        <img src="images/home come.png" alt="">
    </div>

   
</section>    

<section class="promotion" id="promotion">

    <h1 class="heading">ขาย<span>ดีที่สุด</span></h1>
    <div class="box-container">
    <?php

        $sql = "SELECT detail.id_product AS id_pro ,detail.name AS name , SUM(detail.amount) AS sum_amount ,product.price AS price ,product.imgpro AS imgpro 
        FROM `detail` JOIN product ON detail.id_product=product.id_product 
        GROUP BY name ORDER BY `sum_amount` DESC LIMIT 5";
		$query = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($query)){
?>
        <div class="box">
        <form action="index.php" method="post">
        <img src='images/<?=$row["imgpro"]?>' >
            <div>
                <h2><span><?=$row ["name"]?></span></h2>
            </div>
            <div>
            <h1><span><?=number_format($row ["price"])?></span></h1>
            </div>

            <button class="btn" type="submit"  name="add">Add to Cart</button>
            <input type='hidden' name='product_id' value='<?=$row['id_pro']?>'>
            </form>
        </div>
<?php } ?>


    </div>
</section>


<div class="step-container">

    <h1 class="heading">how it <span>works</span></h1>

    <section class="steps">

        <div class="box">
            <img src="images/step-1.png" width="200" alt="">
            <h3>choose your product</h3>
        </div>
        <div class="box">
            <img src="images/step-3.png" width="200" alt="">
            <h3>free and fast delivery</h3>
        </div>
        <div class="box">
            <img src="images/step-2.png" width="200" alt="">
            <h3>easy payments methods</h3>
        </div>
        <div class="box">
            <img src="images/step-4.png" width="200" alt="">
            <h3>and finally, enjoy your product</h3>
        </div>
    
    </section>

</div>



<footer class="footer">

    <div class="share">
        <a href="#" class="btn">facebook</a>
        <a href="#" class="btn">twitter</a>
        <a href="#" class="btn">instagram</a>
        <a href="#" class="btn">pinterest</a>
        <a href="#" class="btn">linkedin</a>
    </div>

</footer>

<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>

    <script src="script.js"></script>
    
</body>
</html>