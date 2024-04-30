<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../__config/app/config.php'; // Include database configuration

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    if (empty(trim($_POST['name'])) || empty(trim($_POST['email'])) || empty(trim($_POST['password'])) || ($_POST['password'] != $_POST['confirm_password'])) {
        // Handle error - incomplete form or passwords do not match
        header("Location: ../__accounts/signup.php?error=Invalid input");
        exit();
    }

    // Prepare an insert statement
    $sql = "INSERT INTO customers (name, email, password) VALUES (?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $param_name, $param_email, $param_password);

        // Set parameters
        $param_name = $_POST['name'];
        $param_email = $_POST['email'];
        $param_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Creates a password hash
        $email = $mysqli->real_escape_string($_POST['email']);
        $username = $mysqli->real_escape_string($_POST['name']); // or another username field
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = 'c'; // Role 'a' for customers

        // Call the stored procedure
        // $query = "CALL UpdateOrInsertUser('$email', '$username', '$password', '$role')";
        if ($stmt = $mysqli->prepare("CALL UpdateOrInsertUser(?, ?, ?, ?)")) {
            $stmt->bind_param("ssss", $email, $username, $password, $role);
            if ($stmt->execute()) {
                header("Location: ../__accounts/login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $mysqli->error;
        }
        
        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
