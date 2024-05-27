<?php
include("screens/headers/header.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Carousel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .carousel-item {
            position: relative;
            height: 75vh;
        }

        .carousel-item img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .carousel-caption {
            position: absolute;
            top: 30%;
            left: 5%;
            text-align: left;
            color: #fff;
        }

        .carousel-caption h1 {
            font-size: 2.5em;
            font-weight: bold;
            animation: fadeInLeft 1s;
        }

        .carousel-caption .btn {
            font-size: 1.5em;
            padding: 15px 30px;
            animation: fadeIn 2s;
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .card {
            height: 100%;
        }
        .card-img {
            height: 400px;
            object-fit: cover;
        }
        .card:hover .card-img {
            opacity: 0.7;
        }
        .card-title {
            transition: color 0.3s;
        }
        .card:hover .card-title {
            color: black;
        }
    </style>
</head>

<body>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="static/courousel/1.png" class="d-block w-100 img-fluid" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>
                        Artisans are the silent philosophers of society, shaping the
                        world with their hands and minds.
                    </h1>
                    <a href="#" class="btn" style="background: #c837d1;">Discover more</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="static/courousel/2.png" class="d-block w-100 img-fluid" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>
                        Artisans are the alchemists of our time, turning ordinary materials into works of wonder.
                    </h1>
                    <a href="#" class="btn" style="background: #c837d1;">Discover more</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://imgs.search.brave.com/GiXO7erHMcTuWvOQpgBIKwNkyqX1o7kxoH4l3RlRMmY/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWcu/ZnJlZXBpay5jb20v/ZnJlZS1waG90by92/aWV3LXdvcmtlci1n/cmluZGluZy1waWVj/ZS1tZXRhbF8yNjg4/MzUtNDA5Mi5qcGc_/c2l6ZT02MjYmZXh0/PWpwZw" class="d-block w-100 img-fluid" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>   
                        The true artisan is a seeker of beauty and truth, a philosopher
                        of the tangible.
                    </h1>
                    <a href="#" class="btn" style="background: #c837d1;">Discover more</a>
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
    <div class="container">
        <div class="row text-center p-4">
            <div class="col-6 col-md-3 d-flex align-items-center justify-content-center py-3">
                <i class="bi bi-shield-slash fa-2x mr-2 fw-bolder"></i>
                <span class="fw-bold fs-5">Security.</span>
            </div>
            <div class="col-6 col-md-3 d-flex align-items-center justify-content-center py-3">
                <i class="bi bi-truck fa-2x mr-2 fw-bolder"></i>
                <span class="fw-bold fs-5">Timely Delivery.</span>
            </div>
            <div class="col-6 col-md-3 d-flex align-items-center justify-content-center py-3">
                <i class="bi bi-credit-card-2-front fa-2x mr-2 fw-bolder"></i>
                <span class="fw-bold fs-5">Safe Payment.</span>
            </div>
            <div class="col-6 col-md-3 d-flex align-items-center justify-content-center py-3">
                <i class="bi bi-clock-history fa-2x mr-2 fw-bolder"></i>
                <span class="fw-bold fs-5">24/7 support.</span>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light py-5">
        <div class="container p-4">
            <h1 class="text-center fw-bold" style="color: #c837d1;"> Browse your favorite collection</h1>
        </div>
        <div class="container">
            <div class="row">
                <!-- Card 1 -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="card rounded-0">
                        <img src="https://imgs.search.brave.com/L28rKF7sc1pg_hocq7HWs4lOF_FSoLYMbFvZh4EB92A/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMudW5zcGxhc2gu/Y29tL3Bob3RvLTE2/MDIxNzM1NzQ3Njct/MzdhYzAxOTk0YjJh/P3E9ODAmdz0xMDAw/JmF1dG89Zm9ybWF0/JmZpdD1jcm9wJml4/bGliPXJiLTQuMC4z/Jml4aWQ9TTN3eE1q/QTNmREI4TUh4elpX/RnlZMmg4TVRKOGZH/cGxkMlZzY25sOFpX/NThNSHg4TUh4OGZE/QT0" class="card-img rounded-0" alt="Image 1">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h2 class="card-title text-black">Jewellery</h2>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="card rounded-0">
                        <img src="https://imgs.search.brave.com/jWK-2qMaBNNuOdJ1peGKTTIs_NF9UAWF027mPDPgNJg/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzY0L2E0/L2FmLzY0YTRhZjU3/NWQ4NmVkYjU0MGNk/M2EzYzlhZDcwNmZh/LmpwZw" class="card-img rounded-0" alt="Image 2">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h2 class="card-title text-black">Craft Steel</h2>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="card rounded-0">
                        <img src="https://imgs.search.brave.com/h2g66YwxHOG1zumR7-DMvZnDyYgd7fMJ1rJo5IwvLkU/rs:fit:860:0:0/g:ce/aHR0cHM6Ly93d3cu/bWFraW5naG9tZWJh/c2UuY29tL3dwLWNv/bnRlbnQvdXBsb2Fk/cy8yMDIyLzEwL1Bp/Y3R1cmUtSGFuZ2lu/Zy1JZGVhcy1OYWls/cy1hbmQtU2NyZXdz/LTY4M3gxMDI0Lmpw/ZWc" class="card-img rounded-0" alt="Image 3">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h2 class="card-title text-black">Home Decors</h2>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="card rounded-0">
                        <img src="https://imgs.search.brave.com/MUR7WvMmZjmKeozjAJvOYTETNjE7_CBJZI70rld-54A/rs:fit:860:0:0/g:ce/aHR0cHM6Ly93d3cu/a2VqZW9kZXNpZ25z/LmNvbS9jZG4vc2hv/cC9wcm9kdWN0cy80/X2UyMjQzZjE2LTMy/ZDgtNDgwZC1hODFl/LWUzMGUxNDgyN2E2/Zl8xMDAweDEwMDAu/anBnP3Y9MTYyMzQz/NjM4Nw" class="card-img rounded-0" alt="Image 4">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h2 class="card-title text-black">Crafted Bags</h2>
                        </div>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="card rounded-0">
                        <img src="https://imgs.search.brave.com/DH9csZbXR-s1BCytGTluLi0kbIfQfYyK_lJtVsaXnuI/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzYyL2E2/LzlmLzYyYTY5ZmJj/NWZiMTM4MTM5M2Vh/MTI4ZTc4Mzk3ZDJj/LmpwZw" class="card-img rounded-0" alt="Image 5">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h2 class="card-title text-black">Fashion Wears</h2>
                        </div>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="card rounded-0">
                        <img src="https://imgs.search.brave.com/UlyZ9tB_upxEsedh2OZx_vKJ3g-OkmG2y8Z_qoXSL6I/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzgxLzhm/LzAyLzgxOGYwMjg0/YzI4YmVlOWE1Y2U4/YmNhZjRhMTJhMjY4/LmpwZw" class="card-img rounded-0" alt="Image 6">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h2 class="card-title text-black">Fashion Accessories</h2>
                        </div>
                    </div>
                </div>
                <!-- Card 7 -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="card rounded-0">
                        <img src="https://imgs.search.brave.com/V7tC_5ORMMacZDQtcbzbwN2mquEYa0I-gSYJjkSvTqw/rs:fit:860:0:0/g:ce/aHR0cHM6Ly93d3cu/dGhlY29sbGVjdGlv/bnNob3AuY29tL0lt/YWdlX1Jlc2l6ZV9N/ZWRpdW0uYXNwP01p/c2NJbWFnZT1LV0FM/STYz" class="card-img rounded-0" alt="Image 7">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h2 class="card-title text-black">Art and Collectibles</h2>
                        </div>
                    </div>
                </div>
                <!-- Card 8 -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="card rounded-0">
                        <img src="https://imgs.search.brave.com/ON1vurTdGh56IK5aY68znzUy-ZPIjCJ-K6x4purq71E/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tYWx3/YXJ3aWNrb25ib29r/cy5jb20vd3AtY29u/dGVudC91cGxvYWRz/LzIwMjMvMDkvUml2/ZXItU3Bpcml0LWJv/b2stY292ZXIuanBl/Zw" class="card-img rounded-0" alt="Image 8">
                        <div class="card-img-overlay d-flex align-items-end">
                            <h2 class="card-title text-black">Books</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid position-relative p-0" style="height: 700px;">
    <video class="w-100 h-100" autoplay muted loop style="object-fit: cover;">
        <source src="static/images/Handtools.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="position-absolute top-50 start-50 translate-middle text-white">
        <h1 class="m-0 text-center">Discover the difference of African artistry blended with creativity.</h1>
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

    <!-- <section id="features">
    <div class="container px-5">
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
                    padding-top: 100%;
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
    </section> -->



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
    <div class="container my-5 p-5">
        <h2 class="text-center">Why Wakazi?</h2>
        <div class="row">
            <div class="col-12 col-md-4">
                <h4>Sustaiability is the core of our brand.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-12 col-md-4">
                <h4>Premium quality without bargain.</h4>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="col-12 col-md-4">
                <h4>Lifetime guaranteed warranty.</h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>
    </div>

        <!-- <section id="download" class="bg-light">
    <div class="container px-5 py-5">
        <h2 class="text-center text-purple font-alt mb-4" style="color: black;">Get the app now!</h2>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="static/images/google-play-badge.svg" alt="Download on Google Play" /></a>
            <a href="#!"><img class="app-badge" src="static/images/app-store-badge.svg" alt="Download on App Store" /></a>
        </div>
    </div>
    </section> -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


<?php
include("screens/footer/footer.php");
?>