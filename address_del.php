<?php
    include("connect.php");  
        $id = $_GET['id'];
        $sql = "DELETE FROM `address` WHERE  id_address ='$id'";
        $query = mysqli_query($conn, $sql);
         header("location: address.php");

?>