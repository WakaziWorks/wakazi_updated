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
                        echo "<img src='{$row['image']}' alt='Product' />";
                        echo "<p class='description'>{$row['product_description']}</p>";
                        echo "<div class='product-price'>KES. {$row['product_price']}</div>";
                        echo "<div class='cart-button'>";
                        echo "<button><i class='bi bi-plus'></i>Add to Cart</button>";
                        echo "<a href=''>See more <i class='bi bi-arrow-right' style='font-weight: bold; font-size: large;'></i></a>";
                        echo "</div>";
                        echo "</div>";
                    }

                    // Close the database connection
                    $mysqli->close();
                    ?>
                    <div class="col product-details">
                        <img src="img/sewing.jpg" alt="Product" />
                        <!-- <i class="bi bi-balloon-heart likable-click"></i> -->
                        <p class="product-description">
                            Traditional sewing machine
                        </p>
                        <div class="product-price">
                            KES. 50,000.00
                        </div>
                        <div class="cart-button">
                            <button><i class="bi bi-plus"></i>Add to Cart</button>
                            <a href="">See more <i class="bi bi-arrow-right" style="font-weight: bold; font-size: large;"></i> </a>
                        </div>
                    </div>
                    <div class="col product-details">
                        <img src="img/art.jpg" alt="Product" />
                        <!-- <i class="bi bi-balloon-heart likable-click"></i> -->
                        <p class="product-description">
                            Wall painting on a Canva
                        </p>
                        <div class="product-price">
                            KES. 7,000.00
                        </div>
                        <div class="cart-button">
                            <button><i class="bi bi-plus"></i>Add to Cart</button>
                            <a href="">See more <i class="bi bi-arrow-right" style="font-weight: bold; font-size: large;"></i> </a>
                        </div>
                    </div>
                    <div class="col product-details">
                        <img src="img/african-wear.jpg" alt="Product" />
                        <!-- <i class="bi bi-balloon-heart likable-click"></i> -->
                        <p class="product-description">
                            African wear | Vitenge for couples
                        </p>
                        <div class="product-price">
                            KES. 10,000.00
                        </div>
                        <div class="cart-button">
                            <button><i class="bi bi-plus"></i>Add to Cart</button>
                            <a href="">See more <i class="bi bi-arrow-right" style="font-weight: bold; font-size: large;"></i> </a>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row align-items-start">
                    <div class="col product-details">
                        <img src="img/decor1.jpg" alt="Product" />
                        <!-- <i class="bi bi-balloon-heart likable-click"></i> -->
                        <p class="product-description">
                            Photo frame
                        </p>
                        <div class="product-price">
                            KES. 2,000.00
                        </div>
                        <div class="cart-button">
                            <button><i class="bi bi-plus"></i>Add to Cart</button>
                            <a href="">See more <i class="bi bi-arrow-right" style="font-weight: bold; font-size: large;"></i> </a>
                        </div>
                    </div>
                    <div class="col product-details">
                        <img src="img/handbag.jpg" alt="Product" />
                        <!-- <i class="bi bi-balloon-heart likable-click"></i> -->
                        <p class="product-description">
                            African shopping bag | Kikapu
                        </p>
                        <div class="product-price">
                            KES. 3,000.00
                        </div>
                        <div class="cart-button">
                            <button><i class="bi bi-plus"></i>Add to Cart</button>
                            <a href="">See more <i class="bi bi-arrow-right" style="font-weight: bold; font-size: large;"></i> </a>
                        </div>
                    </div>
                    <div class="col product-details">
                        <img src="img/pot.jpg" alt="Product" />
                        <!-- <i class="bi bi-balloon-heart likable-click"></i> -->
                        <p class="product-description">
                            African milk pot
                        </p>
                        <div class="product-price">
                            KES. 1,000.00
                        </div>
                        <div class="cart-button">
                            <button><i class="bi bi-plus"></i>Add to Cart</button>
                            <a href="">See more <i class="bi bi-arrow-right" style="font-weight: bold; font-size: large;"></i> </a>
                        </div>
                    </div>
                    <div class="col product-details">
                        <img src="img/masai.jpg" alt="Product" />
                        <!-- <i class="bi bi-balloon-heart likable-click"></i> -->
                        <p class="product-description">
                            Maasai necklace
                        </p>
                        <div class="product-price">
                            KES. 500.00
                        </div>
                        <div class="cart-button">
                            <button><i class="bi bi-plus"></i>Add to Cart</button>
                            <a href="">See more <i class="bi bi-arrow-right" style="font-weight: bold; font-size: large;"></i> </a>
                        </div>
                    </div>
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