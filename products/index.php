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
                        <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($row['image']); ?>" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['ProductName']; ?></h5>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <a href="add_to_cart.php?product_id=<?php echo $row['ProductID']; ?>" class="btn btn-primary add-to-cart">Add to Cart</a>
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
    // Use jQuery for handling click events
    $(document).ready(function(){
        $('.add-to-cart').click(function(event){
            event.preventDefault(); // Prevent form from submitting normally
            var url = $(this).attr('href');

            $.get(url, function(data){
                // Assuming `add_to_cart.php` returns the new cart count
                $('#cart-count').text(data.new_cart_count);
                alert('Product added to cart!');
            });
        });
    });
    </script>
</body>
</html>
