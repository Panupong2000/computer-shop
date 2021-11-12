<?php
	session_start();
    include("connect.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
if(empty($_SESSION['username'])){
	echo "<script>alert('โปรดลงทะเบียนก่อน')</script>";
	header("location : login.php");
}
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

	//บันทึกการสั่งซื้อลงใน order
	$id_user = $row5["id_user"];
	$sql1	= "INSERT INTO `orders`(`order_date`, `totalprice`, `amount`, `id_user`) 
                 VALUES ( '$dttm','$total','$total_qty','$id_user')";
    
	$query1	= mysqli_query($conn, $sql1);

	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
	$sql2 = "select max(ID_Orders) as ID_Orders from orders ";
	$query2	= mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array($query2);
	$o_id = $row2["ID_Orders"];

    echo "$sum"."<br>";
    echo "$total_qty"."<br>";
    echo "$dttm"."<br>";
    echo "$o_id"."<br>";
    echo "$total"."<br>";
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "select * from product where id_product=$p_id";
		$query3	= mysqli_query($conn, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$total1	= $row3['price']*$qty;
        echo "  ";
		
		$sql4	= "INSERT INTO `detail`(`price`, `amount`, `id_product`, `id_order`) VALUES ('$total1','$qty','$p_id','$o_id')";
        
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
    
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='product_menu.php';
</script>
 




</body>
</html>