
<?php
session_start(); // Start the session at the beginning of the script

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wakazi Works</title>
    <link rel="icon" type="image/x-icon" href="static/assets/favicon.ico" />

    <!-- Bootstrap icons-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!--<link href="css/styles.css" rel="stylesheet" />-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- CSS files loading here -->
    <!-- <link rel="stylesheet" href="../update_wakazi/ -->
    <link rel="stylesheet" href="../../static/css/styles.css">
    <style>
        .navbar-nav {
    margin-bottom: 0;
}

.navbar-light .navbar-nav .nav-link {
    padding: 8px 10px; /* Reduced padding to bring items closer */
}

.navbar {
    padding-top: 0;
    padding-bottom: 0;
}

.container-fluid {
    padding-left: 0;
    padding-right: 0;
}

/* Reducing space specifically between the search section and the navigation row */
.navbar-expand-lg + .navbar {
    margin-top: -10px; /* Pulls the second navbar up closer to the first */
}
</style>
</head>

<body id="page-top">

<header class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Dropdown for mobile and other small devices -->
            <div class="dropdown">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Jewellery</a>
                                <a class="dropdown-item" href="#">Bags & purses</a>
                                <a class="dropdown-item" href="#">Home & decor</a>
                                <a class="dropdown-item" href="#">Accessories</a>
                                <a class="dropdown-item" href="#">Art & collectibles</a>
                                <a class="dropdown-item" href="#">Craft supplies & tools</a>
                                <a class="dropdown-item" href="#">Books, Movies, Music</a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <a class="navbar-brand fw-bold" id="logo" href="#">
                <img src="static/images/WhatsApp_Image_2024-02-28_at_15.48.15-removebg-preview.png" height="90px" width="110px">
            </a>
            <!-- Search Section -->
            <div class="mx-auto" style="width: 50%;">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="I am looking for..." aria-label="Search">
                    <button class="btn btn-outline-success" style="background-color: purple;" type="submit">Search</button>
                </form>
            </div>
            <!-- Icons for cart, account, and help -->
            <div class="d-flex">
                <?php if ($isLoggedIn): ?>
                    <a href="#" class="nav-link">
                        <i class="bi bi-cart4"></i> Cart
                    </a>
                    <!-- Display user info and logout link -->
                    <a href="#" class="nav-link" id="user-info">
                        <i class="bi bi-person-check"></i> <?= $_SESSION['user_name']; ?>
                    </a>
                    <a href="logout.php" class="nav-link">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                <?php else: ?>
                    <!-- Links to show when the user is not logged in -->
                    <a href="../../__auth/__accounts/login.php" class="nav-link" id="popup-trigger">
                        <i class="bi bi-person-check"></i> Account
                    </a>
                    <br>
                    <a href="faq.php" class="nav-link">
                        <i class="bi bi-patch-question-fill"></i> Help
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
   <!-- Additional Navigation Row -->
<div class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Brand/logo if needed -->
        <!-- <a class="navbar-brand" href="#">Logo</a> -->

        <!-- Toggler button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation items -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('products') }}">Products</a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('collections') }}">Collections</a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('features') }}">Features</a></li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                
                <!-- Dropdown Menu for smaller screens -->
                <li class="nav-item dropdown d-lg-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="index.php">Home</a></li>
                        <li><a class="dropdown-item" href="index.html">Products</a></li>
                        <li><a class="dropdown-item" href="index.html">Collections</a></li>
                        <li><a class="dropdown-item" href="index.html">Features</a></li>
                        <li><a class="dropdown-item" href="index.html">Blog</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

</header>