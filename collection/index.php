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
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-4">
                <img src="img/jewel.jpg"  alt="Jewel" class="img-fluid rounded-circle" style="width: 15em; height:15em;">
                <p class="text-center mt-2">Jewellery <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
            </div>
            <div class="col-lg-4">
                <img src="img/clothing.jpg"  alt="Clothing" class="img-fluid rounded-circle">
                <p class="text-center mt-2">Fashion wear <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
            </div>
            <div class="col-lg-4">
                <img src="img/accessories.jpg"  alt="Accessories" class="img-fluid rounded-circle">
                <p class="text-center mt-2">Fashion accessories <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <img src="img/decor.jpg"  alt="Decor" class="img-fluid rounded-circle">
                <p class="text-center mt-2">Home decors <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
            </div>
            <div class="col-lg-4">
                <img src="img/bagnpurse.jpg"  alt="Bags & Purse" class="img-fluid rounded-circle">
                <p class="text-center mt-2">Crafted bags <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
            </div>
            <div class="col-lg-4">
                <img src="img/art.jpg"  alt="Art & Collectibles" class="img-fluid rounded-circle">
                <p class="text-center mt-2">Art & collectibles <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
            </div>
        </div>
    </div>

    <!-- Advanced search section -->
    <div class="container-fluid">
        <div class="advanced-search">
            <h1>For more advanced searches...</h1>
            <div class="input-group" style="width: 50%; margin: 0 auto; border: 1px solid purple; border-radius: 30px;">
                <input type="text" class="form-control" placeholder="Search your item here.. " style="border-top-left-radius: 30px; border-bottom-left-radius: 30px;">
                <button class="btn btn-primary" style="border-top-right-radius: 30px; border-bottom-right-radius: 30px;">Search</button>
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
</div>

<?php
include("../screens/footer/footer.php");
?>

<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>