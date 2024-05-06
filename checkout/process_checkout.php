<?php
session_start();
include("../screens/headers/header.php");
require_once("../config/app/config.php");

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$name = $_POST['name'] ?? '';

if (!empty($email) && !empty($password) && !empty($name)) {
    $mysqli->begin_transaction();
    try {
        // Check if the email exists
        $stmt = $mysqli->prepare("SELECT * FROM customers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Email exists, initiate login process
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Password is correct, set session variables
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user['customer_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                echo json_encode(['status' => 'success', 'message' => 'Logged in successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Password is incorrect.']);
            }
        } else {
            // Email does not exist, create new account using stored procedure
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            if ($_POST['password'] === $_POST['confirmPassword']) {
                if ($stmt = $mysqli->prepare("CALL UpdateOrInsertUser(?, ?, ?, 'c')")) {
                    $stmt->bind_param("sss", $email, $name, $passwordHash);
                    $stmt->execute();
                    $stmt->close();
                }

                // Also insert into customers table
                if ($stmt = $mysqli->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)")) {
                    $stmt->bind_param("sss", $name, $email, $passwordHash);
                    $stmt->execute();
                    $stmt->close();
                }

                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $mysqli->insert_id;
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                echo json_encode(['status' => 'success', 'message' => 'Account created and logged in successfully.']);
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
?>
