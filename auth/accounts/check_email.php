<?php
require '../config/config.php'; // Ensure your DB connection settings are correct

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT email FROM customers WHERE email = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo 'taken';
        } else {
            echo 'not_taken';
        }
        $stmt->close();
    }
    $mysqli->close();
}
?>
