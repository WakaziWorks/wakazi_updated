<?php
include("__screens/__headers/header.php")
?>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button> -->
    </div>
    <div class="carousel-inner ratio ratio-21x9">
        <div class="carousel-item active" data-bs-interval="5000">
            <video src="static/images/Universe.mp4" class="d-block h-20 w-100" autoplay muted loop></video>
            <div class="carousel-caption">
                <h1 class="heading-h1">Artisans are the Alchemists.</h1>
                <p>Artisans are the alchemists of our time, turning ordinary materials into works of wonder.</p>
                <button style="font-size: 1.2em;"><a href="#collection">Discover more</a></button>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <video src="static/images/Pottery.mp4" class="d-block h-20 w-100" autoplay muted loop></video>
            <div class="carousel-caption">
                <h1 class="heading-h1">The true Artisan.</h1>
                <p>The true artisan is a seeker of beauty and truth, a philosopher of the tangible.</p>
                <button style="font-size: 1.2em;"><a href="#collection">Discover more</a></button>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <video src="static/images/Handtools.mp4" class="d-block h-20 w-100" autoplay muted loop></video>
            <div class="carousel-caption">
                <h1 class="heading-h1">The silent Philosophers.</h1>
                <p>Artisans are the silent philosophers of society, shaping the world with their hands and minds. </p>
                <button style="font-size: 1.2em;"><a href="#collection">Discover more</a></button>
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



<!-- Collections -->
<div class="collection-container justify-content-center" id="collection">
    <h1>Shop by collections</h1>
    <hr />
    <div class="row">
        <div class="collection-col col-12 col-md mx-3">
            <h4>Jewellery</h4>
            <a href="#" onclick="redirectToCategory('jewellery')"><img src="static/images/jewellery.webp" alt="Jewellery" /></a>
        </div>
        <div class="collection-col col-12 col-md mx-3">
            <h4>Home and Decor</h4>
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

<!-- Product Section -->
<!-- <section id="products" class="py-5">
    <div class="container">
        <h2 class="text-center font-alt mb-5">Featured Products</h2>
        <?php foreach ($productsByCategory as $category => $products) : ?>
            <h3><?php echo htmlspecialchars($category); ?></h3>
            <div class="row g-4">
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card product-card">
                            <img src="<?php echo htmlspecialchars($product['image_path']); ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section> -->


<!-- App features section-->
<section id="features" id="features">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                <div class="container-fluid px-5">
                    <div class="row gx-5">
                        <div class="col-md-6 mb-5">
                            <!-- Feature item-->
                            <div class="text-center">
                                <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                                <h3 class="font-alt">Product Sales</h3>
                                <p class="text-muted mb-0">Extremem product fucntionalities </p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <!-- Feature item-->
                            <div class="text-center">
                                <i class="bi-camera icon-feature text-gradient d-block mb-3"></i>
                                <h3 class="font-alt">Vendor Flexibility</h3>
                                <p class="text-muted mb-0">All vendors with flexible product Sales!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0">
                            <!-- Feature item-->
                            <div class="text-center">
                                <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                                <h3 class="font-alt">Free to Use</h3>
                                <p class="text-muted mb-0">Flexible system</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Feature item-->
                            <div class="text-center">
                                <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                <h3 class="font-alt">Security</h3>
                                <p class="text-muted mb-0">Secure product checkout!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-0">
                <!-- Features section device mockup-->
                <div class="features-device-mockup">
                    <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                <stop class="gradient-start-color" offset="0%"></stop>
                                <stop class="gradient-end-color" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <circle cx="50" cy="50" r="50"></circle>
                    </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                        <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect>
                    </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50"></circle>
                    </svg>
                    <div class="device-wrapper">
                        <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                            <div class="screen bg-black">

                                <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                    <source src="static/images/demo-screen.mp4" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Quote/testimonial aside-->
<!-- <aside class="text-center bg-secondary">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-1 text-white mb-4">"An intuitive solution to a common problem that we all face, wrapped up in a ecommerce web system"</div>
                    <img src="{{ asset('images/tnw-logo.svg') }}" alt="..." style="height: 3rem" />
                </div>
            </div>
        </div>
    </aside> -->
