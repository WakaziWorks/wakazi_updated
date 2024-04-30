<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../__auth/__config/config.php';  // Adjust the path as necessary
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    echo "<script>alert('Please log in.'); window.location.href='login.php';</script>";
    exit;
}

// Assuming you have a database connection $mysqli from your config file
$query = "SELECT ProductID, ProductName, Price, CategoryID, Unit, ApprovalStatus FROM ArtisanProducts WHERE artisan_id = ?";
if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param("i", $_SESSION['artisan_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['ProductID']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ProductName']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['CategoryID']) . "</td>";  // Convert category ID to name if necessary
        echo "<td>" . htmlspecialchars($row['Unit']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ApprovalStatus']) . "</td>";
        echo "<td><a href='edit_product.php?id=" . $row['ProductID'] . "'>Edit</a> | <a href='delete_product.php?id=" . $row['ProductID'] . "'>Delete</a></td>";
        echo "</tr>";
    }
    $stmt->close();
}
$mysqli->close();
?>
