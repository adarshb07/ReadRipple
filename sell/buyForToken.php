<?php
    
    require_once '../config/session.php';
    require_once '../config/connection.php';

    $exchange = 0;
    $bookid = $_GET['id'];
    $userid = $_SESSION['user_id'];

    $sql = "INSERT INTO `book-request` (bookId, userRequestId, exchangeFor) VALUES ('$bookid', '$userid', '$exchange')";
    $tokenUpdate = "UPDATE user SET tokens = tokens + 1 WHERE id = '$userid'";
    
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $tokenUpdate)) {
        echo "Success";
        $_SESSION['success'] = "Book added successfully";
        header('Location: ../sell/');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
