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
                    include("../config/app/config.php");

                    // Fetch product details including image URLs from the database
                    $query = "SELECT * FROM Products"; // Replace YourTableName with the actual name of your table
                    $result = $mysqli->query($query);

                    // Loop through each product and display its details
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='col product-details'>";
                        if (!empty($row['image'])) {
                            $imageData = base64_encode($row['image']);
                            echo "<img src='data:image/jpeg;base64,{$imageData}' alt='Product' />";
                        } else {
                            echo "<img src='placeholder.jpg' alt='Product Placeholder' />";
                        }
                        echo "<p class='description'>{$row['description']}</p>";
                        echo "<div class='product-price'>KES. {$row['Price']}</div>";
                        echo "<form action='add_to_cart.php' method='post'>";
                        echo "<input type='hidden' name='product_id' value='{$row['ProductID']}'>";
                        echo "<button type='submit' class='btn btn-primary'><i class='bi bi-plus'></i> Add to Cart</button>";
                        echo "</form>";
                        echo "<a href='product_details.php?id={$row['ProductID']}'>See more <i class='bi bi-arrow-right'></i></a>";
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



