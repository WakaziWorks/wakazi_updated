<?php
require '../__auth/__config/config.php';  // Ensure the path is correct
session_start();

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['artisan_id'])) {
    $artisanID = $_SESSION['artisan_id'];
    $productName = $_POST['productName'];
    $supplierID = $_POST['supplierID'] ?? NULL;  // Use NULL for optional fields
    $categoryID = $_POST['categoryID'] ?? NULL;
    $unit = $_POST['unit'] ?? NULL;
    $price = $_POST['price'];

    $query = "INSERT INTO ArtisanProducts (ArtisanID, ProductName, SupplierID, CategoryID, Unit, Price) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("isiiis", $artisanID, $productName, $supplierID, $categoryID, $unit, $price);
        if ($stmt->execute()) {
            echo "<script>alert('Product submitted successfully and awaits approval.'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Error submitting product.'); window.location.href='add_product.php';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Database error.'); window.location.href='add_product.php';</script>";
    }
    $mysqli->close();
}
?>
