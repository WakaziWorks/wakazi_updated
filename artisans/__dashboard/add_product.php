<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php'; // Include database configuration

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    if (empty(trim($_POST['productName'])) || empty(trim($_POST['price']))) {
        // Handle error - incomplete form
        header("Location: add_product.php?error=Invalid input");
        exit();
    }

    // Prepare an insert statement for products
    $sql = "INSERT INTO Products (ProductName, SupplierID, CategoryID, Unit, Price, is_featured, ApprovalStatus) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("siiisss", $productName, $supplierID, $categoryID, $unit, $price, $is_featured, $approval_status);

        // Set parameters
        $productName = $_POST['productName'];
        $supplierID = $_POST['supplierID']; // Assuming this is obtained from session or another source
        $categoryID = $_POST['categoryID']; // Assuming this is obtained from session or another source
        $unit = $_POST['unit'];
        $price = $_POST['price'];
        $is_featured = 0; // Assuming initial value
        $approval_status = 'approved'; // Assuming initial value

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Retrieve the ProductID of the newly added product
            $productID = $stmt->insert_id;

            // Log the addition of the product by the artisan
            $artisanID = $_SESSION['artisan_id']; // Assuming you have an 'artisan_id' in your session
            $timestamp = date('Y-m-d H:i:s'); // Current timestamp

            // Prepare an insert statement for tracking the addition of the product
            $log_sql = "INSERT INTO ProductAdditions (ProductID, ArtisanID, Timestamp) VALUES (?, ?, ?)";
            if ($log_stmt = $mysqli->prepare($log_sql)) {
                // Bind parameters
                $log_stmt->bind_param("iis", $productID, $artisanID, $timestamp);

                // Execute the statement to log the addition of the product
                $log_stmt->execute();

                // Close the log statement
                $log_stmt->close();
            }

            // Redirect to a success page or do something else
            header("Location: add_product_success.php");
        } else {
            // Handle error
            header("Location: add_product.php?error=Something went wrong");
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle error
        header("Location: add_product.php?error=SQL error");
    }
}

// Close connection
$mysqli->close();
?>
<?php
include("../../screens/headers/header.php");
?>
<div class="container mt-5">
    <h2>Add Product</h2>
    <form method="post">
        <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName" required>
        </div>
        <div class="form-group">
            <label for="supplierID">Supplier ID:</label>
            <input type="text" class="form-control" id="supplierID" name="supplierID">
        </div>
        <div class="form-group">
            <label for="categoryID">Category ID:</label>
            <input type="text" class="form-control" id="categoryID" name="categoryID">
        </div>
        <div class="form-group">
            <label for="unit">Unit:</label>
            <input type="text" class="form-control" id="unit" name="unit">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>

</html>