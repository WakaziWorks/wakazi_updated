<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../config/app/config.php'; // Include database configuration

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    if (empty(trim($_POST['name'])) || empty(trim($_POST['email'])) || empty(trim($_POST['password'])) || ($_POST['password'] != $_POST['confirm_password'])) {
        echo "<script>setTimeout(function() { window.location.href = '../accounts/signup.php?error=Invalid input'; }, 2000);</script>";
        exit();
    }

    $email = $mysqli->real_escape_string($_POST['email']);
    $username = $mysqli->real_escape_string($_POST['name']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $role = 'c'; // Role 'c' for customers

    // Call the stored procedure to insert or update user details
    if ($stmt = $mysqli->prepare("CALL UpdateOrInsertUser(?, ?, ?, ?)")) {
        $stmt->bind_param("ssss", $email, $username, $password, $role);
        if ($stmt->execute()) {
            $successMessage = "Successfully registered! Email: $email, Name: $username";
            echo "<script>
                    alert('$successMessage');
                    setTimeout(function() { 
                        window.location.href = '../accounts/login.php'; 
                    }, 2000);
                  </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again later.'); setTimeout(function() { window.history.back(); }, 2000);</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error preparing statement: " . $mysqli->error . "'); setTimeout(function() { window.history.back(); }, 2000);</script>";
    }

    // Close connection
    $mysqli->close();
} else {
    echo "<script>setTimeout(function() { window.location.href = '../accounts/signup.php?error=Access denied'; }, 2000);</script>";
}
