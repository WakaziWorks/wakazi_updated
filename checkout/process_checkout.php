<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require '../config/app/config.php'; // Make sure the path to your config is correct

$email = $_POST['email'] ?? '';
$name = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';

// Check if the email exists
$stmt = $mysqli->prepare("SELECT * FROM customers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    // User exists, check password
    if (password_verify($password, $user['password'])) {
        // Password is correct, log the user in
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['customer_id'];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Incorrect password, please try again.']);
    }
} else {
    // User does not exist, create new user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed_password);
    $stmt->execute();

    if ($mysqli->affected_rows > 0) {
        // Registration successful, log the user in
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $mysqli->insert_id;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Registration failed, please try again.']);
    }
}

$mysqli->close();
?>
