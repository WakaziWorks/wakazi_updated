<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session at the beginning of the script

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wakazi Works</title>
    <link rel="icon" type="image/x-icon" href="../../static/assets/favicon.ico" />

    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
    
    <!-- Custom styles -->
    <link rel="stylesheet" href="../../static/css/styles.css">
    
    <style>
        .navbar-nav {
            margin-bottom: 0;
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

        /* Reducing space specifically between the search section and the navigation row */
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
        .account-nav-link{
            position: relative;
            color: #000;
            font-size: large;
        }
        .account-nav-link:hover + #popup-buttons {
            display: block;
        }
        .account-nav-link .bi{
            color: inherit;
        }
        .account-nav-link:hover{
            color: #ff00ff;
        }
    </style>
</head>

<body id="page-top">
    <header class="header fixed-top">
        <nav class="nav navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                
                <a class="navbar-brand fw-bold" id="logo" href="#">
                    <img src="../../static/images/WhatsApp_Image_2024-02-28_at_15.48.15-removebg-preview.png" height="90px" width="110px">
                </a>
                <!-- Search Section -->
                <div class="mx-auto" style="width: 50%;">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="I am looking for..." aria-label="Search">
                        <button class="btn btn-outline-success text-white" style="background-color: #ff00ff; border: none; outline: none;" type="submit">Search</button>
                    </form>
                </div>

                <!-- Icons for cart, account, and help -->
                <div class="d-flex accounts-nav">
                    <?php if ($isLoggedIn) : ?>
                        <!-- User dropdown menu -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-check"></i> <?= $_SESSION['name']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarUserDropdown">
                                <li><a class="dropdown-item" href="../../auth/accounts/my_profile.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="../../auth/accounts/my_orders.php">My Orders</a></li>
                                <li><a class="dropdown-item" href="../../auth/accounts/my_saved_items.php">Saved Items</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../../__logout/__logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php else : ?>
                        <!-- Links to show when the user is not logged in -->
                        <a href="../../_auth/_accounts/login.php" class="nav-link account-nav-link" id="popup-trigger">
                            <i class="bi bi-person-circle"></i> Account
                        </a>
                        <ul id="popup-buttons" style="display: none; list-style: none;">
                            <li type="button" class="btn" style="background: #c837d1; width: 100%; margin-bottom: 7px"><a href="../../auth/accounts/signup.php" style="text-decoration: none; color: white; padding: 5px;">Sign Up</a></li>
                            <li type="button" class="btn" style="background: #c837d1; width: 100%;"><a href="../../auth/accounts/login.php" style="text-decoration: none; color: white; padding: 5px;">Sign In</a></li>
                            <hr />
                            <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-person-check"></i> My Account</a></li>
                            <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-box2-heart"></i> Orders</a></li>
                            <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-chat-left-heart"></i> Saved items</a></li>
                        </ul>
                    <?php endif; ?>
                    <a href="#" class="nav-link account-nav-link">
                        <i class="bi bi-question-circle"></i> Help
                    </a>
                    <a href="#" class="nav-link account-nav-link">
                        <i class="bi bi-cart3"></i> Cart
                    </a>
                </div>
            </div>
            <!-- Additional Navigation Row -->
            <div class="navbar navbar-expand-lg" style="margin-top: -30px;">
                <div class="">
                    <!-- Toggler button for mobile view -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../products/index.php">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../collection/index.php">Collection</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../features/index.php">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../blog/index.php">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <script>
        // Toggle visibility of collection's dropdown menu
        function toggleMenu() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display === 'block' ? dropdownContent.style.display = 'none' : dropdownContent.style.display = 'block';
            content.classList.toggle('blur');
        }
        
        //Hide visibility of collection's dropdown when "x" is clicked
        document.addEventListener("click", function(event) {
            let dropdown = document.querySelector(".dropdown");
            let dropdownContent = dropdown.querySelector(".dropdown-content");
            let isClickedInsideDropdown = dropdown.contains(event.target);

            if (!isClickedInsideDropdown) {
                dropdownContent.style.display = "none";
            }
        });

        function toggleDropdown() {
            let dropDownContent = document.getElementById("dropdownContent");
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
        }
        
        // Add click event listener to the document to handle clicks outside of the buttons
        document.addEventListener('click', function(event) {
            const target = event.target;
            const popupButtons = document.getElementById('popup-buttons');
            const accountLink = document.getElementById('popup-trigger');
            
            // Check if the click target is outside of the popup buttons and the account link
            if (target !== popupButtons && target !== accountLink) {
                // Hide the popup buttons if they are currently visible
                if (popupButtons.style.display === 'block') {
                    popupButtons.style.display = 'none';
                }
            }
        });
    </script>
