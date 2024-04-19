<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session

require 'config.php'; // Include configuration file

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = mysqli_real_escape_string($mysqli, $_POST['email']); // Sanitize the email
        $password = $_POST['password']; // No need to escape passwords

        // Create SQL query to fetch user from database
        $query = "SELECT email, password FROM customers WHERE email = ?";

        // Prepare the statement to avoid SQL injection
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("s", $email); // Bind the $email to the parameter
            $stmt->execute(); // Execute the query
            $stmt->store_result(); // Store the result of the query

            // Check if we have exactly one user with this email
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($fetched_email, $fetched_password); // Bind the result variables
                $stmt->fetch(); // Fetch the values

                // Verify the password (assuming the stored password is hashed)
                if (password_verify($password, $fetched_password)) {
                    $_SESSION['logged_in'] = true; // Set the session variable
                    $_SESSION['email'] = $email; // Store the email in session data
                    echo '<script>window.location.href = "../../index.php";</script>';
                    exit();
                } else {
                    // Password does not match
                    echo '<script>alert("Invalid email or password."); window.location.href = "../__accounts/login.php";</script>';
                    exit();
                }
            } else {
                // No user found with that email
                echo '<script>alert("Invalid email or password."); window.location.href = "../__accounts/login.php";</script>';
                exit();
            }
            $stmt->close(); // Close statement
        } else {
            echo '<script>alert("Something went wrong with the SQL statement."); window.location.href = "../__accounts/login.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Please fill in all required fields."); window.location.href = "../__accounts/login.php";</script>';
        exit();
    }
}

$mysqli->close(); // Close database connection
?>
