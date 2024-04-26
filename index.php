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
            <video src="static/images/Universe.mp4" class="d-block h-26 w-100" autoplay muted loop></video>
            <div class="carousel-caption">
                <h1 class="heading-h2">Artisans are the Alchemists.</h1>
                <p>Artisans are the alchemists of our time, turning ordinary materials into works of wonder.</p>
                <button style="font-size: 1.0em;"><a href="#collection">Discover more</a></button>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <video src="static/images/Pottery.mp4" class="d-block h-26 w-100" autoplay muted loop></video>
            <div class="carousel-caption">
                <h1 class="heading-h2">The true Artisan.</h1>
                <p>The true artisan is a seeker of beauty and truth, a philosopher of the tangible.</p>
                <button style="font-size: 1.0em;"><a href="#collection">Discover more</a></button>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
            <video src="static/images/Handtools.mp4" class="d-block h-26 w-100" autoplay muted loop></video>
            <div class="carousel-caption">
                <h1 class="heading-h2">The silent Philosophers.</h1>
                <p>Artisans are the silent philosophers of society, shaping the world with their hands and minds. </p>
                <button style="font-size: 1.0em;"><a href="#collection">Discover more</a></button>
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
            <!-- <button class="button" onclick="addToCart('jewellery')">Add to Cart</button> -->
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
<section id="products" class="py-5">
    <div class="container">
        <h2 class="text-center font-alt mb-5">Featured Products</h2>
        <!-- <?php foreach ($productsByCategory as $category => $products) : ?>
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
        <?php endforeach; ?> -->
    </div>
</section>


<!-- App features section-->
<section id="features" id="features" style="background: #e6cbee;">
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
                <p class="lead fw-normal text-muted mb-5 mb-lg-0">In the vibrant tapestry of artistic expression, where the Renaissance meets the avant-garde, lies a fusion of tradition and innovation that ignites the senses. </p>
                <p class="lead fw-normal text-muted mb-5 mb-lg-0" id="paragraph">
                    

                    Picture the sun-drenched landscapes of sub-Saharan Africa, where rhythms pulse through the earth and colors dance upon the canvas of existence. Here, amidst the ancient rhythms of tribal drums and the intricate beadwork of cultural heritage, emerges a new Renaissance—a rebirth of creativity that transcends boundaries. 

                    In this eclectic convergence, traditional motifs intertwine with modern techniques, birthing a kaleidoscope of expression that challenges the norms of convention. This is where the echoes of history harmonize with the avant-garde spirit, where every brushstroke whispers tales of resilience and every melody carries the heartbeat of a continent.
                </p>
                <a class="btn btn-primary mt-3" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="readMoreBtn">Read More</a>
            </div>
            <div class="col-sm-8 col-md-6">
                <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle" src="https://source.unsplash.com/u8Jn2rzYIps/900x900" alt="..." /></div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hide the paragraph initially
        document.getElementById('paragraph').classList.add('collapse');

        // Toggle collapse state when Read More button is clicked
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
<section class="" id="download" style="background-color:#8A3BA1">
    <div class="container px-5">
        <h2 class="text-center text-purple font-alt mb-4">Get the app now!</h2>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="static/images/google-play-badge.svg" alt="..." /></a>
            <a href="#!"><img class="app-badge" src="static/images/app-store-badge.svg" alt="..." /></a>
        </div>
    </div>
</section>
<section class="footer" id="footer-1" style="background-color: #C03FE7DF;">
    <div class="container text-center">
        <div class="row align-items-center flex-column flex-sm-row">
            <div class="col">
                <img src="static/images/x-diamond-fill.svg" />
                <h5>Great Value</h5>
                <p class="col-p">We offer competitive prices on our product range.</p>
            </div>
            <div class="col">
                <img src="static/images/credit-card-2-front-fill.svg" />
                <h5>Safe Payment</h5>
                <p class="col-p">Pay with the world’s most popular and secure payment methods.</p>
            </div>
            <div class="col">
                <img src="static/images/shield-lock-fill.svg" />
                <h5>Shop with Confidence</h5>
                <p class="col-p">Our Buyer Protection covers your purchase from click to delivery</p>
            </div>
            <div class="col">
                <img src="static/images/question-circle-fill.svg" />
                <h5>24/7 Help Center</h5>
                <p class="col-p">Round-the-clock assistance for a smooth shopping experience.</p>
            </div>
        </div>
    </div>


    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="my-5">

        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #431B63">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-between p-4" style="background-color: #433595">
                <!-- Left -->
                <div class="me-5">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="text-white me-4">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">Business
                            </h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">Want to be a seller</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Wakazi Shop</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Terms and Conditions</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">FAQ Center
                                </a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Products</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">Seller Center</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Privacy Policy</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Terms and Conditions</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">FAQ Center
                                </a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Useful links</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><i class="fas fa-home mr-3"></i> Nairobi, Kenya</p>
                            <p><i class="fas fa-envelope mr-3"></i> hexanetsystems@gmail.com</p>
                            <p><i class="fas fa-print mr-3"></i> +254 705 02 7335</p>
                            <p><i class="fas fa-print mr-3"></i> +254 705 02 7335</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: #C435E8">
                © 2024 Copyright:
                <a class="text-white" href="https://wakazi.co.ke/">Wakazi Works</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </div>
</section>
<!-- End of .container -->
<!-- End of .container -->
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