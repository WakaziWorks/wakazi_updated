<?php
session_start();
$product_id = $_POST['product_id'] ?? 0;
$quantity_change = $_POST['quantity_change'] ?? 0;

if ($product_id && isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] += $quantity_change;
    if ($_SESSION['cart'][$product_id] <= 0) {
        unset($_SESSION['cart'][$product_id]); // Remove item if quantity is zero or less
    }
}

echo json_encode(['success' => true]);
