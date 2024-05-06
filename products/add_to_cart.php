<?php
session_start();

// Assuming product ID is passed as a POST parameter
$product_id = $_POST['product_id'] ?? null;

// Initialize the cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to the cart or increase its quantity
if ($product_id) {
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1; // Add new item with quantity 1
    }
}

// Calculate total number of items in the cart
$total_items = array_sum($_SESSION['cart']);

// Return the new cart count as JSON
header('Content-Type: application/json');
echo json_encode(['new_cart_count' => $total_items]);
exit;
