<?php

    include '../config/connection.php';
    
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password,PASSWORD_DEFAULT); 


    // Check user exit or not
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "Email Already Exist! Please Login";
        exit();
    }


    $sql = "INSERT INTO user (firstName, lastName, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "success";
    } else {
        echo "error".mysqli_error($conn);
    }
