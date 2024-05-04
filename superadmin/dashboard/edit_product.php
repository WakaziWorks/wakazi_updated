<?php
require '../admin/verify/config.php'; // Adjust the path as needed to include database configuration

$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

if ($product_id > 0) {
    $query = "SELECT * FROM Products WHERE ProductID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // We have the product data
        $productName = $row['ProductName'];
        $supplierID = $row['SupplierID'];
        $categoryID = $row['CategoryID'];
        $unit = $row['Unit'];
        $price = $row['Price'];
    } else {
        echo "<p>Product not found.</p>";
        exit;
    }
} else {
    echo "<p>Invalid product ID.</p>";
    exit;
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="update_product.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <p>
            <label for="productName">Product Name:</label>
            <input type="text" name="productName" id="productName" value="<?php echo htmlspecialchars($productName); ?>">
        </p>
        <p>
            <label for="supplierID">Supplier ID:</label>
            <input type="number" name="supplierID" id="supplierID" value="<?php echo $supplierID; ?>">
        </p>
        <p>
            <label for="categoryID">Category ID:</label>
            <input type="number" name="categoryID" id="categoryID" value="<?php echo $categoryID; ?>">
        </p>
        <p>
            <label for="unit">Unit:</label>
            <input type="text" name="unit" id="unit" value="<?php echo htmlspecialchars($unit); ?>">
        </p>
        <p>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="<?php echo $price; ?>">
        </p>
        <p>
            <button type="submit">Update Product</button>
        </p>
    </form>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
        $product_id = intval($_POST['product_id']);
        $productName = $_POST['productName'];
        $supplierID = intval($_POST['supplierID']);
        $categoryID = intval($_POST['categoryID']);
        $unit = $_POST['unit'];
        $price = $_POST['price'];
    
        $query = "UPDATE Products SET ProductName=?, SupplierID=?, CategoryID=?, Unit=?, Price=? WHERE ProductID=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("siisdi", $productName, $supplierID, $categoryID, $unit, $price, $product_id);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            echo "<p>Product updated successfully.</p>";
        } else {
            echo "<p>Update failed or no data was changed.</p>";
        }
    
        $stmt->close();
        $mysqli->close();
    }
    ?>
</body>
</html>
