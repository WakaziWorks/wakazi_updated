<?php
include("../screens/headers/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>collections</title>

    <!-- CSS file -->
    <link rel="stylesheet" type="text/css" href="index.css">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <div style="justify-content: center; align-items: center; text-align: center; display: flex; flex-direction: column;">
        <!-- Top background section -->
        <div class="top-backgound">
            <h1>Artisan's Favorite</h1>
            <p>Home decors, Accesories, art and so much more - find well crafted pieces for every style and budget.</p>
        </div>
        <!-- Collections section -->
        <div class="collections-container">
            <div class="collections">
                <div class="collection-item">
                    <img src="img/jewel.jpg" alt="Jewel">
                    <p>Jewellery <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/wedding.jpg" alt="Jewel">
                    <p>Wedding <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/clothing.jpg" alt="Jewel">
                    <p>Clothing <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/accessories.jpg" alt="Jewel">
                    <p>Accessories <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/pet.jpg" alt="Jewel">
                    <p>Pet supplies <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/decor.jpg" alt="Jewel">
                    <p>Home decors <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
            </div>
            <div class="collections2">
                <div class="collection-item">
                    <img src="img/bagnpurse.jpg" alt="Jewel">
                    <p>Bags & purses <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/bath.jpg" alt="Jewel">
                    <p>Bath & beauty <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/art.jpg" alt="Jewel">
                    <p>Art & collectibles <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/babygift.jpg" alt="Jewel">
                    <p>Baby & gifts <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/craft.jpg" alt="Jewel">
                    <p>Craft supplies <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/paper.jpg" alt="Jewel">
                    <p>Paper supplies <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
            </div>
        </div>
        <!-- Advanced search section -->
        <div class="advanced-search">
            <h1>For more advanced searches...</h1>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search your item here...">
                <spn class="btn" style="background: #ff00ff; color: #000; font-weight: bold;"><i class="bi bi-search"></i></spn>
            </div>
        </div>
    </div>
</body>
</html>