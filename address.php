<!DOCTYPE html>
<html>

<head>
    <title>Webslesson Tutorial | JSON - Dynamic Dependent Dropdown List using Jquery and Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/style_address.css" /> 

</head>

<body>



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