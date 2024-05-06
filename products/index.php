<?php
include("../screens/headers/header.php"); // Ensure the path is correct
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS for styling and components -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

        <div class="row">
            <?php
            include("../config/app/config.php");
            $query = "SELECT * FROM Products";
            $result = $mysqli->query($query);

            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                    <img src="placeholder.jpg" data-src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['image']); ?>" class="lazyload card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['ProductName']; ?></h5>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <a href="#" onclick="addToCart(<?php echo $row['ProductID']; ?>); return false;" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            $mysqli->close();
            ?>
        </div>
    </div>

    <script>
function addToCart(productId) {
    $.ajax({
        url: 'add_to_cart.php',
        type: 'POST',
        data: {product_id: productId},
        success: function(response) {
            // Assuming the response is the new count or a success message
            $('#cart-count').text(response.new_cart_count);
            showSuccessAlert('Product added to cart successfully!');
        },
        error: function() {
            showSuccessAlert('Failed to add product to cart.', false);
        }
    });
}

function showSuccessAlert(message, success = true) {
    var alertType = success ? 'alert-success' : 'alert-danger'; // alert-danger can be styled similarly if needed
    var alertHtml = '<div class="alert ' + alertType + ' alert-dismissible fade show" role="alert">' +
        message +
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
        '</div>';
    $('#alert-placeholder').html(alertHtml);

    // Set a timeout to automatically dismiss the alert after 2 seconds
    setTimeout(function() {
        $('.alert').alert('close'); // Using Bootstrap's `alert` method to close the alert
    }, 2000);
}


</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>
</html>
