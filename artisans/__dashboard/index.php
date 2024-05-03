<?php 
    require "../__auth/__config/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard | Artisans</title>
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
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Artisans | Wakazi</h3>
                </a>
                <!-- User Display Section -->
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo 'uploads/' . $_SESSION['profile_image']; ?>" alt="User" style="width: 40px; height: 40px;">
                    </div>
                    <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);
                    session_start();

                    if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
                        echo "<script>alert('You are not logged in. Please log in to continue.');
                        window.location.href = '../artisanapp/login.php'; // Redirect to the login page</script>";
                        exit;
                    }

                    ?>


                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['name']; ?></h6> <!-- Display username from session -->

                    </div>
                </div>

                <!-- Sidebar Navigation -->
                <div class="navbar-nav w-100">
                    <a href="dashboard.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-box-open me-2"></i>Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="manage_products.html" class="dropdown-item">Manage Products</a>
                            <a href="javascript:void(0);" onclick="showAddProductForm();" class="nav-item nav-link">
                                <i class="fa fa-plus-circle me-2"></i>Add Product
                            </a>
                        </div>
                    </div>



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
            <!-- Navbar Start -->
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
            </nav>
            <!-- Navbar End -->


            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <a href="add_product.php" class="text-decoration-none">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-plus-circle fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Add Product</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <a href="add_product.php" class="text-decoration-none">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-plus-circle fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Manage Products</p>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-sm-6 col-xl-3">
                        <a href="add_product.php" class="text-decoration-none">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-plus-circle fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Products</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <a href="add_product.php" class="text-decoration-none">
                            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                                <i class="fa fa-plus-circle fa-3x text-primary"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Order Details</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Add more cards for other functionalities if needed -->
            </div>





<!-- Add Product Form -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Add Product</h6>
        </div>
        <div class="container mt-5">
            <form method="post" action="add_product.php">
                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <input type="text" class="form-control" id="productName" name="productName" required>
                </div>
                <div class="form-group">
                    <label for="supplierID">Supplier ID:</label>
                    <input type="text" class="form-control" id="supplierID" name="supplierID" pattern="\d+" title="Please enter a numeric value">
                </div>
                <div class="form-group">
                    <label for="categoryID">Category:</label>
                    <select class="form-control" id="categoryID" name="categoryID" required>
                        <option value="">Select Category</option>
                        <?php
                      

                        // Query to fetch categories from the database
                        $query = "SELECT CategoryID, CategoryName FROM Categories";
                        $result = $mysqli->query($query);

                        // Check if categories exist
                        if ($result->num_rows > 0) {
                            // Loop through each category and create an option element
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['CategoryID'] . "'>" . $row['CategoryName'] . "</option>";
                            }
                        }
                        // Close the database connection
                        $mysqli->close();
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="unit">Unit:</label>
                    <input type="text" class="form-control" id="unit" name="unit">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <!-- Modal content here -->
</div>

<script>
    // jQuery script for edit product modal
    $('.edit-btn').click(function() {
        // Code to populate the modal with product details and show it
    });

    // AJAX request to handle product update
    $('#editProductForm').on('submit', function(e) {
        // Code to handle AJAX request for product update
    });

    // jQuery script to fetch and populate categories in add product form
    $(document).ready(function() {
        $.ajax({
            url: 'fetch_categories.php', // PHP script to fetch categories
            method: 'GET',
            success: function(response) {
                $('#categoryID').html(response); // Populate select options with categories
            }
        });
    });
</script>



            <!-- Edit Product Modal -->
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editProductForm">
                            <div class="modal-body">
                                <input type="hidden" id="editProductId" name="productId">
                                <div class="form-group">
                                    <label for="editProductName">Product Name:</label>
                                    <input type="text" class="form-control" id="editProductName" name="productName" required>
                                </div>
                                <div class="form-group">
                                    <label for="editPrice">Price:</label>
                                    <input type="text" class="form-control" id="editPrice" name="price" required>
                                </div>
                                <!-- Add other fields as necessary -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-12"> <!-- Full width for larger screens -->
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Product Overview</h6>
                                <a href="manage_products.php">Show All</a>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../__auth/__config/config.php';  // Adjust the path as necessary
                                    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
                                        echo "<script>alert('Please log in.'); window.location.href='login.php';</script>";
                                        exit;
                                    }

                                    $query = "SELECT ProductID, ProductName, Price, CategoryID, Unit, ApprovalStatus FROM ArtisanProducts WHERE artisan_id = ?";
                                    if ($stmt = $mysqli->prepare($query)) {
                                        $stmt->bind_param("i", $_SESSION['artisan_id']);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['ProductID']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['ProductName']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['Price']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['CategoryID']) . "</td>";  // Consider converting CategoryID to name if needed
                                            echo "<td>" . htmlspecialchars($row['Unit']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['ApprovalStatus']) . "</td>";
                                            echo "<td><a href='#' class='edit-btn' data-toggle='modal' data-target='#editProductModal' data-id='" . htmlspecialchars($row['ProductID']) . "' data-name='" . htmlspecialchars($row['ProductName']) . "' data-price='" . htmlspecialchars($row['Price']) . "'>Edit</a> | <a href='delete_product.php?id=" . htmlspecialchars($row['ProductID']) . "' onclick='return confirm(\"Are you sure?\");'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        $stmt->close();
                                    }
                                    $mysqli->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->




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