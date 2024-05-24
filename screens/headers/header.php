<?php
require "cust.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wakazi</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      rel="stylesheet"
    />
    <style>
      .navbar {
        /* border-bottom: 1px solid #e0e0e0; */
        padding: 0.5rem 1rem;
      }
      .navbar-brand img {
        height: 40px;
        width: auto;
      }
      .navbar-brand {
        margin-left: 15px;
      }
      .search-bar {
        flex-grow: 1;
        padding: 0 15px;
        margin: 0 15px;
      }
      .search-bar input:focus,
      .search-bar button:focus {
        border: none;
        outline: 1px solid #c837d1;
        box-shadow: none;
      }
      .header-links {
        margin: 1rem 0;
        text-align: center;
      }
      .header-links a {
        margin: 0 1rem;
        color: #000;
        text-decoration: none;
        font-weight: bold;
        background-color: transparent;
        padding: 9px;
        border-radius: 30px;
      }
      .header-links a:hover {
        background-color: #c837d1;
        color: #000;
      }
      .nav-icons {
        margin-right: 35px;
      }
      .nav-item.dropdown .nav-link {
        margin-right: 35px;
      }
      .nav-link .fa-bars {
        font-size: 1.5rem;
      }
      .nav-item.dropdown .dropdown-toggle::after {
        color: #000;
      }
    </style>
  </head>
<body>
<div id="alert-placeholder"></div>

<header>
  <!-- Top Header Section -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!-- Categories Dropdown -->
      <div class="nav-item dropdown ml-3">
        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bars text-dark"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
          <a class="dropdown-item" href="#">Jewellery</a>
          <a class="dropdown-item" href="#">Craft steel</a>
          <a class="dropdown-item" href="#">Home decors</a>
          <a class="dropdown-item" href="#">Crafted bags</a>
          <a class="dropdown-item" href="#">Fashion wears</a>
          <a class="dropdown-item" href="#">Fashion accessories</a>
          <a class="dropdown-item" href="#">Art and collectibles</a>
        </div>
      </div>

      <!-- Logo -->
      <a class="navbar-brand" href="../../index.php"><img src="../../static/images/WhatsApp_Image_2024-02-28_at_15.48.15-removebg-preview.png" class="img-fluid" /></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <!-- Search Bar -->
        <div class="search-bar">
          <form class="form-inline" style="width: 100%;">
            <div class="input-group" style="width: 100%;">
              <input class="form-control" type="search" placeholder="Search for anything..." aria-label="Search" style="flex: 1;">
              <div class="input-group-append">
                <button class="btn" type="submit" style="background: #c837d1;">Search</button>
              </div>
            </div>
          </form>
        </div>

        <!-- Account, Cart and Help Icons -->
        <?php if ($isLoggedIn) : ?>
          <ul class="navbar-nav ml-auto nav-icons">
            <!-- Account Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['name']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="accountDropdown">
                <a class="dropdown-item" href="#">My Profile</a>
                <a class="dropdown-item" href="#">My Orders</a>
                <a class="dropdown-item" href="#">Saved Items</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../__logout/__logout.php">Logout</a>
              </div>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav ml-auto nav-icons">
            <!-- Account Dropdown -->
            <li class="nav-item dropdown me-1">
              <a
                class="nav-link dropdown-toggle text-dark"
                href="#"
                id="accountDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fas fa-user"></i> Account
              </a>
              <div class="dropdown-menu" aria-labelledby="accountDropdown">
                <a href="../../auth/accounts/login.php"><button class="dropdown-item" type="button">Sign In</button></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">My Account</a>
                <a class="dropdown-item" href="#">Orders</a>
              </div>
            </li>
          </ul>
        <?php endif; ?>
        <ul class="navbar-nav nav-icons">
            <!-- Cart -->
            <li class="nav-item me-2">
              <a class="nav-link text-dark" href="../../cart/index.php"
                ><i class="fas fa-shopping-cart"></i> 
                Cart
                <span class="badge bg-dark" id="cart-count">
                    <?php echo count($_SESSION['cart'] ?? []); ?>
                </span></a>
            </li>
            <!-- Help Link -->
            <li class="nav-item">
              <a class="nav-link text-dark" href="#"
                ><i class="fas fa-question-circle text-dark"></i> 
                    Help
                </a>
            </li>          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bottom Header Links -->
  <div class="header-links">
    <a href="../../index.php">Home</a>
    <a href="../../products/index.php">Products</a>
    <a href="../../collection/index.php">Collection</a>
    <a href="../../features/index.php">Features</a>
    <a href="../../blog/index.php">Blog</a>
    <a href="../../gallery/index.php">Gallery</a>
  </div>
</header>

<!-- Bootstrap and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
