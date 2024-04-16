
<?php
include("../update_wakazi/__screens/__headers/header.php")
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
    <div class="collection-container" id="collection">
        <h1>Shop by collections</h1>
        <hr />
        <div class="row">
            <div class="collection-col col-12 col-md mx-3">
                <h4> Jewellery</h4>
                <a href="#"><img src="" alt="..." /></a>
            </div>
            <div class="collection-col col-12 col-md mx-3">
                <h4> Home and Decor</h4>
                <a href="#"><img src="" alt="..." /></a>
            </div>
            <div class="collection-col col-12 col-md mx-3">
                <h4> Bags and Purses</h4>
                <a href="#"><img src="" alt="..." /></a>
            </div>
            <div class="collection-col col-12 col-md mx-3">
                <h4> Art and Collectibles</h4>
                <a href="#"><img src="" alt="..." /></a>
            </div>
        </div>
        <div class="row">
            <div class="collection-col col-12 col-md mx-3">
                <h4> Books, Movies and Music</h4>
                <a href="#"><img src="" alt="..." /></a>
            </div>
            <div class="collection-col col-12 col-md mx-3">
                <h4> Electronics</h4>
                <a href="#"><img src="{{ asset('images/electronics.jpg') }}" alt="..." /></a>
            </div>
            <div class="collection-col col-12 col-md mx-3">
                <h4> Accesories</h4>
                <a href="#"><img src="{{ asset('images/accesories.jpg') }}" alt="..." /></a>
            </div>
            <div class="collection-col col-12 col-md mx-3">
                <h4> Craft supplies and Tools</h4>
                <a href="#"><img src="{{ asset('images/craft.jpg') }}" alt="..." /></a>
            </div>
        </div>
    </div>
    <!-- Product Section -->
    <section id="products" class="py-5">
        <div class="container">
            <h2 class="text-center font-alt mb-5" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-weight: lighter;">Featured Products</h2>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card">
                        <img src="{{ asset('images/electronics.jpg') }}" alt="..." /></a>
                        <div class="card-body">
                            <h5 class="card-title">Electronics</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card">
                        <img src="{{ asset('images/craft.jpg') }}" height="260px" class="card-img-top" alt="Product 2">
                        <div class="card-body">
                            <h5 class="card-title">Accessories</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card product-card">
                        <img src="{{ asset('images/books.jpg') }}" height="260px" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="card-title">Music</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <!-- More products can be added here following the same structure -->
            </div>
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
                                    <p class="text-muted mb-0">Ready to use HTML/CSS device mockups, no Photoshop required!</p>
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
                                    <!-- PUT CONTENTS HERE:-->
                                    <!-- * * This can be a video, image, or just about anything else.-->
                                    <!-- * * Set the max width of your media to 100% and the height to-->
                                    <!-- * * 100% like the demo example below.-->
                                    <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                        <source src="{{ asset('images/demo-screen.mp4') }}" type="video/mp4" />
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
                    <h2 class="display-4 lh-1 mb-4">Enter a new age of web design</h2>
                    <p class="lead fw-normal text-muted mb-5 mb-lg-0">This section is perfect for featuring some information about your application, why it was built, the problem it solves, or anything else! There's plenty of space for text here, so don't worry about writing too much.</p>
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
    <section class="bg-white-primary-to-secondary" id="download" style="#e6cbee">
        <div class="container px-5">
            <h2 class="text-center text-purple font-alt mb-4">Get the app now!</h2>
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="{{ asset('images/google-play-badge.svg') }}" alt="..." /></a>
                <a href="#!"><img class="app-badge" src="{{ asset('images/app-store-badge.svg') }}" alt="..." /></a>
            </div>
        </div>
    </section>
    <section class="footer-top" id="footer-1">
        <div class="container text-center">
            <div class="row align-items-center flex-column flex-sm-row">
                <div class="col">
                    <img src="{{ asset('images/x-diamond-fill.svg') }}" />
                    <h5>Great Value</h5>
                    <p class="col-p">We offer competitive prices on our product range.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/credit-card-2-front-fill.svg') }}" />
                    <h5>Safe Payment</h5>
                    <p class="col-p">Pay with the world’s most popular and secure payment methods.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/shield-lock-fill.svg') }}" />
                    <h5>Shop with Confidence</h5>
                    <p class="col-p">Our Buyer Protection covers your purchase from click to delivery</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/question-circle-fill.svg') }}" />
                    <h5>24/7 Help Center</h5>
                    <p class="col-p">Round-the-clock assistance for a smooth shopping experience.</p>
                </div>
            </div>
        </div>
    </section>
    @include('partials.footer')
    <!-- Feedback Modal-->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary-to-secondary p-4">
                    <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0 p-4">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
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