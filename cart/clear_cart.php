<?php
session_start();
require_once("../config/app/config.php");

// Clear cart from the session
$_SESSION['cart'] = [];

// Clear cart from the database based on session ID
$session_id = session_id();
$query = "DELETE FROM cart_details WHERE session_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $session_id);
$stmt->execute();

echo json_encode(['success' => true]);
?>
