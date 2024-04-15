<?php
session_start();

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

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect the user to the upload page if logged in
    header("Location: upload.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Encrypt the entered password using MD5 for comparison
    $encryptedPassword = ($password);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$encryptedPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Valid user, set session to indicate logged in
        $_SESSION['username'] = $username;
        
        // Set login success flag
        $_SESSION['login_success'] = true;
        
        // Redirect the user to the upload page after successful login
        header("Location: upload.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>