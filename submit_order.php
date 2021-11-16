<?php
	session_start();
    include("connect.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
if(!isset($_SESSION['username'])){
	 ?>
	 <script type="text/javascript">
	alert("โปรดลงทะเบียนก่อน");
	window.location ='login.php';
</script>
 
	 <?php
	 //header("location : login.php");
}else{
$total=0;
$total_qty=0;
$sum=0;
    foreach($_SESSION['cart'] as $p_id=>$qty){

        $sql	= "select * from product where id_product=$p_id";
        $query	= mysqli_query($conn, $sql);
        $row	= mysqli_fetch_array($query);
        $sum	= $row['price']*$qty;
        $total_qty += $qty;
        $total	+= $sum;
    }

	$dttm = Date("Y-m-d G:i:s");

	$username = $_SESSION['username'];
	$sql5 = "SELECT * FROM user where username ='$username'";
    $query5 = mysqli_query($conn, $sql5);
	$row5 = mysqli_fetch_array($query5);
	$id_user = $row5["id_user"];

	$sql6 = "SELECT * FROM address where id_user ='$id_user'";
    $query6 = mysqli_query($conn, $sql6);
	$row6 = mysqli_fetch_array($query6);
	if(empty($row6)){
		?>

	 <script type="text/javascript">
		alert("โปรดบันทึกที่อยู่ก่อน");
		window.location ='address.php';
	</script>	
 
	 <?php
	}else{
	$id_address = $row6["id_address"];

	$sql1	= "INSERT INTO `orders`(`order_date`, `totalprice`, `amount`, `id_user`,`id_address`) 
                 VALUES ( '$dttm','$total','$total_qty','$id_user','$id_address')";
    
	$query1	= mysqli_query($conn, $sql1);

	$sql2 = "select max(ID_Orders) as ID_Orders from orders ";
	$query2	= mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array($query2);
	$o_id = $row2["ID_Orders"];

	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "select * from product where id_product=$p_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$pname = $row3['pname'];
		$total1	= $row3['price']*$qty;
        echo "  ";
		
		$sql4	= "INSERT INTO `detail`(`price`, `amount`,`name`, `id_product`, `id_order`) VALUES ('$total1','$qty','$pname','$p_id','$o_id')";
        
		$query4	= mysqli_query($conn, $sql4);
	}

	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $p_id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
	}
}
    
?>

<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='product_menu.php';
</script>
 




</body>
</html>