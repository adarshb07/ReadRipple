<?php
    
    require_once '../config/session.php';
    require_once '../config/connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $bookid = $_POST['bookId'];
        $exchange = $_POST['exchangeBook'];
        $userid = $_SESSION['user_id'];

        $sql = "INSERT INTO `book-request` (bookId, userRequestId, exchangeFor) VALUES ('$bookid', '$userid', '$exchange')";

        if (mysqli_query($conn, $sql)) {
            echo "Success";
            $_SESSION['success'] = "Book added successfully";
            header('Location: ../book-exchange/');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }