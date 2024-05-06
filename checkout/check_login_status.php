<?php
session_start();

$response = ['logged_in' => false];
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $response['logged_in'] = true;
}

echo json_encode($response);
?>
