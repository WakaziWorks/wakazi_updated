<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Debugging output
echo "<pre>POST Data:";
print_r($_POST);
echo "Session Cart before modifications:";
print_r($_SESSION['cart']);
echo "</pre>";

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
        $_SESSION['cart'][$product_id] = 1;
    }
}

// Calculate total number of items in the cart
$total_items = array_sum($_SESSION['cart']);

// Debugging output
echo "<pre>Session Cart after modifications:";
print_r($_SESSION['cart']);
echo "Total Items: $total_items";
echo "</pre>";

header('Content-Type: application/json');
echo json_encode(['new_cart_count' => $total_items]);
exit;
