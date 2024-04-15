<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect the user back to the login page
    header("Location: index.php");
    exit();
}

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

// Upload directory
$uploadDirectory = "uploads/";
// File upload functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $uploadOk = 1;

    // Loop through each file
    foreach ($_FILES["fileToUpload"]["tmp_name"] as $key => $tmp_name) {
        $filename = $_FILES["fileToUpload"]["name"][$key];
        $targetFilePath = $uploadDirectory . basename($filename);

        // Check file size
        if ($_FILES["fileToUpload"]["size"][$key] > 50000000000000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFilePath)) {
            $error = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check for upload errors
        if ($_FILES["fileToUpload"]["error"][$key] !== UPLOAD_ERR_OK) {
            $error = "Upload error: " . $_FILES["fileToUpload"]["error"][$key];
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error = "Sorry, your file was not uploaded.";
        } else {
            // Try to upload file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $targetFilePath)) {
                // File uploaded successfully, save file details to database
                $sql = "INSERT INTO uploaded_files (filename, filepath) VALUES ('$filename', '$targetFilePath')";
                if ($conn->query($sql) === TRUE) {
                    $success = "File(s) uploaded successfully.";
                } else {
                    $error = "Error uploading file(s) to database: " . $conn->error;
                }
            } else {
                // Log detailed error information
                error_log("Error uploading file: " . print_r($_FILES["fileToUpload"], true));
                $error = "Error uploading file(s). Please check server logs for more information.";
            }
        }
    }
}




// Fetch list of uploaded files
$sql = "SELECT id, filename FROM uploaded_files";
$result = $conn->query($sql);
$files = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $files[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wakazi - Upload Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Upload Dashboard</h2>
        
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($success)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form id="uploadForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group mt-3">
                <label for="fileToUpload">Select File(s) to Upload:</label>
                <input type="file" name="fileToUpload[]" id="fileToUpload" class="form-control-file" multiple required>
            </div>
            <button type="submit" class="btn btn-primary">Upload File</button>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </form>

        <h2 class="mt-5">Uploaded Files</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>File Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($files as $file) : ?>
                    <tr>
                        <td><?php echo $file['id']; ?></td>
                        <td><?php echo $file['filename']; ?></td>
                        <td>
                            <a href="download.php?id=<?php echo $file['id']; ?>" class="btn btn-primary">Download</a>
                            <a href="delete.php?id=<?php echo $file['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
