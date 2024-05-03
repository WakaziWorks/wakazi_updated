<?php
include("../screens/headers/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <!-- CSS file -->
    <link rel="stylesheet" type="text/css" href="index.css">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="product-section">
        <div class="container product-row-container">
            <hr />
            <div class="container text-center">
                <div class="row align-items-start">
                    <?php
                    // Assuming $mysqli is your database connection object
                    include ("../config/app/config.php");
                    // Fetch product details including image URLs from the database
                    $query = "SELECT * FROM Products"; // Replace YourTableName with the actual name of your table
                    $result = $mysqli->query($query);

                    // Loop through each product and display its details
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col product-details'>";
                        if (!empty($row['image'])) {
                            // Convert the binary image data to base64 format
                            $imageData = base64_encode($row['image']);
                            // Output the image using base64 format
                            echo "<img src='data:image/jpeg;base64,{$imageData}' alt='Product' />";
                        } else {
                            // If no image data is available, display a placeholder image
                            echo "<img src='placeholder.jpg' alt='Product Placeholder' />";
                        }
                        echo "<p class='description'>{$row['description']}</p>";
                        echo "<div class='product-price'>KES. {$row['Price']}</div>";
                        echo "<div class='cart-button'>";
                        echo "<button><i class='bi bi-plus'></i>Add to Cart</button>";
                        echo "<a href=''>See more <i class='bi bi-arrow-right' style='font-weight: bold; font-size: large;'></i></a>";
                        echo "</div>";
                        echo "</div>";
                    }

                    // Close the database connection
                    $mysqli->close();
                    ?>
                    
                </div>
                <hr />
            </div>
        </div>
    </div>
</body>

</html>

<?php
include("../screens/footer/footer.php")
?>