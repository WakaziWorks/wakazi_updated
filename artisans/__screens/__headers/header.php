<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/bootstrap-login-form.min.css" />
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
                        <!-- Links to show when the user is not logged in -->
                        <a href="../../_auth/_accounts/login.php" class="nav-link account-nav-link" id="popup-trigger">
                            <i class="bi bi-person-check"></i> Account
                        </a>
                        <ul id="popup-buttons" style="display: none; list-style: none;">
                            <li type="button" class="btn" style="background: #ff00ff; width: 100%; margin-bottom: 5px;"><a href="../../auth/accounts/signup.php" style="text-decoration: none; color: white; padding: 5px;">Sign Up</a></li>
                            <li type="button" class="btn" style="background: #ff00ff; width: 100%;"><a href="../../auth/accounts/login.php" style="text-decoration: none; color: white; padding: 5px;">Sign In</a></li>
                            <hr />
                            <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-person-check" style="color: #000;"></i> My Account</a></li>
                            <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-box2-heart" style="color: #000; font-size: 20px;"></i></i> Orders</a></li>
                            <li style="text-align: left; margin-bottom: 7px;"><a href="#" style="text-decoration: none; color: #000;"><i class="bi bi-chat-left-heart" style="color: #000; font-size: 20px;"></i></i> Saved items</a></li>
                        </ul>
                        <script>
                            // Get the account link and the popup buttons
                            const accountLink = document.getElementById('popup-trigger');
                            const popupButtons = document.getElementById('popup-buttons');
<body>

  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }
    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>