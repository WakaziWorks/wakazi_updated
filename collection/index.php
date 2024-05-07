<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan Collections</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            width: 100%;
            border-top-left-radius: 15em;
            border-top-right-radius: 15em;
        }
        .no-border {
            border: none;
            margin-top: -5rem;
        }
    </style>
</head>
<body>
<?php include("../screens/headers/header.php"); ?>

<div class="container-fluid" style="padding: 70px;">
    <div class="top-background text-center">
        <h1>Artisan's Favorite</h1>
        <p>Home decors, Accessories, art and so much more - find well-crafted pieces for every style and budget.</p>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <?php
            $items = ['jewel', 'clothing', 'accessories', 'decor', 'bagnpurse', 'art'];
            $names = ['Jewellery', 'Fashion wear', 'Fashion accessories', 'Home decors', 'Crafted bags', 'Art & collectibles'];
            for ($i = 0; $i < count($items); $i++) {
                echo '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">';
                echo '<div class="card no-border text-center">';
                echo '<img src="img/' . $items[$i] . '.jpg" alt="' . $names[$i] . '" class="card-img-top img-fluid rounded-circle">';
                echo '<div class="card-body">';
                echo '<p class="card-text">' . $names[$i] . ' <i class="bi bi-arrow-right"></i></p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="container-fluid text-center">
        <h1>For more advanced searches...</h1>
        <div class="input-group mx-auto my-3" style="width: 50%; border: 1px solid purple; border-radius: 30px;">
            <input type="text" class="form-control" placeholder="Search your item here.." style="border-radius: 30px 0 0 30px;">
            <button class="btn btn-primary" style="border-radius: 0 30px 30px 0;">Search</button>
        </div>
        <h5>Don't know where to start?</h5>
        <button class="btn btn-primary">Explore Products</button>

        <div class="my-4">
            <p>Send me exclusive offers, personalized tips for shopping and how to sell on Wakazi.</p>
            <div class="input-group mx-auto" style="width: 50%; border: 1px solid purple; border-radius: 30px;">
                <input type="email" class="form-control" placeholder="Enter your Email." style="border-radius: 30px 0 0 30px;">
                <button class="btn btn-primary" style="border-radius: 0 30px 30px 0;">Subscribe</button>
            </div>
        </div>
    </div>
</div>

<?php include("../screens/footer/footer.php"); ?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
