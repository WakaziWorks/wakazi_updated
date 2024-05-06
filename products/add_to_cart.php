<?php
session_start();

// Assuming product ID is passed as a query parameter
$product_id = $_GET['product_id'];

// Initialize cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to the cart if it's not already there
if (!in_array($product_id, $_SESSION['cart'])) {
    $_SESSION['cart'][] = $product_id;
    // Set a flash message for the next page load
    $_SESSION['flash'] = 'Product added to cart successfully!';
}

// Redirect to the products page
header("Location: index.php");
exit;
