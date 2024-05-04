<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../admin/verify/config.php'; // Include your configuration file with database connection
?>

<script>
    // Debugging function to display a popup message
    function showDebugMessage(message) {
        alert(message);
        setTimeout(function() { /* Continue with the rest of the script */ }, 2000);
    }
</script>

<?php
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    echo "<script>showDebugMessage('Product ID is set: $productId');</script>";

    $updateQuery = "UPDATE ArtisanProducts SET ApprovalStatus = 'approved' WHERE ProductID = ?";
    $updateStmt = $mysqli->prepare($updateQuery);
    $updateStmt->bind_param("i", $productId);

    if ($updateStmt->execute()) {
        echo "<script>showDebugMessage('Update query executed. Rows affected: " . $updateStmt->affected_rows . "');</script>";

        if ($updateStmt->affected_rows > 0) {
            $selectQuery = "SELECT * FROM ArtisanProducts WHERE ProductID = ?";
            $selectStmt = $mysqli->prepare($selectQuery);
            $selectStmt->bind_param("i", $productId);
            $selectStmt->execute();
            $productResult = $selectStmt->get_result();
            $productData = $productResult->fetch_assoc();
            echo "<script>showDebugMessage('Product details fetched: " . json_encode($productData) . "');</script>";

            $checkSupplierQuery = "SELECT * FROM Suppliers WHERE SupplierID = ?";
            $checkSupplierStmt = $mysqli->prepare($checkSupplierQuery);
            $checkSupplierStmt->bind_param("i", $productData['SupplierID']);
            $checkSupplierStmt->execute();
            $supplierResult = $checkSupplierStmt->get_result();

            if ($supplierResult->num_rows > 0) {
                $insertQuery = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, is_featured, ApprovalStatus, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $insertStmt = $mysqli->prepare($insertQuery);

                if ($insertStmt) {
                    // Check for image data presence
                    if (empty($productData['image'])) {
                        $defaultImage = file_get_contents('/path/to/default/image.jpg'); // Ensure the path and file exists
                        $productData['image'] = $defaultImage;
                    }
                    $insertStmt->bind_param("siidisiis",
                        $productData['ProductName'],
                        $productData['SupplierID'],
                        $productData['CategoryID'],
                        $productData['Unit'],
                        $productData['Price'],
                        $productData['is_featured'],
                        $productData['ApprovalStatus'],
                        $productData['image'], // Ensure this is the correct binary data
                        $productData['description']
                    );

                    if ($insertStmt->execute()) {
                        echo "<script>alert('Product approved and inserted into Products table successfully. Rows affected: " . $insertStmt->affected_rows . "');</script>";
                        echo "<script>window.location.href = 'dashboard.php';</script>";
                    } else {
                        echo "Error inserting approved product: " . $insertStmt->error;
                    }
                    $insertStmt->close();
                } else {
                    echo "Failed to prepare the insert statement.";
                }
                $checkSupplierStmt->close();
            } else {
                echo "Supplier with ID $supplierId does not exist.";
            }
        } else {
            echo "No product found with the provided ID.";
        }
    } else {
        echo "Failed to update the approval status of the product.";
    }
    $updateStmt->close();
} else {
    echo "Product ID is missing.";
}

$mysqli->close();
?>
