<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../__auth/__config/config.php'; // Ensure the path is correct
session_start();

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['artisan_id'])) {
        echo "<script>alert('Session does not have artisan identification.'); window.location.href='dashboard.php';</script>";
        exit;
    }

    $errors = [];
    $artisanID = $_SESSION['artisan_id'];
    $productName = $_POST['productName'];
    $supplierID = $_POST['supplierID'] ?? null; // Use NULL for optional fields
    $categoryID = $_POST['categoryID'];
    $unit = $_POST['unit'] ?? null;
    $price = $_POST['price'] ?? null;

    // Check if files are uploaded
    if (!empty($_FILES['images']['name'][0])) {
        $images = $_FILES['images'];
        $imageData = [];

        // Loop through uploaded files
        foreach ($images['tmp_name'] as $index => $tmpName) {
            $imageName = $images['name'][$index];
            $imageTmpName = $images['tmp_name'][$index];
            $imageType = $images['type'][$index];

            // Check file type
            if (strpos($imageType, 'image') === false) {
                $errors[] = "File $imageName is not an image.";
            } else {
                $imageData[] = file_get_contents($imageTmpName); // Read file content
            }
        }
    } else {
        $errors[] = "No images uploaded.";
    }

    // Validate required fields
    if (empty($productName)) {
        $errors[] = "Product Name";
    }
    if (empty($price)) {
        $errors[] = "Price";
    }

    // Check for any errors
    if (!empty($errors)) {
        $missingFields = implode(', ', $errors);
        echo "<script>alert('Required data is missing: $missingFields'); window.location.href='add_product.php';</script>";
        exit;
    }

    // Check the database connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and execute SQL statement
    $query = "INSERT INTO ArtisanProducts (artisan_id, ProductName, SupplierID, CategoryID, Unit, Price, image) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($query)) {
        foreach ($imageData as $image) {
            $stmt->bind_param("isiiiss", $artisanID, $productName, $supplierID, $categoryID, $unit, $price, $image);
            if ($stmt->execute()) {
                echo "<script>alert('Product submitted successfully and awaits approval.'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Error submitting product: " . htmlspecialchars($stmt->error) . "'); window.location.href='add_product.php';</script>";
            }
        }
        $stmt->close();
    } else {
        echo "<script>alert('Database preparation error: " . htmlspecialchars($mysqli->error) . "'); window.location.href='add_product.php';</script>";
    }
    $mysqli->close();
} else {
    echo "<script>alert('No data submitted.'); window.location.href='add_product.php';</script>";
}
?>
