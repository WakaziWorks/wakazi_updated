<?php
include("../__screens/__headers/header.php");
require ("../../__config/app/config.php");
?>
<!-- Jewellery Page -->
<div class="container">
    <!-- Jewellery details -->
    <div class="row">
        <?php
        // Start session (if not already started)
      
        
        // Function to get user's email from session data
        function getUserEmail() {
            // Check if user is logged in (you might have your own method for this)
            if (isset($_SESSION['user_email'])) {
                // Return user's email from session data
                return $_SESSION['user_email'];
            } else {
                // Return null or handle the case where user is not logged in
                return null;
            }
        }
        
        // Example usage:
        $userEmail = getUserEmail();
        if ($userEmail) {
            echo "User's email: " . $userEmail;
        } else {
            echo "User is not logged in.";
        }
        
        
        // Fetch jewellery products from the database
        $sql = "SELECT * FROM products WHERE category = 'jewellery'";
        $result = $mysqli->query($sql);

        // Check for errors
        if (!$result) {
            // If there's an error, display an error message
            echo "Error: " . $mysqli->error;
        } elseif ($result->num_rows == 0) {
            // If no products are found, display a message
            echo "No jewellery products found.";
        } else {
            // Display jewellery products
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="' . $row["image_url"] . '" class="card-img-top" alt="' . $row["name"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                echo '<p class="card-text">' . $row["description"] . '</p>';
                echo '<button class="btn btn-primary" onclick="addToCart(' . $row["id"] . ')">Add to Cart</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }

        // Close database connection
        $mysqli->close();
        ?>
    </div>
</div>


<script>
    function addToCart(product) {
        // Check if user is logged in and get user's email (pseudo code)
        var userEmail = getUserEmail(); // Implement this function

        // If user is logged in, update cart table with product info
        if (userEmail) {
            // AJAX request to update cart table with product info and user's email
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Cart updated successfully
                    console.log("Product added to cart for user: " + userEmail);
                }
            };
            var data = JSON.stringify({
                email: userEmail,
                product: product
            });
            xhr.send(data);
        } else {
            // User is not logged in, handle accordingly (redirect to login page, show message, etc.)
            console.log("User is not logged in");
            // You can implement the logic to handle this case based on your requirements
        }
    }
</script>