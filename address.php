<?php 

    session_start();
    include("connect.php");  
    
    if (isset($_GET['logout'])) {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style_address.css"> 
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

</head>

<body>
<header>
    <a href="#" class="logo"><i class="fas fa-ytensils"></i>commm</a>

    
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
    <?php

if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];
	$sql = "SELECT * FROM user where username ='$username'";
    $query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	$id_user = $row["id_user"];

    $sql2 = "SELECT * FROM address where id_user ='$id_user'";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($query2);
}
     if (empty($row2)) { ?>

        <br /><br />
    <div class="container" style="width:600px;">

    <form action="address_db.php" method="post">
        <h2 align="center">ที่อยู่ จัดส่ง</h2><br /><br />
        ที่อยู่:
        <input name="address" id="address" class="form-control input-lg">
        <br>
        <select name="country" id="country" class="form-control input-lg">
        <option  value="">เลือก จังหวัด</option>
   </select>
        <br />
        <select name="state" id="state" class="form-control input-lg">
    <option  value="">เลือก อำเภอ/เขต</option>
   </select>
        <br />
        <select name="city" id="city" class="form-control input-lg">
    <option  value="">เลือก ตำบล/แขวง</option>
   </select>
        <br />
        <select name="zipcode" id="zipcode" class="form-control input-lg">
    <option value="">เลือก รหัสไปรษณีย์</option>
   </select>
   <br>
   <button type="submit"  name="submit">Summit</button>
   </form>
    </div>

        <?php }else{ ?>

            <section style="text-align: center; font-size:3ถข0px;" id="section"> <h1>ที่อยู่</h1></section>
                <p>ที่อยู่: <?= $row2["address"]?></p>
                <p>จังหวัด: <?= $row2["country"]?></p>
                <p>เขต/อำเภอ: <?= $row2["state"]?></p>
                <p>แขวง/ตำบล: <?= $row2["city"]?></p>
                <p>รหัสไปรษณีย์: <?= $row2["zipcode"]?></p>
                <p><a href="address_del.php?id=<?= $row2["id_address"]?>">ลบที่อยู่</a></p>
                


        
    <?php }?>


    <script src="script.js"></script>
</body>

</html>

<script>
    
    $(document).ready(function() {

        load_json_data_country();

        function load_json_data_country() {
            var html_code = '';
            $.getJSON('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province.json', function(data) {
                html_code += '<option value="">เลือก จังหวัด</option>';
                $.each(data, function(key, value) {
                       
                            html_code += '<option value="' + value.id + '">' + value.name_th + '</option>';                    
                    
                });
                $('#country').html(html_code);
            });

        }

        function load_json_data_state(province_id) {
            var html_code = '';
            $.getJSON('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_amphure.json', function(data) {
                html_code += '<option value="">เลือก อำเภอ/เขต</option>';
                $.each(data, function(key, value) {
                        if (value.province_id == province_id) {
                            html_code += '<option  value="' + value.id + '">' + value.name_th + '</option>';
                        }
                    
                });
                $('#state').html(html_code);
            });

        }

        function load_json_data_city(amphure_id) {
            var html_code = '';
            console.log(amphure_id);
            $.getJSON('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json', function(data) {
                
                html_code += '<option  value="">เลือก ตำบล/แขวง</option>';
                $.each(data, function(key, value) {
                    
                        if (Math.floor(value.id/100) == amphure_id) {
                            console.log("amphure_id: "+Math.floor(value.id/100));
                            html_code += '<option  value="' + value.id + '">' + value.name_th + '</option>';
                        }
                    
                });
                $('#city').html(html_code);
            });

        }

        function load_json_data_zipcode(city_id) {
            var html_code = '';
            $.getJSON('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json', function(data) {
                $.each(data, function(key, value) {
                    
                        if (value.id == city_id) {
                            html_code += '<option  value="' + value.zip_code + '">' + value.zip_code + '</option>';
                        }
                    
                });
                $('#zipcode').html(html_code);
            });

        }
        

        document.getElementById("country").addEventListener('change', function() {
           
            var country_id = $(this).val();
            if (country_id != '') {
                load_json_data_state(country_id);
            }
        });

        document.getElementById("state").addEventListener('change', function() {
    
            var state_id = $(this).val();
            if (state_id != '') {
                load_json_data_city(state_id);
            } 
        });

        document.getElementById("city").addEventListener('change', function() {
            var state_id = $(this).val();
             if (state_id != '') {
                 load_json_data_zipcode(state_id);
             }
        });
    });
</script>