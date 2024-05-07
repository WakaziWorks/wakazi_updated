<?php
require "cust.php";
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
    <link rel="icon" type="image/x-icon" href="../../static/assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        /* Custom styles here */
        body {
            font-family: 'Verdana', sans-serif;
            /* Set Verdana as the font for the entire website */
        }

        .top-background {
            background-color: #C41CD0;
            padding: 2rem;
            text-align: center;
        }

        /* .collections-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            padding: 2rem;
        }

        .collection-item {
            text-align: center;
        }

        .collection-item img {
            border-radius: 15px;
            max-width: 100%;
            height: auto;
        } */

        .advanced-search {
            text-align: center;
            padding: 2rem;

            border: 1px solid grey;
        }

        .bottom {
            background-color: #f8f9fa;
            padding: 2rem;
            text-align: center;
        }


        .navbar-nav {
            margin-bottom: 0;
        }

        /* Collections */
        .collection-container {
            width: 98%;
            height: 100%;
            margin-top: 30px;
            margin-left: 30px;
            color: var(--bs-purple);
            display: flex;
            flex-direction: column;
            background: rgb(245, 236, 250);
            background: radial-gradient(circle, rgba(245, 236, 250, 1) 0%, rgba(206, 152, 244, 1) 100%);
        }

        @media only screen and (max-width: 768px) {
            .collection-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }

            .collection-col {
                text-align: center;
            }
        }

        .collection-container h1 {
            color: #000;
            font-weight: lighter;
            text-align: center;
            margin-top: 20px;
        }

        .collection-col {
            background-color: #f7d3f7;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.4);
            margin-bottom: 20px;
            width: 100%;
            height: 400px;
            cursor: pointer;
        }

        .collection-col h4 {
            margin: 10px 10px;
            color: black;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: normal;
        }

        .collection-col h4:hover {
            color: purple;
        }

        .collection-col img {
            width: 100%;
            height: 80%;
        }

        #navbar-nav a {
            color: #ff00ff;
        }

        #navbar-nav a:hover {
            color: #fff;
            background: #ff00ff;
            border-radius: 15px;
        }

        .navbar-light .navbar-nav .nav-link {
            padding: 8px 10px;
        }

        .navbar {
            padding-top: 0;
            padding-bottom: 0;
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        .navbar-expand-lg+.navbar {
            margin-top: -10px;
        }

        #popup-buttons {
            padding: 0.5em;
            position: absolute;
            top: 55%;
            right: 14%;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            z-index: 100;
        }

        #alert-placeholder .alert {
            width: 100%;
            margin-bottom: 0;
            border-radius: 0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1050;
            color: #fff;
        }

        .alert-success {
            background-color: #155724;
        }

        .alert-dismissible .btn-close {
            color: #fff;
        }

        .navbar-toggler-icon {
            background-color: transparent !important;
        }

        #color button :hover,
        #color :focus,
        #color button :active {
            background-color: transparent !important;
        }

        #color a :focus {
            background-color: white !important;
        }

        .navbar {
            background-color: #f8f9fa;
            /* Light grey background */
            padding: 10px 0;
            text-align: center;
        }

        .nav-link {
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 20px;
            /* Rounded corners */
            text-decoration: none;
            color: #6c757d;
            /* Link color */
            background-color: transparent;
            /* Transparent background */
            transition: background-color 0.3s;
            /* Smooth transition for hover effect */
        }

        .nav-link:hover {
            background-color: #6f42c1;
            /* Purple background on hover */
            color: #ffffff;
            /* White text on hover */
        }
    </style>
</head>

<body>
    <div id="alert-placeholder"></div>

    <!-- ======= Header ======= -->
    <!-- ======= Header ======= -->

    <!-- End Top Bar -->
    <header class="header sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav" style="padding: 30px;">
                    <!-- Dropdown for Account -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="">Jewellery</a></li>

                            <li><a class="dropdown-item" href="../../products/index.php">Crafted Bags</a></li>
                            <li><a class="dropdown-item" href="../../products/index.php">Home Decors</a></li>

                            <li><a class="dropdown-item" href="../../products/index.php">Fashion Wears</a></li>
                            <li><a class="dropdown-item" href="../../products/index.php">Art and Collectibles</a></li>
                            <li><a class="dropdown-item" href="../../products/index.php">Fashion Accessories</a></li>
                            <li><a class="dropdown-item" href="../../products/index.php">Craft Steel</a></li>
                            <li><a class="dropdown-item" href="../../products/index.php">Crafted Bags</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Logo -->
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../static/images/WhatsApp_Image_2024-02-28_at_15.48.15-removebg-preview.png" height="90px" width="110px" alt="Logo">
                </a>

                <!-- Toggle Button for Small Screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Centered Search Bar -->
                <!-- <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-6 col-md-8 col-sm-12">
                            <form class="d-flex" style="background-color: transparent; width: 100%;">
                                <input class="form-control me-2" type="search" placeholder="Search for anything" aria-label="Search" style="border: 2px solid #000; border-radius: 33px; flex-grow: 1;">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent" style="float: right;">
                        <form class="d-flex" style="background-color: transparent; width: 100%;">
                            <div class="input-group">
                                <input class="form-control me-2" type="search" placeholder="Search for anything" aria-label="Search" style="border: 2px solid #000; border-radius: 70px; flex-grow: 1; width:50em;">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if ($isLoggedIn) : ?>
                    <!-- Right Navigation Links -->
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">


                        <ul class="navbar-nav" style="padding: 30px;">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person"></i> <?php $_SESSION['name']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                                    <li><a class="dropdown-item" href="#">My Orders</a></li>
                                    <li><a class="dropdown-item" href="#">Saved Items</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="../../__logout/__logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                <?php else : ?>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">



                        <ul class="navbar-nav">
                            <!-- Dropdown for Account -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="../../auth/accounts/login.php" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person"></i> Account
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="../../auth/accounts/signup.php" style="text-decoration: none; color: #c837d1; padding: 5px;">Sign Up</a></li>
                                    <hr />
                                    <li><a class="dropdown-item" href="../../auth/accounts/login.php" style="text-decoration: none; color: #c837d1; padding: 5px;">Sign In</a></li>
                                    <hr />

                                </ul>
                            </li>
                        <?php endif; ?>

                        <!-- Help Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-question-circle"></i> Help</a>
                        </li>

                        <!-- Cart -->
                        <li class="nav-item">
                            <a class="nav-link" href="../../cart/index.php">
                                <i class="fa fa-shopping-cart"></i> Cart
                                <span class="badge bg-primary" style="background-color: #48003E;" id="cart-count">
                                    <?php echo count($_SESSION['cart'] ?? []); ?>
                                </span>
                            </a>
                        </li>
                        </ul>
                    </div>



            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav" style="list-style: none; padding: 0;">
                    <li class="nav-item" style="display: inline;"><a class="nav-link" href="../../index.php">Home</a></li>
                    <li class="nav-item" style="display: inline;"><a class="nav-link" href="../../products/index.php">Products</a></li>
                    <li class="nav-item" style="display: inline;"><a class="nav-link" href="../../collection/index.php">Collection</a></li>
                    <li class="nav-item" style="display: inline;"><a class="nav-link" href="../../features/index.php">Features</a></li>
                    <li class="nav-item" style="display: inline;"><a class="nav-link" href="../../blog/index.php">Blog</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container-fluid">