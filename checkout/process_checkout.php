<?php
session_start();
include("../screens/headers/header.php");
require_once("../config/app/config.php");

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$name = $_POST['name'] ?? '';
$phoneNumber = $_POST['phone'] ?? '';

if (!empty($email) && !empty($password) && !empty($name)) {
    $mysqli->begin_transaction();
    try {
        $stmt = $mysqli->prepare("SELECT * FROM customers WHERE email = ?");
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
                echo "<script>alert('Logged in successfully.'); window.location.href='your_next_page.php';</script>";
            } else {
                echo "<script>alert('Password is incorrect.'); window.location.href='login_page.php';</script>";
            }
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if ($_POST['password'] === $_POST['confirmPassword']) {
                $stmt = $mysqli->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $passwordHash);
                $stmt->execute();
                $user_id = $mysqli->insert_id;

                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;

                updateCartDetails($mysqli, $user_id, $phoneNumber);
                echo "<script>alert('Account created and logged in successfully.'); window.location.href='your_next_page.php';</script>";
                $stmt->close();
            } else {
                echo "<script>alert('Passwords do not match.'); window.location.href='registration_page.php';</script>";
            }
        }
        $mysqli->commit();
    } catch (Exception $e) {
        $mysqli->rollback();
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='error_page.php';</script>";
    }
} else {
    echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>";
}

function updateCartDetails($mysqli, $user_id, $phone) {
    if ($stmt = $mysqli->prepare("REPLACE INTO cart_success (user_id, cart_data, phone_number) VALUES (?, ?, ?)")) {
        $cartData = json_encode($_SESSION['cart']);
        $stmt->bind_param("iss", $user_id, $cartData, $phone);
        $stmt->execute();
        $stmt->close();
    }
}
?>
