<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan's Favorite</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Custom styles here */
        .top-background {
            background-color: #f8f9fa;
            padding: 2rem;
            text-align: center;
        }

        .collections-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            padding: 2rem;
        }

        .collection-item {
            text-align: center;
        }

        .collection-item img {
            border-radius: 15px;
            max-width: 100%;
            height: auto;
        }

        .advanced-search {
            text-align: center;
            padding: 2rem;
        }

        .bottom {
            background-color: #f8f9fa;
            padding: 2rem;
            text-align: center;
        }

        /* Override Bootstrap styles if needed */
    </style>
</head>

<body>

    <?php
    include("../screens/headers/header.php");
    ?>

    <div class="container-fluid">
        <!-- Top background section -->
        <div class="top-background">
            <h1>Artisan's Favorite</h1>
            <p>Home decors, Accessories, art and so much more - find well-crafted pieces for every style and budget.</p>
        </div>
        <!-- Collections section -->
        <div class="collections-container">
            <div class="collections">
                <div class="collection-item">
                    <img src="img/jewel.jpg" alt="Jewel" class="img-fluid rounded">
                    <p>Jewellery <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/clothing.jpg" alt="Clothing" class="img-fluid rounded">
                    <p>Fashion wear <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/accessories.jpg" alt="Accessories" class="img-fluid rounded">
                    <p>Fashion accessories <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/decor.jpg" alt="Decor" class="img-fluid rounded">
                    <p>Home decors <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
            </div>
            <div class="collections2">
                <div class="collection-item">
                    <img src="img/bagnpurse.jpg" alt="Bags & Purse" class="img-fluid rounded">
                    <p>Crafted bags <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/art.jpg" alt="Art & Collectibles" class="img-fluid rounded">
                    <p>Art & collectibles <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/craft.jpg" alt="Craft Supplies" class="img-fluid rounded">
                    <p>Craft supplies <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
            </div>
        </div>
        <!-- Advanced search section -->
        <div class="advanced-search">
            <h1>For more advanced searches...</h1>
            <div class="input-group" style="width: 70%; margin: 0 auto;">
                <input type="text" class="form-control" placeholder="Search your item here..." style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                <button class="btn btn-primary" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            <h5 style="margin-top: 2em; margin-bottom: 2em;">Don't know where to start?</h5>
            <button class="btn btn-primary">Explore Products</button>
        </div>
        <div class="bottom">
            <p>Send me exclusive offers, personalized tips for shopping and how to sell on Wakazi.</p>
            <div class="input-group" style="width: 50%; margin: 0 auto; border: 1px solid purple; border-radius: 30px;">
                <input type="text" class="form-control" placeholder="Enter your Email." style="border-top-left-radius: 30px; border-bottom-left-radius: 30px;">
                <button class="btn btn-primary" style="border-top-right-radius: 30px; border-bottom-right-radius: 30px;">Subscribe</button>
            </div>
        </div>
    </div>

    <?php
    include("../screens/footer/footer.php");
    ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
