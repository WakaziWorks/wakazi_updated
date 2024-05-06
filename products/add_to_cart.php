<?php
session_start();
require_once("../config/app/config.php");

$product_id = $_POST['product_id'] ?? null;
$quantity = 1; // Default quantity

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add or update the product in the session cart
if ($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
        $quantity = $_SESSION['cart'][$product_id];
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

// Insert or update the cart details in the database
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Check if the entry already exists
$query = "SELECT id FROM cart_details WHERE session_id=? AND product_id=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("si", session_id(), $product_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->fetch_assoc()) {
    // Update existing record
    $update_query = "UPDATE cart_details SET quantity=? WHERE session_id=? AND product_id=?";
    $update_stmt = $mysqli->prepare($update_query);
    $update_stmt->bind_param("isi", $quantity, session_id(), $product_id);
    $update_stmt->execute();
} else {
    // Insert new record
    $insert_query = "INSERT INTO cart_details (session_id, product_id, quantity) VALUES (?, ?, ?)";
    $insert_stmt = $mysqli->prepare($insert_query);
    $insert_stmt->bind_param("sii", session_id(), $product_id, $quantity);
    $insert_stmt->execute();
}

// Calculate total number of items in the cart for the response
$total_items = array_sum($_SESSION['cart']);

header('Content-Type: application/json');
echo json_encode(['new_cart_count' => $total_items]);
