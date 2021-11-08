<?php 
include("connect.php");

if (isset($_POST['submit'])){
    $id_country = $_POST['country'];
    $id_state = $_POST['state'];
    $id_city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    
}

echo $zipcode;
$country_json = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_province.json');
$decoded_country = json_decode($country_json, true);
$name_country = $decoded_country[$id_country-1]['name_th'];
echo $name_country;

$state_json = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_amphure.json');
$decoded_state  = json_decode($state_json, true);
$id_state = $id_state%1000;
$name_state = $decoded_state[$id_state-1]['name_th'];
echo $name_state;

$city_json = file_get_contents('https://raw.githubusercontent.com/kongvut/thai-province-data/master/api_tombon.json');
$decoded_city  = json_decode($city_json, true);
$id_city = $id_city%100000;
$name_city = $decoded_city[$id_city-1]['name_th'];
echo $name_city;



?>