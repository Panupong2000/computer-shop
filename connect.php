<?php 

    // $servername = "localhost";
    // $username = "root";
    // $password = "0950042047";
    //  $dbname = "webtest";
    
   
    // $conn = mysqli_connect($servername, $username, $password, $dbname);

    // if (!$conn) {
    //     die("Connection failed" . mysqli_connect_error());
    // } 

    $pdo = new PDO("mysql:host=localhost;dbname=ncg_computer;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

?>