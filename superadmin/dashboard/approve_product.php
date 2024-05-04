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
        // Wait for 2 seconds before continuing
        setTimeout(function() {
            // Continue with the rest of the script
        }, 2000);
    }
</script>

<?php
// Check if the product ID is set in the URL parameter
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Debug: Display a popup indicating that the product ID is set
    echo "<script>showDebugMessage('Product ID is set: $productId');</script>";

    // Update the ApprovalStatus of the product in ArtisanProducts table to 'approved'
    $updateQuery = "UPDATE ArtisanProducts SET ApprovalStatus = 'approved' WHERE ProductID = ?";
    $updateStmt = $mysqli->prepare($updateQuery);
    $updateStmt->bind_param("i", $productId);

    // Execute the update statement
    if ($updateStmt->execute()) {
        // Debug: Display a popup indicating the update status
        echo "<script>showDebugMessage('Update query executed. Rows affected: " . $updateStmt->affected_rows . "');</script>";

        if ($updateStmt->affected_rows > 0) {
            // Fetch details of the approved product from ArtisanProducts table
            $selectQuery = "SELECT * FROM ArtisanProducts WHERE ProductID = ?";
            $selectStmt = $mysqli->prepare($selectQuery);
            $selectStmt->bind_param("i", $productId);
            $selectStmt->execute();

            // Check if the select statement executed successfully
            if ($selectStmt->errno) {
                echo "Error fetching product details: " . $selectStmt->error;
            } else {
                $productResult = $selectStmt->get_result();
                $productData = $productResult->fetch_assoc();

                // Debug: Display a popup indicating the product details fetched
                echo "<script>showDebugMessage('Product details fetched: " . json_encode($productData) . "');</script>";

                // Check if the SupplierID exists in the Suppliers table
                $supplierId = $productData['SupplierID'];
                $checkSupplierQuery = "SELECT * FROM Suppliers WHERE SupplierID = ?";
                $checkSupplierStmt = $mysqli->prepare($checkSupplierQuery);
                $checkSupplierStmt->bind_param("i", $supplierId);
                $checkSupplierStmt->execute();
                $supplierResult = $checkSupplierStmt->get_result();

                if ($supplierResult->num_rows > 0) {
                    $insertQuery = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, is_featured, ApprovalStatus, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $insertStmt = $mysqli->prepare($insertQuery);

                    if ($insertStmt) {
                        // Prepare binary data for binding
                        $null = NULL; // For binding the blob
                        $insertStmt->bind_param(
                            "siidisiis",
                            $productData['ProductName'],
                            $productData['SupplierID'],
                            $productData['CategoryID'],
                            $productData['Unit'],
                            $productData['Price'],
                            $is_featured,
                            $approvalStatus,
                            $null, // Placeholder for blob
                            $productData['description']
                        );

                        // Check if image data is present, if not, handle the error or set default image data
                        if (empty($productData['image'])) {
                            // Option: Set a default image or fetch an existing image data
                            // For example: $defaultImageData = file_get_contents('path_to_default_image');
                            // $insertStmt->send_long_data(7, $defaultImageData);
                            echo "<script>alert('No image provided. Please upload an image.'); window.location.href='dashboard.php';</script>";
                            exit; // Stop the operation if no image is available
                        } else {
                            // Send the actual image data
                            $insertStmt->send_long_data(7, $productData['image']);
                        }

                        // Execute the statement
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
                } else {
                    echo "Supplier with ID $supplierId does not exist.";
                }
                $checkSupplierStmt->close();
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

// Close the database connection
$mysqli->close();
?>