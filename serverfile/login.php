<?php
    session_start();
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
            $_SESSION["user_status"] = "logged_in";
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["userType"] = $row['userType'];
            echo "success";
        }
        else{
            echo "Password not matched!";
        }
    }
    else{
        echo "Email not found! Please register first.";
    }



