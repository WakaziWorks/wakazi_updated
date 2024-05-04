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
            // Display a popup indicating success and redirect to add_to_product_table.php
            echo "<script>showDebugMessage('Product approval status updated successfully. Redirecting...');</script>";
            echo "<script>window.location.href = 'add_to_product_table.php';</script>";
        } else {
            echo "No product found with the provided ID or it is already approved.";
        }
    } else {
        echo "Failed to update the approval status of the product: " . $updateStmt->error;
    }

    // Close the prepared statement
    $updateStmt->close();
} else {
    echo "Product ID is missing.";
}

// Close the database connection
$mysqli->close();
?>
