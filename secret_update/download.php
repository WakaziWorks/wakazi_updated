<?php
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

// Check if a file ID is provided in the URL
if(isset($_GET['id'])) {
    $fileId = $_GET['id'];

    // Fetch file details from the database
    $sql = "SELECT filename, file_content FROM uploaded_files WHERE id = $fileId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = $row['filename'];
        $fileContent = $row['file_content'];

        // Set headers for file download
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"" . $filename . "\"");

        // Output file content
        echo $fileContent;
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid file ID.";
}
?>
