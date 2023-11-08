<?php
include "../config/connection.php";
include "../config/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $email = $_POST["email"];
    $message = $_POST["msg"];

    // Insert data into the database
    $sql = "INSERT INTO `contact` (`firstName`, `lastName`, `email`, `message`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $message);

    if ($stmt->execute()) {
        echo "Data inserted successfully!";
        $_SESSION['message'] = "Contact form submitted successfully!";
        header("Location: ./index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $conn->close();
}