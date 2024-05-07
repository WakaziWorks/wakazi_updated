<?php
include("../screens/headers/header.php"); // Ensure the path is correct
?>


    <style>
        .card {
            display: flex;
            flex-direction: column;
            /* Ensures the content inside card is properly aligned */
            height: 100%;
            /* Makes sure all cards in the row have the same height */
        }

        .card-body {
            flex-grow: 1;
            /* Allows the card body to fill the space making footer align at bottom */
        }

        .card-img-top {
            width: 100%;
            /* Ensures the image takes the full width of the card */
            height: 300px;
            /* Fixed height for all images */
            object-fit: contain;
            /* Ensures the image covers the fixed height, cropping excess parts if necessary */
            border-top-left-radius: calc(.25rem - 1px);
            /* Optional: matches the border radius of the card */
            border-top-right-radius: calc(.25rem - 1px);
        }
    </style>



<div class="container" style="padding: 20px;">

    <div class="row" style="padding: 25px;">
        <?php
        include("../config/app/config.php");
        $query = "SELECT * FROM Products";
        $result = $mysqli->query($query);

        while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="placeholder.jpg" data-src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['image']); ?>" class="lazyload card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row['ProductName']; ?></h5>
                            <h5 class='product-price'><?php echo 'KES ' . $row['Price'] ?></h5>
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
            data: {
                product_id: productId
            },
            success: function(response) {
                // Update the cart count in the UI
                $('#cart-count').text(response.new_cart_count);
                showSuccessAlert('Product added to cart successfully!');
            },
            error: function() {
                showSuccessAlert('Failed to add product to cart.', false);
            }
        });
    }
    // $('button.add-to-cart').on('click', function(e) {
    //     e.preventDefault();
    //     var btn = $(this);
    //     btn.prop('disabled', true);

    //     $.ajax({
    //         url: 'add_to_cart.php',
    //         type: 'POST',
    //         data: {
    //             product_id: btn.data('product-id')
    //         },
    //         success: function(response) {
    //             $('#cart-count').text(response.new_cart_count);
    //             showSuccessAlert('Product added to cart successfully!');
    //             btn.prop('disabled', false);
    //         },
    //         error: function() {
    //             showSuccessAlert('Failed to add product to cart.', false);
    //             btn.prop('disabled', false);
    //         }
    //     });
    // });

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
<?php
include "../screens/footer/footer.php";
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async=""></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>

</html>