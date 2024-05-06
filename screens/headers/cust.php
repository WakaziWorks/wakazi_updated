
<?php
session_start();
// include("../screens/headers/header.php");

require_once("../config/app/config.php");

// Fetch cart details for the current session
$session_id = session_id();
$query = "SELECT p.*, cd.quantity FROM cart_details cd
          JOIN Products p ON p.ProductID = cd.product_id
          WHERE cd.session_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);

$total_price = 0;
?>