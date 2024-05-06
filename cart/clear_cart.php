<?php
session_start();

// Clear the cart
$_SESSION['cart'] = [];

// Optionally, send back a success message or status
echo json_encode(['status' => 'success', 'message' => 'Cart has been cleared']);


