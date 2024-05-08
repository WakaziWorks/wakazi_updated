<?php
include("screens/headers/header.php")
?>
<div class="container-fluid" style="padding: 5px;">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner ratio ratio-21x9">
            <div class="carousel-item active text-center p-4" data-bs-interval="3000">
            <img src="courousel/1.png" class="d-block w-100" alt="...">

                <!-- <video src="static/images/Universe.mp4" class="" autoplay muted loop></video> -->
                <div class="carousel-caption justify-content-center">
                    <h1 class="text-start">Artisans are the Alchemists.</h1>
                    <p class="text-start">Artisans are the alchemists of our time, turning ordinary materials into works of wonder.</p>
                    <button class="btn text-uppercase" style="background: #c837d1; font-weight: bold; border-radius: 100px; padding: 10px;"><a href="#collection" class="text-white" style="text-decoration: none;">Discover More</a></button>
                </div>
            </div>
            <div class="carousel-item text-center p-4" data-bs-interval="3000">
            <img src="courousel/2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption justify-content-center">
                    <h1 class="text-start">The silent Philosophers.</h1>
                    <p class="text-start">Artisans are the silent philosophers of society, shaping the world with their hands and minds.</p>
                    <button class="btn text-uppercase" style="background: #c837d1; font-weight: bold; border-radius: 100px; padding: 10px;"><a href="#collection" class="text-white" style="text-decoration: none;">Discover More</a></button>
                </div>
            </div>
            <div class="carousel-item text-center p-4" data-bs-interval="3000">
            <img src="courousel/3.png" class="d-block w-100" alt="...">
            <!-- <video src="static/images/Pottery.mp4" class="" autoplay muted loop></video> -->
                <div class="carousel-caption justify-content-center">
                    <h1 class="text-start">The true Artisan.</h1>
                    <p class="text-start">The true artisan is a seeker of beauty and truth, a philosopher of the tangible.</p>
                    <button class="btn text-uppercase" style="background: #c837d1; font-weight: bold; border-radius: 100px; padding: 10px;"><a href="#collection" class="text-white" style="text-decoration: none;">Discover More</a></button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<div class="container-fluid py-3" style="background: linear-gradient(to bottom, #6c2e8e, #ffffff); padding: 15px;">
    <div class="container-fluid px-4 py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center mb-5">Shop by collections</h1>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="#" onclick="redirectToCategory('jewellery')">
                                <img src="static/images/jewellery.webp" class="card-img-top" alt="Jewellery" style="object-fit: cover; height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Jewellery</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="#" onclick="redirectToCategory('home_decor')">
                                <img src="static/images/decor.jpg" class="card-img-top" alt="Home and Decor" style="object-fit: cover; height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Home Decors</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="#" onclick="redirectToCategory('bags_purses')">
                                <img src="static/images/bag.webp" class="card-img-top" alt="Bags and Purses" style="object-fit: cover; height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Bags and Purses</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="#" onclick="redirectToCategory('art_collectibles')">
                                <img src="static/images/art2.jpg" class="card-img-top" alt="Art and Collectibles" style="object-fit: cover; height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Art and Collectibles</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="#" onclick="redirectToCategory('books_movies_music')">
                                <img src="static/images/books.jpg" class="card-img-top" alt="Books, Movies and Music" style="object-fit: cover; height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Books, Movies and Music</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="#" onclick="redirectToCategory('electronics')">
                                <img src="static/images/electronics.jpg" class="card-img-top" alt="Electronics" style="object-fit: cover; height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Electronics</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="#" onclick="redirectToCategory('accessories')">
                                <img src="static/images/accesories.jpg" class="card-img-top" alt="Accessories" style="object-fit: cover; height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Accessories</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 text-center">
                            <a href="#" onclick="redirectToCategory('craft_supplies_tools')">
                                <img src="static/images/craft.jpg" class="card-img-top" alt="Craft supplies and Tools" style="object-fit: cover; height: 200px;">
                            </a>
                            <div class="card-body">
                                <h4 the card-title">Craft supplies and Tools</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function redirectToCategory(category) {
        switch (category) {
            case 'jewellery':
                window.location.href = 'products/jewellery.php';
                break;
            case 'home_decor':
                window.location.href = 'products/home_decor.php';
                break;
            case 'bags_purses':
                window.location.href = 'products/bags_purses.php';
                break;
            case 'art_collectibles':
                window.location.href = 'products/art_collectibles.php';
                break;
            case 'books_movies_music':
                window.location.href = 'products/books_movies_music.php';
                break;
            case 'electronics':
                window.location.href = 'products/electronics.php';
                break;
            case 'accessories':
                window.location.href = 'products/accessories.php';
                break;
            case 'craft_supplies_tools':
                window.location.href = 'products/craft_supplies_tools.php';
                break;
            default:
                window.location.href = 'products.php';
        }
    }
