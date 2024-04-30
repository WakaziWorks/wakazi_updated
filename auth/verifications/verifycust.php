<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session

require '../../config/app/config.php'; // Include database configuration

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Ensure the database connection is successful
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        $email = mysqli_real_escape_string($mysqli, $_POST['email']); // Sanitize the email
        $password = $_POST['password']; // No need to escape passwords

        // Create SQL query to fetch user from database
        $query = "SELECT customer_id, email, password, name FROM customers WHERE email = ?";

        // Prepare the statement to avoid SQL injection
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("s", $email); // Bind the $email to the parameter
            $stmt->execute(); // Execute the query
            $stmt->store_result(); // Store the result of the query

            // Check if we have exactly one user with this email
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($fetched_customer_id, $fetched_email, $fetched_password, $fetched_name); // Bind the result variables
                $stmt->fetch(); // Fetch the values

                // Verify the password (assuming the stored password is hashed)
                if (password_verify($password, $fetched_password)) {
                    $_SESSION['logged_in'] = true; // Set the session variable
                    $_SESSION['email'] = $fetched_email; // Store the email in session data
                    $_SESSION['customer_id'] = $fetched_customer_id; // Store customer ID
                    $_SESSION['name'] = $fetched_name; // Store customer's name

                    echo '<script>window.location.href = "../../../index.php";</script>';
                    exit();
                } else {
                    // Password does not match
                    echo '<script>alert("Incorrect password."); window.location.href = "../accounts/login.php";</script>';
                    exit();
                }
            } else {
                // No user found with that email
                echo '<script>alert("No account exists with that email."); window.location.href = "../accounts/login.php";</script>';
                exit();
            }
            $stmt->close(); // Close statement
        } else {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            exit();
        }
    } else {
        echo '<script>alert("Please fill in all required fields."); window.location.href = "../accounts/login.php";</script>';
        exit();
    }
}

$mysqli->close(); // Close database connection
?>
