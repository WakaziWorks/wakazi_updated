<?php
session_start();

// Retrieve product ID from POST request
$product_id = $_POST['product_id'] ?? null; // Use the null coalescing operator to handle the case where it might not be set

// Initialize cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to the cart if it's not already there
if ($product_id && !in_array($product_id, $_SESSION['cart'])) {
    $_SESSION['cart'][] = $product_id;
}

// Return the new cart count as JSON
header('Content-Type: application/json');
echo json_encode(['new_cart_count' => count($_SESSION['cart'])]);
exit;
