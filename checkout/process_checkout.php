<?php
session_start();
include("../screens/headers/header.php");
require_once("../config/app/config.php");

header('Content-Type: application/json');  // Ensure the response is treated as JSON

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$name = $_POST['name'] ?? '';
$phoneNumber = $_POST['phone'] ?? '';  // Assuming phone number is posted

if (!empty($email) && !empty($password) && !empty($name)) {
    $mysqli->begin_transaction();
    try {
        $stmt = $mysqli->prepare("SELECT * FROM customers WHERE email = ?");
        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $mysqli->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user['customer_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                updateCartDetails($mysqli, $user['customer_id'], $phoneNumber);
                echo json_encode(['status' => 'success', 'message' => 'Logged in successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Password is incorrect.']);
            }
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if ($_POST['password'] === $_POST['confirmPassword']) {
                $stmt = $mysqli->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)");
                if (!$stmt) {
                    throw new Exception("Prepare statement failed: " . $mysqli->error);
                }
                $stmt->bind_param("sss", $name, $email, $passwordHash);
                $stmt->execute();
                $user_id = $mysqli->insert_id;
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                updateCartDetails($mysqli, $user_id, $phoneNumber);
                echo json_encode(['status' => 'success', 'message' => 'Account created and logged in successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
            }
        }
        $mysqli->commit();
    } catch (Exception $e) {
        $mysqli->rollback();
        error_log("Error: " . $e->getMessage());  // Log error to server's error log
        echo json_encode(['status' => 'error', 'message' => 'Server error occurred: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
}

function updateCartDetails($mysqli, $user_id, $phone) {
    $stmt = $mysqli->prepare("REPLACE INTO cart_success (user_id, cart_data, phone_number) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Prepare statement failed: " . $mysqli->error);
    }
    $cartData = json_encode($_SESSION['cart']);
    $stmt->bind_param("iss", $user_id, $cartData, $phone);
    $stmt->execute();
    $stmt->close();
}
?>
