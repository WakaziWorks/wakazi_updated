<?php
include("../__screens/__headers/header.php");
?>

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
                                    <!-- <span class="close-button" id="dropdownContent" onclick="toggleDropdown()">&times;</span> -->
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
                        <button class="btn btn-outline-success text-white" style="background-color: #6D008FDF;" type="submit">Search</button>
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
                        <li class="nav-item d-none d-lg-block" ><a class="nav-link" href="">Blog</a></li>
                        <li class="nav-item dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="index.php">Home</a></li>
                                <li><a class="dropdown-item" href="">Products</a></li>
                                <li><a class="dropdown-item" href="">Collections</a></li>
                                <li><a class="dropdown-item" href="">Features</a></li>
                                <li><a class="dropdown-item" href="">Blog</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </header>
    <div class="blog">
        <div class="row row-cols-auto d-flex">
            <h4 class="text-secondary">Blog:</h4>
            <div class="col mb-3 cursor-pointer" role="button">
                <h5>All</h5>
            </div>
            <div class="col mb-3 cursor-pointer" role="button">
                <h5>News</h5>
            </div>
        </div>
        <div class="row" style="margin-left: 9em;">
            <div class="col col-md-6 w-50 text-center">
                <div>
                    <img class="h-50 rounded-5" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.gX7Qu9VkAn64kLmVpdYOpQAAAA%26pid%3DApi&f=1&ipt=a7b5129beb34ae3d07081d224105d6f354ca8fda54878ae855069a7ea523569c&ipo=images">
                </div>
                <div class="text-start text-dark">
                    An outstanding book that will no doubt remain a classic for a long time.  48 Laws of Power 
                    details the laws for attaining power in life, business, and more, and gives historical example
                     of each law in practice, as well as examples of those who do not respect these laws.
                     A book I will continue to go back and reference.  Those who are cynical may see some of the laws
                     as manipulative, and some are.<a href="#">continue.</a>
                </div>
            </div>
            <div class="col col-md-6 w-50 text-center">
                <div>
                    <img class="h-50 rounded-5" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.gX7Qu9VkAn64kLmVpdYOpQAAAA%26pid%3DApi&f=1&ipt=a7b5129beb34ae3d07081d224105d6f354ca8fda54878ae855069a7ea523569c&ipo=images">
                </div>
                <div class="text-start text-dark">
                    An outstanding book that will no doubt remain a classic for a long time.  48 Laws of Power 
                    details the laws for attaining power in life, business, and more, and gives historical example
                     of each law in practice, as well as examples of those who do not respect these laws.
                     A book I will continue to go back and reference.  Those who are cynical may see some of the laws
                     as manipulative, and some are. <a href="1200">continue...</a>
                </div>
            </div>
        </div>
        
    </div>
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
        function toggleDropdown(){
            let dropDownContent = document.getElementById("dropdownContent");
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none": "block";
        }
    </script>
</body>
</html>