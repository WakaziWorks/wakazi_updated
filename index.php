<?php
include("screens/headers/header.php")
?>
<div class="container">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner ratio ratio-21x9">
            <div class="carousel-item active" data-bs-interval="3000">
                <video src="static/images/Universe.mp4" class="" autoplay muted loop></video>
                <div class="carousel-caption">
                    <h1 class="heading-h1">Artisans are the Alchemists.</h1>
                    <p>Artisans are the alchemists of our time, turning ordinary materials into works of wonder.</p>
                    <button style="font-size: 1.5em; background: #c837d1; font-weight: bold; border-radius: 100px; padding: 20px;"><a href="#collection">DISCOVER MORE</a></button>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <video src="static/images/Handtools.mp4" class="" autoplay muted loop></video>
                <div class="carousel-caption">
                    <h1 class="heading-h1">The silent Philosophers.</h1>
                    <p>Artisans are the silent philosophers of society, shaping the world with their hands and minds. </p>
                    <button style=" background: #c837d1; font-weight: bold; border-radius: 100px; padding: 10px;"><a href="#collection">DISCOVER MORE</a></button>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <video src="static/images/Pottery.mp4" class="" autoplay muted loop></video>
                <div class="carousel-caption">
                    <h1 class="heading-h1">The true Artisan.</h1>
                    <p>The true artisan is a seeker of beauty and truth, a philosopher of the tangible.</p>
                    <button style="font-size: 1.5em; background: #c837d1; font-weight: bold; border-radius: 100px; padding: 20px;"><a href="#collection">DISCOVER MORE</a></button>
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


<div class="collection-container justify-content-center" id="collection">
    <h1>Shop by collections</h1>
    <div class="row gx-3">
        <div class="collection-col col-12 col-md mx-3">
            <h4>Jewellery</h4>
            <a href="#" onclick="redirectToCategory('jewellery')"><img src="static/images/jewellery.webp" alt="Jewellery" /></a>
        </div>
        <div class="collection-col col-12 col-md mx-3">
            <h4>Home Decors</h4>
            <a href="#" onclick="redirectToCategory('home_decor')"><img src="static/images/decor.jpg" alt="Home and Decor" /></a>
        </div>
        <div class="collection-col col-12 col-md mx-3">
            <h4>Bags and Purses</h4>
            <a href="#" onclick="redirectToCategory('bags_purses')"><img src="static/images/bag.webp" alt="Bags and Purses" /></a>
        </div>
        <div class="collection-col col-12 col-md mx-3">
            <h4>Art and Collectibles</h4>
            <a href="#" onclick="redirectToCategory('art_collectibles')"><img src="static/images/art2.jpg" alt="Art and Collectibles" /></a>
        </div>
    </div>
    <div class="row">
        <div class="collection-col col-12 col-md mx-3">
            <h4>Books, Movies and Music</h4>
            <a href="#" onclick="redirectToCategory('books_movies_music')"><img src="static/images/books.jpg" alt="Books, Movies and Music" /></a>
        </div>
        <div class="collection-col col-12 col-md mx-3">
            <h4>Electronics</h4>
            <a href="#" onclick="redirectToCategory('electronics')"><img src="static/images/electronics.jpg" alt="Electronics" /></a>
        </div>
        <div class="collection-col col-12 col-md mx-3">
            <h4>Accessories</h4>
            <a href="#" onclick="redirectToCategory('accessories')"><img src="static/images/accesories.jpg" alt="Accessories" /></a>
        </div>
        <div class="collection-col col-12 col-md mx-3">
            <h4>Craft supplies and Tools</h4>
            <a href="#" onclick="redirectToCategory('craft_supplies_tools')"><img src="static/images/craft.jpg" alt="Craft supplies and Tools" /></a>
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
    <div class="card">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="container-fluid px-5">
                        <div class="row gx-5">
                            <div class="col-md-6 mb-5">
                                <div class="text-center">
                                    <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Product Sales</h3>
                                    <p class="text-muted mb-0">Extreme product functionalities</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <div class="text-center">
                                    <i class="bi-camera icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Vendor Flexibility</h3>
                                    <p class="text-muted mb-0">All vendors with flexible product sales!</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <div class="text-center">
                                    <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Free to Use</h3>
                                    <p class="text-muted mb-0">Flexible system</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Security</h3>
                                    <p class="text-muted mb-0">Secure product checkout!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-device-mockup">
                        <div class="device-wrapper">
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
    </div>
</section>


<section class="bg-light">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-5">
                <h2 class="display-4 lh-1 mb-4">Renaissance fuses Avant-Garde </h2>
                <p class="lead fw-normal text-muted mb-5 mb-lg-0">In the vibrant tapestry of artistic expression, where the Renaissance meets the avant-garde, lies a fusion of tradition and innovation that ignites the senses. </p>
                <p class="lead fw-normal text-muted mb-5 mb-lg-0" id="paragraph">


                    Picture the sun-drenched landscapes of sub-Saharan Africa, where rhythms pulse through the earth and colors dance upon the canvas of existence. Here, amidst the ancient rhythms of tribal drums and the intricate beadwork of cultural heritage, emerges a new Renaissance—a rebirth of creativity that transcends boundaries.

                    In this eclectic convergence, traditional motifs intertwine with modern techniques, birthing a kaleidoscope of expression that challenges the norms of convention. This is where the echoes of history harmonize with the avant-garde spirit, where every brushstroke whispers tales of resilience and every melody carries the heartbeat of a continent.
                </p>
                <a class="btn btn-primary mt-3" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="readMoreBtn" style="background: #ff00ff; border: none; outline: none;">Read More</a>
            </div>
            <div class="col-sm-8 col-md-6">
                <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="" alt="..." /></div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('paragraph').classList.add('collapse');

        document.getElementById('readMoreBtn').addEventListener('click', function() {
            const paragraph = document.getElementById('paragraph');
            if (paragraph.classList.contains('show')) {
                paragraph.classList.remove('show');
                document.getElementById('readMoreBtn').innerText = 'Read More';
            } else {
                paragraph.classList.add('show');
                document.getElementById('readMoreBtn').innerText = 'Read Less';
            }
        });
    });
</script>

<section class="" id="download">
    <div class="container px-5">
        <h2 class="text-center text-purple font-alt mb-4" style="color: black;">Get the app now!</h2>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="static/images/google-play-badge.svg" alt="..." /></a>
            <a href="#!"><img class="app-badge" src="static/images/app-store-badge.svg" alt="..." /></a>
        </div>

    </div>
</section>

<?php
include("screens/footer/footer.php");
?>