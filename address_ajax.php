<!DOCTYPE html>
<html>

<head>
    <title>Webslesson Tutorial | JSON - Dynamic Dependent Dropdown List using Jquery and Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>
    <br /><br />
    <div class="container" style="width:600px;">
    <form action="address_db.php" method="post">
        <h2 align="center">ที่อยู่ จัดส่ง</h2><br /><br />
        <select name="country" id="country" class="form-control input-lg">
    <option  value="">Select country</option>
   </select>
        <br />
        <select name="state" id="state" class="form-control input-lg">
    <option  value="">Select state</option>
   </select>
        <br />
        <select name="city" id="city" class="form-control input-lg">
    <option  value="">Select city</option>
   </select>
        <br />
        <select name="zipcode" id="zipcode" class="form-control input-lg">
    <option value="">Select zipcode</option>
   </select>
   <br>
   <button type="submit"  name="submit">Summit</button>
   </form>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        load_json_data_country('country');

        function load_json_data_country(id, geography_id) {
            var html_code = '';
            $.getJSON('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province.json', function(data) {
                console.log(id);
                html_code += '<option value="">Select ' + id + '</option>';
                $.each(data, function(key, value) {
                    //console.log(value)
                    
                    if (id == 'country') {
                       
                            html_code += '<option value="' + value.id + '">' + value.name_th + '</option>';
                        
                    }
                });
                $('#country').html(html_code);
            });

        }

        function load_json_data_state(id, province_id) {
            var html_code = '';
            $.getJSON('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_amphure.json', function(data) {
                html_code += '<option value="">Select ' + id + '</option>';
                $.each(data, function(key, value) {
                        if (value.province_id == province_id) {
                            console.log(value.province_id)
                            html_code += '<option  value="' + value.id + '">' + value.name_th + '</option>';
                        }
                    
                });
                $('#state').html(html_code);
            });

        }

        function load_json_data_city(id, amphure_id) {
            var html_code = '';
            console.log(amphure_id);
            $.getJSON('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json', function(data) {
                
                html_code += '<option  value="">Select ' + id + '</option>';
                $.each(data, function(key, value) {
                    
                        if (Math.floor(value.id/100) == amphure_id) {
                            console.log("amphure_id: "+Math.floor(value.id/100));
                            html_code += '<option  value="' + value.id + '">' + value.name_th + '</option>';
                        }
                    
                });
                $('#city').html(html_code);
            });

        }

        function load_json_data_zipcode(id, city_id) {
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
        

        $(document).on('change', '#country', function() {
           
            var country_id = $(this).val();
            console.log("123 "+country_id);
            if (country_id != '') {
                load_json_data_state('state', country_id);
            }
        });

        $(document).on('change', '#state', function() {
    
            var state_id = $(this).val();
            if (state_id != '') {
                load_json_data_city('city', state_id);
            } 
        });

        $(document).on('change', '#city', function() {
            var state_id = $(this).val();
            

                console.log("state_id1: ",state_id)
             if (state_id != '') {

                 load_json_data_zipcode('zipcode', state_id);
             } else {
                    $('#zipcode').html('<option value="">Select zipcode</option>');
                }
        });
    });
</script>