<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session at the beginning of the script

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

// require ('../../__config/app/config.php');

// $query = "SELECT p.ProductID, p.ProductName, c.CategoryName 
//           FROM Products p 
//           JOIN Categories c ON p.CategoryID = c.CategoryID 
//           WHERE p.is_featured = TRUE;";  // Make sure your tables and columns are correctly named

// $result = $mysqli->query($query);

// $featuredProducts = [];
// $productsByCategory = [];

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $featuredProducts[] = $row;
//         $productsByCategory[$row['category_name']][] = $row;  // Organize products by category
//     }
// } else {
//     echo "";
// }

// Close result set
// $result->close();
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
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
    <!-- CSS files loading here -->
    <!-- <link rel="stylesheet" href="../update_wakazi/ -->
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
            /* Reduced padding to bring items closer */
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
            /* Pulls the second navbar up closer to the first */
        }

        .content {
            min-height: calc(100vh - 100px);
            /* Adjust based on footer height */
            padding: 20px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            transition: transform 0.3s ease;
        }

        .footer.hidden {
            transform: translateY(100%);
        }
    </style>
</head>

<body id="page-top">
    <header class="header fixed-top">
        <nav class="nav navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <!-- Dropdown for mobile and other small devices -->
                <div class="dropdown">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="menu-toggle1" onclick="toggleMenu()">
                                        <div class="dash"></div>
                                        <div class="dash"></div>
                                        <div class="dash"></div>
                                    </div>
                                </a> -->
                                <div class="menu-toggle1" onclick="toggleMenu()">
                                    <div class="dash"></div>
                                    <div class="dash"></div>
                                    <div class="dash"></div>
                                </div>
                                <ul class="dropdown-content dropdown-menu" id="dropdownContent" aria-labelledby="navbarDropdownMenuLink">
                                    <img src="../../static/images/WhatsApp_Image_2024-02-28_at_15.48.15-removebg-preview.png" alt="Wakazi" id="dropdown-logo">
                                    <span class="close-button" onclick="toggleDropdown()">&times;</span>
                                    <hr />
                                    <a class="dropdown-item" href="#">Jewellery</a>
                                    <a class="dropdown-item" href="#">Weddings</a>
                                    <a class="dropdown-item" href="#">Clothings</a>
                                    <a class="dropdown-item" href="#">Accessories</a>
                                    <a class="dropdown-item" href="#">Pet supplies</a>
                                    <a class="dropdown-item" href="#">Home and decor</a>
                                    <a class="dropdown-item" href="#">Bags and purses</a>
                                    <a class="dropdown-item" href="#">Bath and beauty</a>
                                    <a class="dropdown-item" href="#">Art and collectibles</a>
                                    <a class="dropdown-item" href="#">Baby, Gifts and Shoes</a>
                                    <a class="dropdown-item" href="#">Craft supplies & tools</a>
                                    <a class="dropdown-item" href="#">Books, Movies and Music</a>
                                    <a class="dropdown-item" href="#">Paper and party supplies</a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
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
                        <a href="#" class="nav-link">
                            <i class="bi bi-cart4" style="padding: 2px;"></i> Cart
                        </a>
                        <!-- Display user info and logout link -->
                        <a href="" class="nav-link" id="user-info">
                            <i class="bi bi-person-check"></i> <?= $_SESSION['email']; ?>
                        </a>
                        <a href="../../__logout/__logout.php" class="nav-link">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    <?php else : ?>
                        <!-- Links to show when the user is not logged in -->
                        <a href="../../__auth/__accounts/login.php" class="nav-link" id="popup-trigger">
                            <i class="bi bi-person-check"></i> Account
                        </a>
                        <ul id="popup-buttons" style="display: none;">
                            <li type="button" class="btn btn-primary"><a href="../../__auth/__accounts/signup.php" style="text-decoration: none; color: white;">Sign Up</a></li>
                            <li type="button" class="btn btn-secondary"><a href="../../__auth/__accounts/login.php" style="text-decoration: none; color: white;">Sign In</a></li>
                        </ul>
                        <br>
                        <a href="#" class="nav-link">
                            <i class="bi bi-patch-question-fill" style="font-size: 20px;"></i> Help
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <!-- Additional Navigation Row -->
        <div class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="container-fluid">
                <!-- Toggler button for mobile view -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item d-none d-lg-block" style="margin-right: 60px;"><a class="nav-link" href="../../index.php">Home</a></li>
                        <li class="nav-item d-none d-lg-block" style="margin-right: 60px;"><a class="nav-link" href="">Products</a></li>
                        <li class="nav-item d-none d-lg-block" style="margin-right: 60px;"><a class="nav-link" href="">Collections</a></li>
                        <li class="nav-item d-none d-lg-block" style="margin-right: 60px;"><a class="nav-link" href="">Features</a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="../../blog/index.php">Blog</a></li>
                        <li class="nav-item dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="index.php">Home</a></li>
                                <li><a class="dropdown-item" href="">Products</a></li>
                                <li><a class="dropdown-item" href="">Collections</a></li>
                                <li><a class="dropdown-item" href="">Features</a></li>
                                <li><a class="dropdown-item" href="../../blog/index.php">Blog</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </header>
    <script>
        // Toggle visibility of collection's dropdown menu
        function toggleMenu() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display === 'block' ? dropdownContent.style.display = 'none' : dropdownContent.style.display = 'block';
        }
        //Hide visibility of collection's dropdown when "x" is clicked
        document.addEventListener("click", function(event) {
            let dropdown = document.querySelector(".dropdown");
            let dropdownContent = dropdown.querySelector(".dropdown-content");
            let dropdownButton = dropdown.querySelector("button");
            let closeButton = dropdown.querySelector(".close-button");

            let isClickedInsideDropdown = dropdown.contains(event.target);

            if (!isClickedInsideDropdown) {
                dropdownContent.style.display = "none";
            }
        });

        function toggleDropdown() {
            let dropDownContent = document.getElementById("dropdownContent");
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
        }


        // Get the account link and the popup buttons
        const accountLink = document.getElementById('popup-trigger');
        const popupButtons = document.getElementById('popup-buttons');

        // Add click event listener to the account link
        accountLink.addEventListener('click', function(event) {
            // Prevent the default behavior of the link
            event.preventDefault();
            // Toggle the visibility of the popup buttons
            if (popupButtons.style.display === 'none') {
                popupButtons.style.display = 'block';
            } else {
                popupButtons.style.display = 'none';
            }
        });

        // Add click event listener to the document to handle clicks outside of the buttons
        document.addEventListener('click', function(event) {
            const target = event.target;
            // Check if the click target is outside of the popup buttons and the account link
            if (target !== popupButtons && target !== accountLink) {
                // Hide the popup buttons if they are currently visible
                if (popupButtons.style.display === 'block') {
                    popupButtons.style.display = 'none';
                }
            }
        });
    </script>
