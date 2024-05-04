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
function prepared_query($mysqli, $sql, $params, $types = "")
{
    $types = $types ?: str_repeat("s", count($params)); // Default to 's' if no types are provided
    if (strlen($types) != count($params)) {
        throw new Exception("Error: The number of elements in the type definition string does not match the number of bind variables.");
    }

    $stmt = $mysqli->prepare($sql);
    if ($stmt === false) {
        throw new Exception("Prepare statement failed: " . $mysqli->error);
    }

    $stmt->bind_param($types, ...$params);
    if ($mysqli->error) {
        throw new Exception("Bind param failed: " . $mysqli->error);
    }

    $stmt->execute();
    if ($mysqli->error) {
        throw new Exception("Execute failed: " . $mysqli->error);
    }

    return $stmt;
}



if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    echo "<script>showDebugMessage('Product ID is set: $productId');</script>";


    // Update the ApprovalStatus
    prepared_query($mysqli, "UPDATE ArtisanProducts SET ApprovalStatus = 'approved' WHERE ProductID = ?", [$productId], "i");

    // Fetch details of the approved product
    $selectStmt = prepared_query($mysqli, "SELECT * FROM ArtisanProducts WHERE ProductID = ?", [$productId], "i");
    $productResult = $selectStmt->get_result();

    if ($productResult->num_rows > 0) {
        $productData = $productResult->fetch_assoc();

        if ($productResult->num_rows > 0) {
            $productData = $productResult->fetch_assoc();
            echo "<script>showDebugMessage('Product details fetched: " . json_encode($productData) . "');</script>";

            // Check if the SupplierID exists
            $supplierCheckStmt = prepared_query($mysqli, "SELECT * FROM Suppliers WHERE SupplierID = ?", [$productData['SupplierID']], "i");
            $supplierResult = $supplierCheckStmt->get_result();

            if ($supplierResult->num_rows > 0) {
                // Insert the approved product into the Products table
                prepared_query($mysqli, "INSERT INTO Products (ProductID, ProductName, SupplierID, CategoryID, Unit, Price, ApprovalStatus, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                    $productId, $productData['ProductName'], $productData['SupplierID'], $productData['CategoryID'], $productData['Unit'], $productData['Price'], $productData['ApprovalStatus'], $productData['image'], $productData['description']
                ], "isiidiss");

                echo "<script>alert('Product approved and inserted into the Products table successfully');</script>";
                echo "<script>window.location.href = 'dashboard.php';</script>";
            } else {
                echo "<script>alert('Supplier with ID {$productData['SupplierID']} does not exist.');</script>";
            }
        } else {
            echo "<script>alert('No product found with the provided ID.');</script>";
        }
    }
    $mysqli->close();
} else {
    echo "<script>alert('Product ID is missing.');</script>";
}
?>