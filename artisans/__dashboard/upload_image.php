<!-- upload_image.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Upload Images</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="images">Select Images:</label>
            <input type="file" class="form-control-file" id="images" name="images[]" multiple accept="image/*">
            <small class="form-text text-muted">Select multiple images (jpg, jpeg, png, gif) with maximum size of 5MB each.</small>
        </div>
        <button type="submit" class="btn btn-primary">Upload Images</button>
    </form>
</div>

</body>
</html>


<?php
// upload.php

// Check if files are uploaded
if(isset($_FILES['images'])) {
    $uploadDir = 'uploads/'; // Directory where uploaded images will be stored

    // Iterate through each uploaded file
    foreach($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $fileName = $_FILES['images']['name'][$key];
        $fileSize = $_FILES['images']['size'][$key];
        $fileTmp = $_FILES['images']['tmp_name'][$key];
        $fileType = $_FILES['images']['type'][$key];

        // Check if file is uploaded successfully
        if($fileSize > 0 && is_uploaded_file($fileTmp)) {
            // Check if file is an image
            if(strpos($fileType, 'image') !== false) {
                $uploadPath = $uploadDir . $fileName;

                // Move uploaded file to destination directory
                if(move_uploaded_file($fileTmp, $uploadPath)) {
                    echo "File $fileName uploaded successfully.<br>";
                } else {
                    echo "Failed to upload file $fileName.<br>";
                }
            } else {
                echo "File $fileName is not an image.<br>";
            }
        } else {
            echo "File $fileName is empty or failed to upload.<br>";
        }
    }

    // Redirect to a success page
    header("Location: success.php");
    exit();
} else {
    echo "No files uploaded.";
}
?>
