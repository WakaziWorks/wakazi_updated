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
            /* Control width */
            height: 15em;
            /* Control height */
            object-fit: cover;
            /* Ensure the image covers the area without distortion */
            border-radius: 50%;
            /* Circular images */
        }

        .image-circle {
            width: 15em;
            /* Set image size */
            height: 15em;
            object-fit: cover;
            /* Ensure full coverage within the circle */
            border-radius: 50%;
            /* Make it round */
            margin-bottom: 1em;
            /* Space below each image */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Smooth transitions for effects */
        }

        .image-circle:hover {
            transform: scale(1.05);
            /* Slight scale up on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Shadow for depth */
        }

        .image-text {
            color: #333;
            /* Text color for better visibility */
            font-size: 1.1em;
            /* Larger text */
            text-decoration: none;
            /* No underline */
        }

        .card {
            border: none;
            /* Hide card borders */
            margin-top: -5rem;
            /* Slightly overlap with the section above */
            transition: transform 0.3s ease-in-out;
            /* Smooth transition for hover effect */
        }

        .card:hover {
            transform: translateY(-10px);
            /* Slight raise effect on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
        }

        .card-body {
            padding: 1rem;
            /* Padding inside the card */
        }

        .no-border {
            border: none;
            background: none;
            /* Ensure the background does not interfere */
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
        <div class="top-background text-center" style="padding:50px;">
            <h1>Artisan's Favorite</h1>
            <p>Home decors, Accessories, art and so much more - find well-crafted pieces for every style and budget.</p>
        </div>

        <div class="container mt-4">
            <div class="row justify-content-center">
                <?php
                $items = ['jewel', 'clothing', 'accessories', 'decor', 'bagnpurse', 'art'];
                $names = ['Jewellery', 'Fashion wear', 'Fashion accessories', 'Home decors', 'Crafted bags', 'Art & collectibles'];
                foreach ($items as $index => $item) {
                    echo "<div class='col-sm-6 col-md-4 col-lg-3 mb-4 text-center'>";
                    echo "<img src='img/{$item}.jpg' alt='{$names[$index]}' class='image-circle'> <br>";
                    echo "<a href='#' class='image-text'>{$names[$index]} <i class='bi bi-arrow-right'></i></a>";
                    echo "</div>";
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