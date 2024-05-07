<?php
include("../screens/headers/header.php");
?>

    <div class="container-fluid" style="justify-content: center; align-items: center; text-align: center; display: flex; flex-direction: column;">
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
                <!-- <div class="collection-item">
                    <img src="img/wedding.jpg" alt="Jewel">
                    <p>Wedding <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div> -->
                <div class="collection-item">
                    <img src="img/clothing.jpg" alt="Jewel">
                    <p>Fashion wear <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <div class="collection-item">
                    <img src="img/accessories.jpg" alt="Jewel">
                    <p>Fashion accessories <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <!-- <div class="collection-item">
                    <img src="img/pet.jpg" alt="Jewel">
                    <p>Pet supplies <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div> -->
                <div class="collection-item">
                    <img src="img/decor.jpg" alt="Jewel">
                    <p>Home decors <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
            </div>
            <div class="collections2">
                <div class="collection-item">
                    <img src="img/bagnpurse.jpg" alt="Jewel">
                    <p>Crafted bags <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <!-- <div class="collection-item">
                    <img src="img/bath.jpg" alt="Jewel">
                    <p>Bath & beauty <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div> -->
                <div class="collection-item">
                    <img src="img/art.jpg" alt="Jewel">
                    <p>Art & collectibles <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <!-- <div class="collection-item">
                    <img src="img/babygift.jpg" alt="Jewel">
                    <p>Baby & gifts <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div> -->
                <div class="collection-item">
                    <img src="img/craft.jpg" alt="Jewel">
                    <p>Craft supplies <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div>
                <!-- <div class="collection-item">
                    <img src="img/paper.jpg" alt="Jewel">
                    <p>Paper supplies <i class="bi bi-arrow-right" style="font-size: larger;"></i></p>
                </div> -->
            </div>
        </div>
        <!-- Advanced search section -->
        <div class="advanced-search" style="text-align: center;">
            <h1>For more advanced searches...</h1>
            <div class="input-group" style="width: 70%; margin: 0 auto;">
                <input type="text" class="form-control" placeholder="Search your item here..." style="border-top-right-radius: 0; border-bottom-right-radius: 0;">
                <span class="btn" style="background: #ff00ff; color: #000; font-weight: bold; border-top-left-radius: 0; border-bottom-left-radius: 0; padding: 10px;">
                    <i class="bi bi-search"></i>
                </span>
            </div>
            <h5 style="margin-top: 2em; margin-bottom: 2em;">Don't know where to start?</h5>
            <button>Explore Products</button>
        </div>
        <div class="bottom">
            <p>Send me exclusive offers, personalized tips for shopping and how to sell on Wakazi.</p>
            <div class="input-group" style="width: 50%; margin: 0 auto; border: 1px solid purple; border-radius: 30px;">
                <input type="text" class="form-control" placeholder="Enter your Email." style="border-top-left-radius: 30px; border-bottom-left-radius: 30px;">
                <span class="btn" style="background: transparent; font-weight: bold;">
                    Subscribe
                </span>
            </div>
        </div>
    </div>
    <?php
        include("../screens/footer/footer.php");
    ?>
</body>
</html>