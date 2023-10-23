<?php
    require_once '../config/connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    $total = mysqli_num_rows($result);

    if($total>0){
        $row = mysqli_fetch_assoc($result);
    
        $verify = password_verify($password, $row['password']); 
        
        if($verify){
            echo "success";
        }
        else{
            echo "Password not matched!";
        }
    }
    else{
        echo "Email not found! Please register first.";
    }



