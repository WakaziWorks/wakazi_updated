<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 

$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_SESSION['flash'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['flash'] . '</div>';
    unset($_SESSION['flash']); 
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
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <style>
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
    </style>
</head>

<body >
    <div id="alert-placeholder"></div>
    <div class="container">
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="../../static/images/WhatsApp_Image_2024-02-28_at_15.48.15-removebg-preview.png" height="90px" width="110px" alt="Logo">
                </a>

                <!-- Toggle Button for Small Screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Centered Search Bar -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <form class="d-flex" style="background-color: transparent;">
                        <input class="form-control me-2" type="search" placeholder="Search for anything" aria-label="Search" style="border: 2px solid #000; border-radius: 33px; width:max-content;">
                        <button class="btn btn-outline-pink" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>

                <!-- Right Navigation Links -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <!-- Dropdown for Account -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person"></i> Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">My Orders</a></li>
                                <li><a class="dropdown-item" href="#">Saved Items</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>

                        <!-- Help Link -->
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-question-circle"></i> Help</a>
                        </li>

                        <!-- Cart -->
                        <li class="nav-item">
                            <a class="nav-link" href="../../cart/index.php">
                                <i class="fa fa-shopping-cart"></i> Cart
                                <span class="badge bg-primary" style="background-color: #48003E;" id="cart-count">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>


    <script>
        function toggleMenu() {
            var dropdownContent = document.querySelector('.dropdown-content');
            dropdownContent.style.display === 'block' ? dropdownContent.style.display = 'none' : dropdownContent.style.display = 'block';
            content.classList.toggle('blur');
        }
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
        document.addEventListener('click', function(event) {
            const target = event.target;
            if (target !== popupButtons && target !== accountLink) {
                if (popupButtons.style.display === 'block') {
                    popupButtons.style.display = 'none';
                }
            }
        });
    </script>