<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// require 'cust.php';
// Check if the user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
// Define your cart array in session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
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

if (isset($_SESSION['flash'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['flash'] . '</div>';
    unset($_SESSION['flash']); // Remove the flash message after displaying it
}

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            /* Full width */
            margin-bottom: 0;
            /* Remove any margin below the alert */
            border-radius: 0;
            /* Optional: removes border radius for a full-width flat look */
            position: fixed;
            /* Fixed at the top */
            top: 0;
            /* Top position 0 */
            left: 0;
            /* Align left */
            z-index: 1050;
            /* High z-index to overlay on other content */
            color: #fff;
            /* White text color */
        }

        .alert-success {
            background-color: #155724;
            /* Dark green background */
        }

        .alert-dismissible .btn-close {
            color: #fff;
            /* Ensures close button is visible against dark background */
        }
    </style>
</head>

<body id="page-top">
    <div id="alert-placeholder"></div>

    <div class="container-fluid">
        <header class="header ">
            <nav class="nav navbar navbar-expand-lg " style="margin: 0; padding: 0; display: flex; flex-direction: column;">
                <div class="container-fluid" style="margin-bottom: 0">
                    <!-- Dropdown for mobile and other small devices -->
                    <div class="dropdown">
                        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="dropdown">
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
                                        <!-- <a class="dropdown-item" href="#">Weddings</a> -->
                                        <!-- <a class="dropdown-item" href="#">Pet supplies</a> -->
                                        <a class="dropdown-item" href="#">Crafted Bags</a>
                                        <a class="dropdown-item" href="#">Home Decors</a>
                                        <a class="dropdown-item" href="#">Fashion Wears</a>
                                        <!-- <a class="dropdown-item" href="#">Bath and beauty</a> -->
                                        <a class="dropdown-item" href="#">Art & Collectibles</a>
                                        <!-- <a class="dropdown-item" href="#">Baby, Gifts and Shoes</a> -->
                                        <a class="dropdown-item" href="#">Fashion Accessories</a>
                                        <a class="dropdown-item" href="#">Craft supplies & Tools</a>
                                        <!-- <a class="dropdown-item" href="#">Books, Movies and Music</a> -->
                                        <!-- <a class="dropdown-item" href="#">Paper and party supplies</a> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="navbar-brand fw-bold" id="logo" href="#" style="margin-right: 100px;">
                        <img src="../../static/images/WhatsApp_Image_2024-02-28_at_15.48.15-removebg-preview.png" height="90px" width="110px">
                    </a>
                    <!-- Search Section -->
                    <div class="mx-auto">
                        <form class="" role="search" style="width: 50em;">
                            <div class="position-relative">
                                <input class="form-control" type="search" placeholder="Search for anything" aria-label="Search" style="border: 2px solid #000; border-radius: 33px;">
                                <span class="btn">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
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
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="../../__logout/__logout.php">Logout</a></li>
                                </ul>
                            </div>
                        <?php else : ?>
                            <!-- Links to show when the user is not logged in -->
                            <a href="../../auth/accounts/login.php" class="nav-link account-nav-link" id="popup-trigger">
                                <i class="bi bi-person-circle"></i> Account
                            </a>
                            <ul id="popup-buttons" style="display: none; list-style: none;">
                                <li type="button" class="btn" style="background: #c837d1; width: 100%; margin-bottom: 7px"><a href="../../auth/accounts/signup.php" style="text-decoration: none; color: white; padding: 5px;">Sign Up</a></li>
                                <li type="button" class="btn" style="background: #c837d1; width: 100%;"><a href="../../auth/accounts/login.php" style="text-decoration: none; color: white; padding: 5px;">Sign In</a></li>
                                <hr />
                                <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-person-check"></i> My Account</a></li>
                                <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-box2-heart"></i></i> Orders</a></li>
                                <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-chat-left-heart"></i></i> Saved items</a></li>
                            </ul>
                        <?php endif; ?>
                        <a href="#" class="nav-link account-nav-link">
                            <i class="bi bi-question-circle"></i> Help
                        </a>
                        <div class="d-flex">
                            <a class="nav-link" href="../../cart/index.php" id="cart">
                                <i class="fa fa-shopping-cart"></i> Cart
                                <span class="badge bg-primary" id="cart-count">
                                <?php echo count($products); ?>
                                </span>
                            </a>
                        </div>
                    </div>
                    <script>
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
                    </script>
                </div>
                <!-- Additional Navigation Row -->
                <div class="navbar navbar-expand-lg" style="margin-top: -30px;">
                    <div class="">
                        <!-- Toggler button for mobile view -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- <div class="" id="navbarNavDropdown">
                            <a class="nav-link" href="../../index.php">Home</a>
                            <li class="nav-item" style="margin-right: 90px;"><a class="nav-link" href="../../products/index.php">Products</a></li>
                            <li class="nav-item d-none d-lg-block" style="margin-right: 90px;"><a class="nav-link" href="../../collection/index.php">Collections</a></li>
                            <li class="nav-item d-none d-lg-block" style="margin-right: 90px;"><a class="nav-link" href="../../features/index.php">Features</a></li>
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
                        </div> -->
                        <div class="navbar-nav navigation-links" id="navbarNavDropdown">
                            <a class="nav-link" href="../../index.php"><button>Home</button></a>
                            <a class="nav-link" href="../../products/index.php"><button>Products</button></a>
                            <a class="nav-link" href="../../collection/index.php"><button>Collection</button></a>
                            <a class="nav-link" href="../../features/index.php"><button>Features</button></a>
                            <a class="nav-link" href="../../blog/index.php"><button>Blog</button></a>
                            <div class="nav-item" style="display: none;">
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
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>


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