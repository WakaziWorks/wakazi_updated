<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_POST['submit'])) {
    $targetDir = "/opt/lampp/htdocs/update_wakazi/artisans/__dashboard/uploads/";
    $fileName = basename($_FILES["profileImage"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        // Check file size - 250px by 250px typically means checking file size, assuming a reasonable DPI
        // For example, this checks for file sizes of approximately less than 5MB
        if ($_FILES["profileImage"]["size"] < 5000000) {
            // Upload file to server
            if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $mysqli = new mysqli("localhost", "root", "", "wakaziworks");
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                // Update profile image in the database
                $email = $_SESSION['email']; // Assuming the user's email is stored in the session
                $update = $mysqli->query("UPDATE artisans SET profile_image = '$fileName' WHERE email = '$email'");

                if ($update) {
                    echo "The file " . $fileName . " has been uploaded successfully.";
                } else {
                    echo "File upload failed, please try again.";
                } 
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, your file is too large.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.";
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
