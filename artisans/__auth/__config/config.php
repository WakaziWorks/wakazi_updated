<?php
// Database configuration settings
define('DB_SERVER', 'localhost');   // Database server, typically 'localhost'
define('DB_USERNAME', 'root');      // Database username, 'root' is the default for localhost
define('DB_PASSWORD', '');          // Database password, empty for development environment
define('DB_NAME', 'wakaziworks');   // Database name

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Function to close the database connection
function closeConnection($pdo) {
    $pdo = null;
}
?>
