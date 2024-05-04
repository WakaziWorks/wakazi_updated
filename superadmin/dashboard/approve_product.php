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
                    // Define the valid approval statuses based on your Products table schema
                    $validApprovalStatuses = ['pending', 'approved'];
                    // Ensure approval status is sanitized and valid
                    $approvalStatus = in_array($productData['ApprovalStatus'], $validApprovalStatuses) ? $productData['ApprovalStatus'] : 'pending';

                    $insertQuery = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, is_featured, ApprovalStatus, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $insertStmt = $mysqli->prepare($insertQuery);

                    if ($insertStmt) {
                        // Set a default value for is_featured if it's not set
                        $is_featured = isset($productData['is_featured']) ? $productData['is_featured'] : 0; // Assuming the default value is 0

                        // Debug: Print the data being bound
                        echo "<pre>Binding the following data:</pre>";
                        echo "<pre>ProductName: {$productData['ProductName']}</pre>";
                        echo "<pre>SupplierID: {$productData['SupplierID']}</pre>";
                        echo "<pre>CategoryID: {$productData['CategoryID']}</pre>";
                        echo "<pre>Unit: {$productData['Unit']}</pre>";
                        echo "<pre>Price: {$productData['Price']}</pre>";
                        echo "<pre>is_featured: $is_featured</pre>";
                        echo "<pre>ApprovalStatus: $approvalStatus</pre>";
                        echo "<pre>image: " . strlen($productData['image']) . " bytes</pre>"; // assuming 'image' is a blob
                        echo "<pre>description: {$productData['description']}</pre>";

                        // Bind parameters
                        $insertStmt->bind_param(
                            "siidisisbss",
                            $productData['ProductName'],
                            $productData['SupplierID'],
                            $productData['CategoryID'],
                            $productData['Unit'],
                            $productData['Price'],
                            $is_featured,
                            $approvalStatus,
                            $productData['image'],
                            $productData['description']
                        );

                        // Attempt to execute the statement
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