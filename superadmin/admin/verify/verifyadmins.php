<?php
session_start();
require '../config.php'; // Adjust the path as necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
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

                    // Check if the insert.php script exists and include it
                    $insertScriptPath = __DIR__ . '/insert.php';
                    if (file_exists($insertScriptPath)) {
                        include $insertScriptPath;
                        unlink($insertScriptPath); // Delete the script after execution
                    }

                    // Redirect based on role
                    switch ($role) {
                        case 'sa':
                            header("Location: ../superadmin_dashboard.php");
                            break;
                        case 'pm':
                            header("Location: ../productmanager_dashboard.php");
                            break;
                        case 'sm':
                            header("Location: ../supermanager_dashboard.php");
                            break;
                        case 'm':
                            header("Location: ../manager_dashboard.php");
                            break;
                        default:
                            header("Location: ../login.php");
                    }
                    exit();
                } else {
                    echo '<script>alert("Invalid email or password."); window.location.href = "../login.php";</script>';
                }
            } else {
                echo '<script>alert("Invalid email or password."); window.location.href = "../login.php";</script>';
            }
            $stmt->close();
        } else {
            echo '<script>alert("Something went wrong with the SQL statement."); window.location.href = "../login.php";</script>';
        }
    } else {
        echo '<script>alert("Please fill in all required fields."); window.location.href = "../login.php";</script>';
    }
}

$mysqli->close();
?>
