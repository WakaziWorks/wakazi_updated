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
            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col product-details">
                        <img src="img/decor1.jpg" alt="Product" />
                        <!-- <i class="bi bi-balloon-heart likable-click"></i> -->
                        <p class="product-description">
                            Product's name and detailed/summarized description
                        </p>
                        <div class="product-price">
                            KES. 2000.00
                        </div>
                        <div class="cart-button">
                            <button><i class="bi bi-plus"></i>Add to Cart</button>
                            <a href="">See more  <i class="bi bi-arrow-right" style="font-weight: bold; font-size: large;"></i> </a>
                        </div>
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                    <div class="col">
                    One of three columns
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include("../screens/footer/footer.php")
?>