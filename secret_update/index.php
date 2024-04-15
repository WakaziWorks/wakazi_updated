<?php
session_start();

// Database connection
$servername = "localhost";
$username = "hexanetc_upload";
$password = "13917295!GdaguGg";
$dbname = "hexanetc_w_upload";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect the user to the upload page if logged in
    header("Location: upload.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Encrypt the entered password using MD5 for comparison
    $encryptedPassword = ($password);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$encryptedPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Valid user, set session to indicate logged in
        $_SESSION['username'] = $username;
        
        // Set login success flag
        $_SESSION['login_success'] = true;
        
        // Redirect the user to the upload page after successful login
        header("Location: upload.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wakazi</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="team" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <!--<link rel="stylesheet" href="css/vegas.min.css">-->
    <!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Login</h2>
<div class="container">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>    </div>
</body>
</html>
