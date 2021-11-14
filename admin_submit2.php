<meta charset="UTF-8">
<?php

    include('connect.php'); 
    $id = $_REQUEST["ID_Orders"];
    $sql = "UPDATE `orders` SET status='ยกเลิก' WHERE ID_Orders='$id' ";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($con));
    
    if($result){
        echo "<script type='text/javascript'>";
        echo "alert('ยกเลิกออเดอร์เสร็จสิ้น');";
        echo "window.location = 'admin_submit.php'; ";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาดลองอีกครั้ง');";
        echo "</script>";
    }
?>