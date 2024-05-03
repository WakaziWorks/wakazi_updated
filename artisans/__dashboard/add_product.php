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
    $supplierID = $_POST['supplierID']; // Use NULL for optional fields
    $categoryID = $_POST['categoryID'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Check if files are uploaded
    if (!empty($_FILES['images']['name'][0])) {
        $images = $_FILES['images'];
        $imageData = [];

        foreach ($images['tmp_name'] as $index => $tmpName) {
            $imageName = $images['name'][$index];
            $imageTmpName = $images['tmp_name'][$index];
            $imageType = $images['type'][$index];

            // Check if file was uploaded successfully
            if (!is_uploaded_file($imageTmpName)) {
                $errors[] = "File $imageName could not be uploaded.";
                continue; // Skip to the next iteration
            }

            // Check file extension
            $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
            $fileExtension = pathinfo($imageName, PATHINFO_EXTENSION);
            if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
                $errors[] = "File $imageName has an invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
            } else {
                // Read file content
                $fileContent = file_get_contents($imageTmpName);
                if ($fileContent === false) {
                    $errors[] = "Failed to read file $imageName.";
                } else {
                    $imageData[] = $fileContent;
                }
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
        echo "<script>alert('Required data is missing or invalid: $missingFields'); window.location.href='add_product.php';</script>";
        exit;
    }

    // Check the database connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and execute SQL statement
    $query = "INSERT INTO ArtisanProducts (artisan_id, ProductName, SupplierID, CategoryID, Unit, Price, image, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($query)) {
        foreach ($imageData as $image) {
            $stmt->bind_param("isiiiiss", $artisanID, $productName, $supplierID, $categoryID, $unit, $price, $image, $description);
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
