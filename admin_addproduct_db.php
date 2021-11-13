<?php
    include("connect.php"); 
    $pname = $_POST["pname"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];
    $imgpro = $_POST["imgpro"];
    $cate = $_POST["cate"];
    $detail = $_POST["detail"];
    $id = $_POST["pid"];

    
		$sql = "INSERT INTO `product`(`pname`, `price`, `Amount`, `imgpro`, `detail_product`, `Id_cate`) 
          VALUES ('$pname','$price','$amount',' $imgpro',' $detail','$cate')";
		$query = mysqli_query($conn, $sql);

    header("location: admin_product.php")

?>