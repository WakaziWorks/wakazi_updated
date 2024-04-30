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

    // Start transaction
    $mysqli->begin_transaction();

    try {
        // Call the stored procedure to insert or update user details
        if ($stmt = $mysqli->prepare("CALL UpdateOrInsertUser(?, ?, ?, ?)")) {
            $stmt->bind_param("ssss", $email, $username, $password, $role);
            $stmt->execute();
            $stmt->close();
        } else {
            throw new Exception("Error preparing statement: " . $mysqli->error);
        }

        // Insert into customers table
        if ($stmt = $mysqli->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)")) {
            $stmt->bind_param("sss", $username, $email, $password);
            $stmt->execute();
            $stmt->close();
        } else {
            throw new Exception("Error preparing statement: " . $mysqli->error);
        }

        // Commit transaction
        $mysqli->commit();

        $successMessage = "Successfully registered! Email: $email, Name: $username";
        echo "<script>
                alert('$successMessage');
                setTimeout(function() { 
                    window.location.href = '../accounts/login.php'; 
                }, 2000);
              </script>";
    } catch (Exception $e) {
        // Rollback transaction if anything goes wrong
        $mysqli->rollback();
        echo "<script>alert('" . $e->getMessage() . "'); setTimeout(function() { window.history.back(); }, 2000);</script>";
    }

    // Close connection
    $mysqli->close();
} else {
    echo "<script>setTimeout(function() { window.location.href = '../accounts/signup.php?error=Access denied'; }, 2000);</script>";
}
?>
