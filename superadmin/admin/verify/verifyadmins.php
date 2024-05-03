<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'config.php'; // Include your configuration file with database connection

// Check and handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT admin_id, email, password, name, role FROM admins WHERE email = ?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $fetched_email, $fetched_password, $name, $role);
            $stmt->fetch();
            if (password_verify($password, $fetched_password)) {
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $fetched_email;
                $_SESSION['admin_id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['role'] = $role;

                // Determine the appropriate dashboard based on the user's role
                $redirectMap = [
                    'sa' => '../superadmin_dashboard.php',
                    'pm' => '../productmanager_dashboard.php',
                    'sm' => '../supermanager_dashboard.php',
                    'm' => '../manager_dashboard.php',
                ];
                $redirectPage = $redirectMap[$role] ?? '../login.php';
                header("Location: $redirectPage");
                exit();
            } else {
                echo '<script>alert("Incorrect password."); window.location.href = "../login.php";</script>';
            }
        } else {
            echo '<script>alert("No user found with that email address."); window.location.href = "../login.php";</script>';
        }
        $stmt->close();
    } else {
        echo '<script>alert("SQL preparation error: ' . htmlspecialchars($mysqli->error) . '"); window.location.href = "../login.php";</script>';
    }
} else {
    echo '<script>alert("Please fill in all required fields."); window.location.href = "../login.php";</script>';
}

$mysqli->close();
?>
