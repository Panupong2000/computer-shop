<?php 
session_start();
include("connect.php");
if(isset($_SESSION['username'])){

if (isset($_POST['submit'])){
    $address = $_POST['address'];
    $id_country = $_POST['country'];
    $id_state = $_POST['state'];
    $id_city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    
}

$country_json = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province.json');
$decoded_country = json_decode($country_json, true);
foreach($decoded_country as $values){
    if($values['id'] == $id_country ){
        $name_country = $values['name_th'];
        break;
    }
    }

$state_json = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_amphure.json');
$decoded_state  = json_decode($state_json, true);
foreach($decoded_state as $values){
if($values['id'] == $id_state ){
    $name_state = $values['name_th'];
    break;
}
}

$city_json = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json');
$decoded_city  = json_decode($city_json, true);
foreach($decoded_city as $values){
    if($values['id'] == $id_city ){
        $name_city = $values['name_th'];
        break;
    }
}

$username = $_SESSION['username'];
$sql1 = "SELECT * FROM user where username ='$username'";
    $query1 = mysqli_query($conn, $sql1);
	$row5 = mysqli_fetch_array($query1);
	$id_user = $row5["id_user"];

        $sql	= "INSERT INTO `address`( `address`, `country`, `state`, `city`, `zipcode`,`id_user`)
                   VALUES ('$address','$name_country','$name_state','$name_city','$zipcode','$id_user')";
        
		$query	= mysqli_query($conn, $sql);

        echo "<script type='text/javascript'>alert('เพิ่มที่อยู่เสร็จสิ้นแล้ว');</script>";
        header("location:address.php");
}else{
    ?>
    <script type="text/javascript">
      alert("โปรดลงทะเบียนก่อน");
        window.location ='login.php';
    </script>   

    <?php
}

?>