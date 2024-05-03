<?php
require_once '../__auth/__config/config.php';  // Adjust the path as necessary
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    exit('Not logged in');
}

// Validate and sanitize POST data
if (isset($_POST['productId'], $_POST['productName'], $_POST['price'])) {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $price = $_POST['price'];

    // Ensure product ID is an integer and price is a float
    $productId = (int)$productId;
    $price = (float)$price;

    // Prepare the SQL statement to avoid SQL injection
    $stmt = $mysqli->prepare("UPDATE ArtisanProducts SET ProductName = ?, Price = ? WHERE ProductID = ?");
    
    // Bind parameters
    $stmt->bind_param("sdi", $productName, $price, $productId);
    
    // Execute the statement
    $stmt->execute();
    
    // Check if any rows were affected
    if ($stmt->affected_rows > 0) {
        echo "Product updated successfully";
    } else {
        echo "No changes made or update failed";
    }
    
    // Close the statement
    $stmt->close();
} else {
    echo "Missing data";
}

// Close database connection
$mysqli->close();
?>
