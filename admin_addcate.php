<?php
    include("connect.php"); 
    $cate_name = $_POST["cate_name"];
    $img_cate = $_POST["img_cate"];

    
		$sql = "INSERT INTO `category`(`cate_name`, `img_cate`) 
          VALUES ('$cate_name','$img_cate')";
		$query = mysqli_query($conn, $sql);

    header("location: admin.php")

?>