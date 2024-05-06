<?php
session_start();

// Assuming product ID is passed as a query parameter
$product_id = $_GET['product_id'];

// Add product to the cart
if (!in_array($product_id, $_SESSION['cart'])) {
    $_SESSION['cart'][] = $product_id;
}

// Return the new cart count as JSON
header('Content-Type: application/json');
echo json_encode(['new_cart_count' => count($_SESSION['cart'])]);
