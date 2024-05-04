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
                    // Insert the approved product into the Products table
                    $insertQuery = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, is_featured, image, ApprovalStatus, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $insertStmt = $mysqli->prepare($insertQuery);

                    // Check if the prepare statement succeeded
                    if ($insertStmt) {
                        // Bind parameters
                        // Assuming $productData is an associative array fetched from the database
                        $types = ''; // This will store the type string for bind_param
                        $values = []; // This will store references to the values to be bound

                        foreach ($productData as $key => $value) {
                            // Determine the type of each value
                            if (is_int($value)) {
                                $types .= 'i';
                            } elseif (is_double($value)) {
                                $types .= 'd';
                            } elseif (is_string($value)) {
                                $types .= 's';
                            } else {
                                // Assume it's a blob or an unknown type
                                $types .= 'b';
                            }
                            $values[] = &$productData[$key]; // bind_param needs references
                        }

                        // Prepare your SQL statement
                        $insertQuery = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, ApprovalStatus, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                        $insertStmt = $mysqli->prepare($insertQuery);

                        // You need to use call_user_func_array to dynamically bind parameters
                        array_unshift($values, $types); // Prepend the types string to the values array
                        call_user_func_array([$insertStmt, 'bind_param'], $values);

                        // Execute the statement
                        if ($insertStmt->execute()) {
                            echo "Success!";
                        } else {
                            echo "Error: " . $insertStmt->error;
                        }

                        // Execute the insert statement
                        if ($insertStmt->execute()) {
                            if ($insertStmt->affected_rows > 0) {
                                echo "<script>showDebugMessage('Product approved and inserted into the Products table successfully')</script>.";
                                echo "<script>window.location.href = 'dashboard.php';</script>";
                            } else {
                                echo "Failed to insert the approved product into the Products table.";
                            }
                        } else {
                            echo "Error inserting approved product: " . $insertStmt->error;
                        }
                        // Close the prepared statement
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

    // Close the prepared statements
    $updateStmt->close();
    if (isset($selectStmt)) $selectStmt->close();
    if (isset($insertStmt)) $insertStmt->close();
} else {
    echo "Product ID is missing.";
}

// Close the database connection
$mysqli->close();
?>