</script>

<section id="features">
    <div class="container px-5">
        <!-- Gradient title -->
        <div class="row">
            <div class="col-12">
                <h2 class="text-center font-weight-bold my-5" style="background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;">
                    Explore Our Unique Features
                </h2>
            </div>
        </div>
        <div class="row gx-5 align-items-center">
            <div class="col-lg-4">
                <div class="features-device-mockup">
                    <div class="device-wrapper" style="padding: 20px;">
                        <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                            <!-- Applying a circular mask to the screen -->
                            <div class="screen bg-black rounded-circle overflow-hidden">
                                <video class="rounded-circle" muted autoplay loop style="width: 100%; height: auto; display: block;">
                                    <source src="static/images/demo-screen.mp4" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="container-fluid px-5">
                    <div class="row gx-5">
                        <div class="col-md-6 mb-5">
                            <div class="text-center">
                                <img src="static/img/touch-screen_10605241.png" width="90px" height="90px">
                                <br>
                                <h3 class="font-alt">Product Sales</h3>
                                <p class="text-muted mb-0">Extreme product functionalities</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <div class="text-center">
                                <img src="static/img/delivery_6137526 (1).png" width="90px" height="90px">
                                <h3 class="font-alt">Vendor Flexibility</h3>
                                <p class="text-muted mb-0">All vendors with flexible product sales!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0">
                            <div class="text-center">
                                <img src="static/img/touch-screen_10605241.png" width="90px" height="90px">
                                <br>
                                <h3 class="font-alt">Free to Use</h3>
                                <p class="text-muted mb-0">Flexible system</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <img src="static/img/shield_508281.png" width="90px" height="90px">
                                <br>
                                <h3 class="font-alt">Security</h3>
                                <p class="text-muted mb-0">Secure product checkout!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <style>
                .device .screen {
                    position: relative;
                    width: 100%;
                    /* Adjust the size as needed */
                    padding-top: 100%;
                    /* Equal to width for a perfect circle */
                    border-radius: 50%;
                    overflow: hidden;
                }

                .device video {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    min-width: 100%;
                    min-height: 100%;
                }
            </style>

        </div>
    </div>
</section>



<section class="bg-light">
    <div class="container-fluid" style="padding: 30px;">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                <div class="col-12 col-lg-5">
                    <h2 class="display-4 lh-1 mb-4">Renaissance fuses Avant-Garde</h2>
                    <p class="lead fw-normal text-muted mb-4">In the vibrant tapestry of artistic expression, where the Renaissance meets the avant-garde, lies a fusion of tradition and innovation that ignites the senses.</p>
                    <div class="collapse mb-4" id="collapseExample">
                        <p class="lead fw-normal text-muted">
                            Picture the sun-drenched landscapes of sub-Saharan Africa, where rhythms pulse through the earth and colors dance upon the canvas of existence. Here, amidst the ancient rhythms of tribal drums and the intricate beadwork of cultural heritage, emerges a new Renaissance—a rebirth of creativity that transcends boundaries.

                            In this eclectic convergence, traditional motifs intertwine with modern techniques, birthing a kaleidoscope of expression that challenges the norms of convention. This is where the echoes of history harmonize with the avant-garde spirit, where every brushstroke whispers tales of resilience and every melody carries the heartbeat of a continent.
                        </p>
                    </div>
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Read More</a>
                </div>
                <div class="col-sm-8 col-md-6">
                    <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="static/images/igor.jpg" alt="Artistic Image" /></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreBtn = document.getElementById('readMoreBtn');
        const paragraph = document.getElementById('collapseExample');

        readMoreBtn.addEventListener('click', function() {
            if (paragraph.classList.contains('show')) {
                readMoreBtn.textContent = 'Read More';
            } else {
                readMoreBtn.textContent = 'Read Less';
            }
        });
    });
</script>


<section id="download" class="bg-light">
    <div class="container px-5 py-5">
        <h2 class="text-center text-purple font-alt mb-4" style="color: black;">Get the app now!</h2>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="static/images/google-play-badge.svg" alt="Download on Google Play" /></a>
            <a href="#!"><img class="app-badge" src="static/images/app-store-badge.svg" alt="Download on App Store" /></a>
        </div>
    </div>
</section>


<?php
include("screens/footer/footer.php");
?>