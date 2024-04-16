<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php'; // Include database configuration

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    if (empty(trim($_POST['name'])) || empty(trim($_POST['email'])) || empty(trim($_POST['password'])) || ($_POST['password'] != $_POST['confirm_password'])) {
        // Handle error - incomplete form or passwords do not match
        header("Location: signup.php?error=Invalid input");
        exit();
    }

    // Prepare an insert statement
    $sql = "INSERT INTO artisans (name, email, password) VALUES (?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $param_name, $param_email, $param_password);

        // Set parameters
        $param_name = $_POST['name'];
        $param_email = $_POST['email'];
        $param_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Creates a password hash
        // Assuming connection is `$mysqli` and artisan details are in variables
        $email = $mysqli->real_escape_string($_POST['email']);
        $username = $mysqli->real_escape_string($_POST['name']); // or another username field
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = 'a'; // Role 'a' for artisan

        // Call the stored procedure
        $query = "CALL UpdateOrInsertUser('$email', '$username', '$password', '$role')";
        $result = $mysqli->query($query);

        if (!$result) {
            echo "Error: " . $mysqli->error;
        }
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to login page
            header("Location: ../artisanapp/login.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
