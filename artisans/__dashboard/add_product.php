<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../__auth/__config/config.php'; // Ensure the path is correct
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

    // Check the database connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "INSERT INTO ArtisanProducts (artisan_id, ProductName, SupplierID, CategoryID, Unit, Price) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("isiiis", $artisanID, $productName, $supplierID, $categoryID, $unit, $price);
        if ($stmt->execute()) {
            echo "<script>alert('Product submitted successfully and awaits approval.'); window.location.href='dashboard.php';</script>";
        } else {
            // Provide a more detailed error message
            echo "<script>alert('Error submitting product: " . htmlspecialchars($stmt->error) . "'); window.location.href='add_product.php';</script>";
        }
        $stmt->close();
    } else {
        // Provide a more detailed error message
        echo "<script>alert('Database preparation error: " . htmlspecialchars($mysqli->error) . "'); window.location.href='add_product.php';</script>";
    }
    $mysqli->close();
} else {
    // Log or alert if POST data is not set
    echo "<script>alert('Required data is missing.'); window.location.href='add_product.php';</script>";
}
?>