<!-- Basic features section-->
<section class="bg-light">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-5">
                <h2 class="display-4 lh-1 mb-4">Renaissance fuses Avant-Garde </h2>
                <p class="lead fw-normal text-muted mb-5 mb-lg-0">
                    In the vibrant tapestry of artistic expression, where the Renaissance meets the avant-garde, lies a fusion of tradition and innovation that ignites the senses. 
                    <a href="#">contiue reading.</a>
                </p>
            </div>
            <div class="col-sm-8 col-md-6">
                <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="https://source.unsplash.com/u8Jn2rzYIps/900x900" alt="..." /></div>
            </div>
        </div>
    </div>
</section>
<!-- Call to action section-->
<!-- <section class="cta">
        <div class="cta-content">
            <div class="container px-5">
                <h2 class="text-white display-1 lh-1 mb-4">
                    Stop waiting.
                    <br />
                    Start building.
                </h2>
                <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="https://startbootstrap.com/theme/new-age" target="_blank">Download for free</a>
            </div>
        </div>
    </section> -->
<!-- App badge section-->
<section class="" id="download">
    <div class="container px-5">
        <h2 class="text-center text-purple font-alt mb-4" style="color: black;">Get the app now!</h2>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="static/images/google-play-badge.svg" alt="..." /></a>
            <a href="#!"><img class="app-badge" src="static/images/app-store-badge.svg" alt="..." /></a>
        </div>
    </div>
</section>
<section class="footer-top" id="footer-1" style="background-color: #e868f0;">
    <div class="container text-center">
        <div class="row align-items-center flex-column flex-sm-row">
            <div class="col footer-col">
                <img src="static/images/x-diamond-fill.svg" />
                <h5 style="color: #000; font-weight: normal;">Great Value</h5>
                <p class="col-p text-light">We offer competitive prices on our product range.</p>
            </div>
            <div class="col footer-col">
                <img src="static/images/credit-card-2-front-fill.svg" />
                <h5 style="color: #000; font-weight: normal;">Safe Payment</h5>
                <p class="col-p text-light">Pay with the world’s most popular and secure payment methods.</p>
            </div>
            <div class="col footer-col">
                <img src="static/images/shield-lock-fill.svg" />
                <h5 style="color: #000; font-weight: normal;">Shop with Confidence</h5>
                <p class="col-p text-light">Our Buyer Protection covers your purchase from click to delivery</p>
            </div>
            <div class="col footer-col">
                <img src="static/images/question-circle-fill.svg" />
                <h5 style="color: #000; font-weight: normal;">24/7 Help Center</h5>
                <p class="col-p text-light">Round-the-clock assistance for a smooth shopping experience.</p>
            </div>
        </div>
    </div>
</section>


<!-- Footer-->
    <section class="footer" style="background-color: #c837d1;">
        <div class="container-fluid">
            <div class="row" style="margin-left: 7em;">
                <div class="col terms-section">
                    <h4>Shopping Guide</h4>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">How do I pay on wakazi?</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">How long does my order arrive?</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">How to shop on wakazi?</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">Forgot password?</p>
                    </a>
                </div>
                <div class="col terms-section">
                    <h4>Customer Help</h4>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">Privacy Policy</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">Terms and Conditions</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">Account Settings</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">Delivery and Shipping</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">FAQ Center</p>
                    </a>
                </div>
                <div class="col terms-section">
                    <h4>Business</h4>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">Want to be a Seller?</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">Seller Center</p>
                    </a>
                    <a href="__superadmin__/index.html">
                        <p class="text-light">Wakazi Shop</p>
                        </a>
                </div>
                <div class="col terms-section">
                    <h4>Stay Connected</h4>
                    <a href="https://www.youtube.com/@WakaziWorks" target="blank"><i class="bi bi-youtube text-light"></i></a>
                    <a href="https://ke.linkedin.com/company/wakazi-works-platform" target="blank"><i class="bi bi-linkedin text-light"></i></a>
                    <a href="https://twitter.com/wakaziworks" target="blank"><i class="bi bi-twitter text-light"></i></i></a>
                    <a href="https://www.instagram.com/wakazi_works/" target="blank"><i class="bi bi-instagram text-light"></i></a>
                </div>
            </div>
        </div>
    </section>
    <div class="bottom-footer" style="background: #7d1a86">
        <div>
            <div class="mb-2 text-light">&copy; Wakazi Works 2024</div>
            <a href="__superadmin__/index.html">Privacy</a>
            <span class="mx-2 text-light">&middot;</span>
            <a href="__superadmin__/index.html">Terms</a>
            <span class="mx-2 text-light">&middot;</span>
            <a href="__superadmin__/index.html">FAQ</a>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
    </html>