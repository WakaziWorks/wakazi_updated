<?php
require '../admin/verify/config.php'; // Adjust the path as needed to include database configuration

// Check if product_id is present
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Start a transaction
    $mysqli->begin_transaction();

    try {
        // Delete from ArtisanProducts table
        $query1 = "DELETE FROM ArtisanProducts WHERE ProductID = ?";
        $stmt1 = $mysqli->prepare($query1);
        $stmt1->bind_param("i", $product_id);
        $stmt1->execute();
        $stmt1->close();

        // Delete from Products table
        $query2 = "DELETE FROM Products WHERE ProductID = ?";
        $stmt2 = $mysqli->prepare($query2);
        $stmt2->bind_param("i", $product_id);
        $stmt2->execute();
        $stmt2->close();

        // If both deletions are successful, commit the transaction
        $mysqli->commit();
        echo "<script>alert('Product has been deleted successfully.'); window.location.href='dashboard.php';</script>";
    } catch (Exception $e) {
        // An error occurred, rollback any changes
        $mysqli->rollback();
        echo "<script>alert('Failed to delete the product. Error: " . $e->getMessage() . "'); window.location.href='dashboard.php';</script>";
    }
} else {
    echo "<script>alert('No product ID provided.'); window.location.href='dashboard.php';</script>";
}

$mysqli->close();
?>
