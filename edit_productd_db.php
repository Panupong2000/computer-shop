<?php
    include("connect.php"); 
    $pname = $_POST["pname"];
    $price = $_POST["price"];
    $amount = $_POST["amount"];
    $imgpro = $_POST["imgpro"];
    $cate = $_POST["cate"];
    $detail = $_POST["detail"];
    $id = $_POST["pid"];

    
		$sql = "UPDATE product SET pname='$pname' , price='$price' , Amount='$amount' , 
            imgpro='$imgpro' , detail_product='$detail' , Id_cate = '$cate' where id_product ='$id'";
		$query = mysqli_query($conn, $sql);

    header("location: admin_product.php")

?>