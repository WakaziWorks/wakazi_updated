<?php
// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if there's an error message passed in the query string
$error_message = isset($_GET['error']) ? $_GET['error'] : 'Unknown error occurred.';

// Optionally, you can log these errors as well, or handle them differently based on the session or error type.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Handling Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Error Notification</h1>
        <div class="alert alert-danger" role="alert">
            <?php echo htmlspecialchars($error_message); ?>
        </div>
        <p>Please try to <a href="javascript:history.back()">go back</a> and retry, or if the problem persists, contact our support.</p>
        <p>If you need immediate assistance, please call our support hotline or email us.</p>
    </div>
</body>
</html>
