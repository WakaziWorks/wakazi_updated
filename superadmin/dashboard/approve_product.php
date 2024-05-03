<?php
require '../admin/verify/config.php'; // Include your configuration file with database connection

// Check if the product ID is set in the URL parameter
if(isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Update the ApprovalStatus of the product in ArtisanProducts table to 'approved'
    $updateQuery = "UPDATE ArtisanProducts SET ApprovalStatus = 'approved' WHERE ProductID = ?";
    $updateStmt = $mysqli->prepare($updateQuery);
    $updateStmt->bind_param("i", $productId);
    $updateStmt->execute();

    if($updateStmt->affected_rows > 0) {
        // Fetch details of the approved product from ArtisanProducts table
        $selectQuery = "SELECT * FROM ArtisanProducts WHERE ProductID = ?";
        $selectStmt = $mysqli->prepare($selectQuery);
        $selectStmt->bind_param("i", $productId);
        $selectStmt->execute();
        $productResult = $selectStmt->get_result();
        $productData = $productResult->fetch_assoc();

        // Insert the approved product into the Products table
        $insertQuery = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, image_url, is_featured) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $mysqli->prepare($insertQuery);
        $insertStmt->bind_param("siisdsi", $productData['ProductName'], $productData['SupplierID'], $productData['CategoryID'], $productData['Unit'], $productData['Price'], $productData['image_url'], $productData['is_featured']);
        $insertStmt->execute();

        // Check if the product is successfully inserted into the Products table
        if($insertStmt->affected_rows > 0) {
            echo "Product approved and inserted into the Products table successfully.";
        } else {
            echo "Failed to insert the approved product into the Products table.";
        }
    } else {
        echo "Failed to update the approval status of the product.";
    }

    // Close the prepared statements
    $updateStmt->close();
    $selectStmt->close();
    $insertStmt->close();
} else {
    echo "Product ID is missing.";
}

// Close the database connection
$mysqli->close();
?>
