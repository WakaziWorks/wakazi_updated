<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'config.php'; // Include your configuration file with database connection

// Array of admin records with hashed passwords
$admins = [
    ['email' => 'admin@wakazi.com', 'password' => password_hash('superadmin123', PASSWORD_DEFAULT), 'name' => 'Super Admin', 'role' => 'sa'],
    ['email' => 'productmanager@wakazi.com', 'password' => password_hash('productmanager123', PASSWORD_DEFAULT), 'name' => 'Product Manager', 'role' => 'pm'],
    ['email' => 'hexanetsystems@wakazi.com', 'password' => password_hash('supermanager123', PASSWORD_DEFAULT), 'name' => 'Super Manager', 'role' => 'sm'],
    ['email' => 'manager@wakazi.com', 'password' => password_hash('manager123', PASSWORD_DEFAULT), 'name' => 'Manager', 'role' => 'm']
];

// Start transaction
$mysqli->begin_transaction();

try {
    $stmt = $mysqli->prepare("INSERT INTO admins (email, password, name, role) VALUES (?, ?, ?, ?)");
    foreach ($admins as $admin) {
        $stmt->bind_param("ssss", $admin['email'], $admin['password'], $admin['name'], $admin['role']);
        $stmt->execute();
    }

    // Commit the transaction
    $mysqli->commit();
    echo "Admins inserted successfully.";

} catch (Exception $e) {
    // Rollback transaction in case of error
    $mysqli->rollback();
    echo "Failed to insert admins: " . $e->getMessage();
}

$stmt->close();
$mysqli->close();
?>
