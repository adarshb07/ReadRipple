<?php
    require '../config/session.php';
    require '../../config/connection.php';
    
    // Check if 'id' is set in the GET request
    if(isset($_GET['id'])){
        $requestId = $_GET['id'];

        // SQL query with a prepared statement
        $sql = "UPDATE `book-request` SET RequestStatus = 1 WHERE id = ?";
        
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind the parameter to the statement
        mysqli_stmt_bind_param($stmt, "i", $requestId);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success'] = "Request Accepted";
            header('Location: ../book-request/index.php');
        } else {
            // Print error
            echo "Error: " . mysqli_error($conn);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle the case where 'id' is not set in the GET request
        echo "Request ID is missing.";
    }
?>
