<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user back to the login page
    header("Location: index.php");
    exit();
}

// Check if file ID is provided
if (!isset($_GET['id'])) {
    header("Location: upload.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "hexanetc_upload";
$password = "13917295!GdaguGg";
$dbname = "hexanetc_w_upload";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get file ID from the URL
$fileId = $_GET['id'];

// Delete file from database
$sql = "DELETE FROM uploaded_files WHERE id = $fileId";
if ($conn->query($sql) === TRUE) {
    $success = "File deleted successfully.";
} else {
    $error = "Error deleting file: " . $conn->error;
}

// Redirect back to upload.php
header("Location: upload.php");
exit();
?>
