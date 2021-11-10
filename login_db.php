<?php 
    session_start();
    include('connect.php');

    $errors = array();

    if (isset($_POST['login_btn'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
       
        
        
        if (count($errors) == 0) {
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
            $result = mysqli_query($conn, $query);
           
            
            if  (mysqli_num_rows($result) == 1){
            
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $id_user;
                $_SESSION['success'] = "";
                echo $pass;
                header("location: index.php");
            }
                
             
            
             else {          
                 array_push($errors, "อีเมล์หรือรหัสผ่านผิดพลาด กรุณากรอกใหม่");
                 $_SESSION['error'] = "อีเมล์หรือรหัสผ่านผิดพลาด กรุณากรอกใหม่";
                 header("location: login.php");
             }
        }
    }
?>