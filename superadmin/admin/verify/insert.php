<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'config.php'; // Include your configuration file with database connection

// Start transaction
$mysqli->begin_transaction();

try {
    // Array of admin records
    $admins = [
        ['email' => 'admin@wakazi.com', 'password' => password_hash('superadmin123', PASSWORD_DEFAULT), 'name' => 'Super Admin', 'role' => 'sa'],
        ['email' => 'productmanager@wakazi.com', 'password' => password_hash('productmanager123', PASSWORD_DEFAULT), 'name' => 'Product Manager', 'role' => 'pm'],
        ['email' => 'hexanetsystems@wakazi.com', 'password' => password_hash('supermanager123', PASSWORD_DEFAULT), 'name' => 'Super Manager', 'role' => 'sm'],
        ['email' => 'manager@wakazi.com', 'password' => password_hash('manager123', PASSWORD_DEFAULT), 'name' => 'Manager', 'role' => 'm']
    ];

    // Prepare SQL to insert admin if not exists
    $query = "INSERT INTO admins (email, password, name, role) SELECT ?, ?, ?, ? FROM dual WHERE NOT EXISTS (SELECT email FROM admins WHERE email = ?)";
    $stmt = $mysqli->prepare($query);

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        throw new Exception('MySQL prepare error: ' . $mysqli->error);
    }

    // Bind and execute
    foreach ($admins as $admin) {
        $stmt->bind_param("sssss", $admin['email'], $admin['password'], $admin['name'], $admin['role'], $admin['email']);
        $stmt->execute();

        // Check for successful insertion
        if ($stmt->affected_rows === 0) {
            throw new Exception('No new rows inserted, possible duplicate: ' . $admin['email']);
        }
    }

    // If all went well, commit the transaction
    $mysqli->commit();
    echo "Admins inserted successfully.";

} catch (Exception $e) {
    // An error occurred, rollback transaction and show error message
    $mysqli->rollback();
    echo "Failed to insert admins: " . $e->getMessage();
}

$stmt->close();
$mysqli->close();
?>
