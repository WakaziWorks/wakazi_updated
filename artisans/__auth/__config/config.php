<?php
// Database configuration settings
define('DB_SERVER', 'localhost');   // Database server
define('DB_USERNAME', 'root');      // Database username
define('DB_PASSWORD', '');          // Database password
define('DB_NAME', 'wakaziworks');   // Database name

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Optionally set the charset to utf8mb4
$mysqli->set_charset("utf8mb4");
