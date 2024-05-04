<?php
require "../__auth/__config/config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// Fetch categories
$query = "SELECT CategoryID, CategoryName FROM Categories";
$result = $mysqli->query($query);
$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[$row['CategoryID']] = $row['CategoryName'];
    }
}

// Fetch suppliers
$query = "SELECT SupplierID, SupplierName FROM Suppliers";
$result = $mysqli->query($query);
$suppliers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suppliers[$row['SupplierID']] = $row['SupplierName'];
    }
}

// Close the database connection
$mysqli->close();
