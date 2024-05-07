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
            object-fit: contain;
        }
        .no-border {
            border: none;
            margin-top: -5rem;
        }
        .gradient-card {
            background: linear-gradient(135deg, #957DAD 0%, #D291BC 100%);
            border-radius: 15px;
            color: white;
            padding: 20px;
            margin: auto;
            width: 75%;
        }

        .input-group-custom {
            border: 1px solid #FFFFFF; 
            border-radius: 30px;
        }

        .form-control-custom {
            border-radius: 30px 0 0 30px;
        }

        .btn-custom {
            border-radius: 0 30px 30px 0;
        }
    </style>
</head>
<body>
<?php include("../screens/headers/header.php"); ?>

<div class="container-fluid">
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="gradient-card">
                <h1>For more advanced searches...</h1>
                <div class="input-group input-group-custom mx-auto my-3" style="width: 80%;">
                    <input type="text" class="form-control form-control-custom" placeholder="Search your item here..">
                    <button class="btn btn-primary btn-custom">Search</button>
                </div>
                <h5>Don't know where to start?</h5>
                <button class="btn btn-primary">Explore Products</button>
            </div>
        </div>
        <div class="col-md-12 my-4">
            <div class="gradient-card">
                <p>Send me exclusive offers, personalized tips for shopping and how to sell on Wakazi.</p>
                <div class="input-group input-group-custom mx-auto" style="width: 80%;">
                    <input type="email" class="form-control form-control-custom" placeholder="Enter your Email.">
                    <button class="btn btn-primary btn-custom">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</div>

<?php include("../screens/footer/footer.php"); ?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
