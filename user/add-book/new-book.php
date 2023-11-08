<?php

    require_once '../config/session.php';
    require_once '../../config/connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $bookTitle = $_POST['bookName'];
        $description = $_POST['description'];
        $category = $_POST['genres'];
        $lendType = $_POST['lendType'];
        $userId = $_SESSION['user_id']; // Assuming you have a user ID

        // Handle image upload
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $new_image_name = uniqid() . '.' . $image_extension;
        $image_path = '../../assets/images/books/' . $new_image_name;

        // Move uploaded image to the folder
        if (move_uploaded_file($image_tmp, $image_path)) {
            // Insert data into the database
            $sql = "INSERT INTO book (bookTitle, description, category, lendType, image, userId) 
            VALUES ('$bookTitle', '" . mysqli_real_escape_string($conn, $description) . "', '$category', '$lendType', '$new_image_name', '$userId')";
    
            if (mysqli_query($conn, $sql)) {
                echo "Success";
                $_SESSION['success'] = "Book added successfully";
                header('Location: ./');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
                // header('Location: ./');

            }
        } else {
            echo "Error uploading image";
            $_SESSION['error'] = "Error uploading image";
            // header('Location: ./');

        }

        // Close connection
        mysqli_close($conn);
    }
