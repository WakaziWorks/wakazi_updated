<?php
session_start(); // Start or resume the session

// Check if the user is already logged in,
// assuming 'logged_in' is a session variable set when logging in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to the login page
    header('Location: admin/login.php');
    exit; // Don't forget to call exit after header redirection
} else
?>
