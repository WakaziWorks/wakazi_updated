<?php
session_start();
require_once("../config/app/config.php");

$product_id = $_POST['product_id'] ?? null;
$quantity_change = $_POST['quantity_change'] ?? 0;

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($product_id !== null) {
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity_change;
        if ($_SESSION['cart'][$product_id] <= 0) {
            unset($_SESSION['cart'][$product_id]);  // Remove the product from the cart if quantity is zero
        }
    } elseif ($quantity_change > 0) {
        $_SESSION['cart'][$product_id] = $quantity_change;  // Add new product if not in cart and addition is requested
    }

    // Optionally, update the database to reflect changes
    $query = "UPDATE cart_details SET quantity = ? WHERE product_id = ? AND session_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("iis", $_SESSION['cart'][$product_id], $product_id, session_id());
    $stmt->execute();
}

echo json_encode(['success' => true, 'new_quantity' => $_SESSION['cart'][$product_id] ?? 0]);
