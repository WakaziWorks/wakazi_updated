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

            $insertQuery = "INSERT INTO Products (ProductID, ProductName, SupplierID, CategoryID, Unit, Price, ApprovalStatus, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $mysqli->prepare($insertQuery);

            if ($insertStmt) {
                $null = NULL; // Placeholder for blob data
                $insertStmt->bind_param(
                    "isiidiss",
                    $productId,
                    $productData['ProductName'],
                    $productData['SupplierID'],
                    $productData['CategoryID'],
                    $productData['Unit'],
                    $productData['Price'],
                    $productData['ApprovalStatus'],
                    $productData['image'], // Placeholder for blob data
                    $productData['description']
                );

                // Handling blob data
                if (empty($productData['image'])) {
                    echo "<script>alert('No image provided. Please upload an image.'); window.location.href='dashboard.php';</script>";
                    exit;
                } else {
                    $insertStmt->send_long_data(7, $productData['image']); // Ensuring the right index is used for blob data
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
