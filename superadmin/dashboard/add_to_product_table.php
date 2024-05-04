<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../admin/verify/config.php'; // Include your configuration file with database connection

// Fetch all approved products from ArtisanProducts
$selectQuery = "SELECT * FROM ArtisanProducts WHERE ApprovalStatus = 'approved'";
$selectResult = $mysqli->query($selectQuery);

if ($selectResult->num_rows > 0) {
    while ($row = $selectResult->fetch_assoc()) {
        // Check if this product is already in the Products table
        $checkProductQuery = "SELECT 1 FROM Products WHERE ProductName = ? AND SupplierID = ?";
        $checkProductStmt = $mysqli->prepare($checkProductQuery);
        $checkProductStmt->bind_param("si", $row['ProductName'], $row['SupplierID']);
        $checkProductStmt->execute();
        $checkProductResult = $checkProductStmt->get_result();
        
        if ($checkProductResult->num_rows == 0) {
            // Check if SupplierID exists in the Suppliers table
            $checkSupplierQuery = "SELECT 1 FROM Suppliers WHERE SupplierID = ?";
            $checkSupplierStmt = $mysqli->prepare($checkSupplierQuery);
            $checkSupplierStmt->bind_param("i", $row['SupplierID']);
            $checkSupplierStmt->execute();
            $checkSupplierResult = $checkSupplierStmt->get_result();
            
            if ($checkSupplierResult->num_rows > 0) {
                // Insert the new product into Products
                $insertQuery = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, is_featured, image, ApprovalStatus, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $insertStmt = $mysqli->prepare($insertQuery);
        
                if ($insertStmt) {
                    $insertStmt->bind_param("siisdisss", 
                        $row['ProductName'], 
                        $row['SupplierID'], 
                        $row['CategoryID'], 
                        $row['Unit'], 
                        $row['Price'], 
                        $row['is_featured'], 
                        $row['image'], 
                        $row['ApprovalStatus'], 
                        $row['description']
                    );
        
                    if ($insertStmt->execute()) {
                        echo "New product ID " . $row['ProductID'] . " inserted successfully into Products table.<br/>";
                    } else {
                        echo "Error inserting new product ID " . $row['ProductID'] . ": " . $insertStmt->error . "<br/>";
                    }
                    $insertStmt->close();
                } else {
                    echo "Failed to prepare the insert statement for new product ID " . $row['ProductID'] . ".<br/>";
                }
            } else {
                echo "Supplier with ID " . $row['SupplierID'] . " does not exist.<br/>";
            }
            $checkSupplierStmt->close();
        } else {
            echo "Product " . $row['ProductName'] . " from supplier ID " . $row['SupplierID'] . " is already in the Products table.<br/>";
        }
        $checkProductStmt->close();
    }
} else {
    echo "No approved products found to transfer.<br/>";
}

// Close the database connection
$mysqli->close();
?>
