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
    // Process file upload
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if file was uploaded without errors
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            $fileName = $_FILES["image"]["name"];
            $fileTmpName = $_FILES["image"]["tmp_name"];
            $fileSize = $_FILES["image"]["size"];
            $fileType = $_FILES["image"]["type"];

            // Validate file size and type
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $maxFileSize = 10 * 1024 * 1024; // 10MB
            if (in_array(strtolower(pathinfo($fileName, PATHINFO_EXTENSION)), $allowedExtensions) && $fileSize <= $maxFileSize) {
                // Move the uploaded file to a permanent location
                $uploadDir = "uploads/";
                $filePath = $uploadDir . $fileName;
                if (move_uploaded_file($fileTmpName, $filePath)) {
                    // Store file information in the database
                    $query = "INSERT INTO files (filename, filepath, filesize, filetype) VALUES (?, ?, ?, ?)";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param("ssis", $fileName, $filePath, $fileSize, $fileType);
                    $stmt->execute();
                    $stmt->close();
                    echo "File uploaded successfully.";
                } else {
                    echo "Error moving file to destination directory.";
                }
            } else {
                echo "Invalid file. Please upload a JPG, JPEG, PNG, or GIF file (up to 10MB in size).";
            }
        } else {
            $errors[] = "No images uploaded.";
        }
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
