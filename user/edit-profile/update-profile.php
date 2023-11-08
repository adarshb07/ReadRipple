<?php
    require_once '../../config/connection.php';
    require_once '../config/session.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $state = $_POST['state'];
        $district = $_POST['district'];
        $userId = $_SESSION['user_id'];

        $sql = "UPDATE user SET firstName='$firstName', lastName='$lastName', email='$email', phoneNumber='$phoneNumber', state='$state', district='$district' WHERE id='$userId'";
        
        if(mysqli_query($conn,$sql)){
            echo "Success";
            $_SESSION['success'] = "Book added successfully";
            // header('Location: ./');
        }
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
            // header('Location: ./');
        }

        mysqli_close($conn);
    }