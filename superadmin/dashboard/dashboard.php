<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session at the beginning
include('check_products.php'); // Include after session_start()

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    echo "<script>alert('You are not logged in. Please log in to continue.');
    window.location.href = '../index.php'; // Redirect to the login page</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Super Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Artisans | Wakazi</h3>
                </a>
                <!-- User Display Section -->
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="" alt="User" style="width: 40px; height: 40px;">
                    </div>



                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['name']; ?></h6> <!-- Display username from session -->
                        <!-- <span><?php echo $_SESSION['role']; ?></span> -->
                    </div>
                </div>

                <!-- Sidebar Navigation -->
                <div class="navbar-nav w-100">
                    <a href="dashboard.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <?php if ($_SESSION['role'] == 'admin') : ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-box-open me-2"></i>Products</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="manage_products.html" class="dropdown-item">Manage Products</a>
                                <a href="add_product.html" class="dropdown-item">Add Product</a>
                            </div>
                        </div>
                    <?php endif; ?>


                    <a href="orders.html" class="nav-item nav-link"><i class="fa fa-shopping-cart me-2"></i>Orders</a>

                    <a href="account.html" class="nav-item nav-link"><i class="fa fa-user-circle me-2"></i>Manage Account</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="" class="dropdown-item">Manage Products</a>
                            <a href="" class="dropdown-item">Add products</a>

                        </div>
                    </div>
                </div>

            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">

            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <!-- Notifications for pending product approvals -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifications</span>
                            <?php if ($pendingProducts['pending_count'] > 0) : ?>
                                <span class="badge bg-danger"><?= $pendingProducts['pending_count'] ?></span>
                            <?php endif; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <?php if ($pendingProducts['pending_count'] > 0) : ?>
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Pending products to approve</h6>
                                    <small><?= $pendingProducts['pending_count'] ?> pending approval</small>
                                </a>
                                <hr class="dropdown-divider">
                            <?php else : ?>
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">No pending products</h6>
                                </a>
                            <?php endif; ?>
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <!-- Existing code for messages and user dropdowns -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <!-- Drop-down menu items for messages -->
                    </div>

                    <div class="navbar-nav align-items-center ms-auto">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex">
                                    <h6 class="mb-0"><?php echo $_SESSION['name']; ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                <a href="profile.php" class="dropdown-item">My Profile</a>
                                <a href="#" class="dropdown-item">Settings</a>
                                <a href="../../__logout/__logout.php" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>



            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php

                        // Fetch products from ArtisanProducts table where ApprovalStatus is 'pending'
                        $query = "SELECT * FROM ArtisanProducts WHERE ApprovalStatus = 'pending'";
                        $result = $mysqli->query($query);

                        echo "<h2>Artisan Products (Pending Approval)</h2>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead><tr><th>Product ID</th><th>Artisan ID</th><th>Product Name</th><th>Supplier ID</th><th>Category ID</th><th>Unit</th><th>Price</th><th>Action</th></tr></thead>";
                        echo "<tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['ProductID']}</td>";
                            echo "<td>{$row['artisan_id']}</td>";
                            echo "<td>{$row['ProductName']}</td>";
                            echo "<td>{$row['SupplierID']}</td>";
                            echo "<td>{$row['CategoryID']}</td>";
                            echo "<td>{$row['Unit']}</td>";
                            echo "<td>{$row['Price']}</td>";
                            echo "<td><a href='approve_product.php?product_id={$row['ProductID']}' class='btn btn-success'>Approve</a></td>";
                            echo "</tr>";
                        }

                        echo "</tbody></table></div>";
                        ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        // Fetch products from ArtisanProducts table where ApprovalStatus is 'approved'
                        $query = "SELECT * FROM ArtisanProducts WHERE ApprovalStatus = 'approved'";
                        $result = $mysqli->query($query);

                        echo "<h2>Artisan Products Approved</h2>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead><tr><th>Product ID</th><th>Artisan ID</th><th>Product Name</th><th>Supplier ID</th><th>Category ID</th><th>Unit</th><th>Price</th><th>Action</th></tr></thead>";
                        echo "<tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['ProductID']}</td>";
                            echo "<td>{$row['artisan_id']}</td>";
                            echo "<td>{$row['ProductName']}</td>";
                            echo "<td>{$row['SupplierID']}</td>";
                            echo "<td>{$row['CategoryID']}</td>";
                            echo "<td>{$row['Unit']}</td>";
                            echo "<td>{$row['Price']}</td>";
                            echo "<td><a href='edit_product.php?product_id={$row['ProductID']}' class='btn btn-warning'>Edit</a></td>";
                            echo "</tr>";
                        }

                        echo "</tbody></table></div>";
                        ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        // Fetch products from Products table
                        $query = "SELECT * FROM Products";
                        $result = $mysqli->query($query);

                        echo "<h2>All Products</h2>";
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<thead><tr><th>Product ID</th><th>Product Name</th><th>Supplier ID</th><th>Category ID</th><th>Unit</th><th>Price</th><th>Edit</th><th>Delete</th></tr></thead>";
                        echo "<tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['ProductID']}</td>";
                            echo "<td>{$row['ProductName']}</td>";
                            echo "<td>{$row['SupplierID']}</td>";
                            echo "<td>{$row['CategoryID']}</td>";
                            echo "<td>{$row['Unit']}</td>";
                            echo "<td>{$row['Price']}</td>";
                            echo "<td><a href='edit_product.php?product_id={$row['ProductID']}' class='btn btn-info'>Edit</a></td>";
                            echo "<td><a href='delete_product.php?product_id={$row['ProductID']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a></td>";
                            echo "</tr>";
                        }

                        echo "</tbody></table></div>";
                        $mysqli->close();
                        ?>
                    </div>
                </div>
            </div>





            <?php

            // Fetch all users from the database
            $query = "SELECT UserID, Username, Email FROM Users";
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                echo "<div class='container pt-4 px-4'>
            <div class='row'>
                <div class='col-xl-12'>
                    <div class='bg-light rounded p-4'>
                        <div class='table-responsive'>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th>UserID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                <td>{$row['UserID']}</td>
                <td>{$row['Username']}</td>
                <td>{$row['Email']}</td>
                <td>
                    <a href='edit_user.php?userid={$row['UserID']}' class='btn btn-success'>Edit</a>
                    <a href='delete_user.php?userid={$row['UserID']}' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                </td>
              </tr>";
                }

                echo "          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>";
            } else {
                echo "No users found.";
            }

            $mysqli->close();
            ?>



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            </br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>