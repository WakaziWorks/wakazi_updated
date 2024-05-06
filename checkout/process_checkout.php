<?php
session_start();
include("../screens/headers/header.php");
require_once("../config/app/config.php");

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$name = $_POST['name'] ?? '';
$phoneNumber = $_POST['phone'] ?? '';  // Assuming phone number is also sent

if (!empty($email) && !empty($password) && !empty($name)) {
    $mysqli->begin_transaction();
    try {
        // Check if the email exists
        $stmt = $mysqli->prepare("SELECT * FROM customers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Login successful, set session variables
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user['customer_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                updateCartDetails($mysqli, $user['customer_id']);  // Update cart details with user id
                echo json_encode(['status' => 'success', 'message' => 'Logged in successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Password is incorrect.']);
            }
        } else {
            // Create new account
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if ($_POST['password'] === $_POST['confirmPassword']) {
                if ($stmt = $mysqli->prepare("CALL UpdateOrInsertUser(?, ?, ?, 'c')")) {
                    $stmt->bind_param("sss", $email, $name, $passwordHash);
                    $stmt->execute();
                    $user_id = $mysqli->insert_id;  // Get the newly created user ID
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $name;
                    updateCartDetails($mysqli, $user_id);  // Insert cart details for new user
                    echo json_encode(['status' => 'success', 'message' => 'Account created and logged in successfully.']);
                    $stmt->close();
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
            }
        }
        $mysqli->commit();
    } catch (Exception $e) {
        $mysqli->rollback();
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
}

// Function to update or insert cart details
function updateCartDetails($mysqli, $user_id) {
    if ($stmt = $mysqli->prepare("REPLACE INTO cart_success (user_id, cart_data, phone_number) VALUES (?, ?, ?)")) {
        $cartData = json_encode($_SESSION['cart']);  // Assuming cart data is stored in session
        $phone = $_POST['phone'];  // Assuming phone number is posted
        $stmt->bind_param("iss", $user_id, $cartData, $phone);
        $stmt->execute();
        $stmt->close();
    }
}
?>


