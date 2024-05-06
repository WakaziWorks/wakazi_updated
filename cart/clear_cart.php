<?php
session_start();

// Clear the cart
$_SESSION['cart'] = [];

// Optionally, send back a success message or status
echo json_encode(['status' => 'success', 'message' => 'Cart has been cleared']);

if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    // Fetch and display products
} else {
    echo "<p>Your cart is empty.</p>";
}
