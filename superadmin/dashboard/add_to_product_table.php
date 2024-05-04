<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../admin/verify/config.php'; // Include your configuration file with database connection
?>

<?php
// Fetch all approved products from ArtisanProducts
$selectQuery = "SELECT * FROM ArtisanProducts WHERE ApprovalStatus = 'approved'";
$selectResult = $mysqli->query($selectQuery);

if ($selectResult->num_rows > 0) {
    while ($row = $selectResult->fetch_assoc()) {
        // Prepare the insert statement for the Products table
        $insertQuery = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, is_featured, image, ApprovalStatus, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $mysqli->prepare($insertQuery);

        if ($insertStmt) {
            // Bind parameters from ArtisanProducts to Products table fields
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

            // Execute the insert statement
            if ($insertStmt->execute()) {
                echo "Product ID " . $row['ProductID'] . " inserted successfully into Products table.<br/>";
            } else {
                echo "Error inserting product ID " . $row['ProductID'] . ": " . $insertStmt->error . "<br/>";
            }
            $insertStmt->close();
        } else {
            echo "Failed to prepare the insert statement for product ID " . $row['ProductID'] . ".<br/>";
        }
    }
} else {
    echo "No approved products found to transfer.<br/>";
}

// Close the database connection
$mysqli->close();
?>
