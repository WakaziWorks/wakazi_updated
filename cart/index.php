<?php
session_start();
include("../screens/headers/header.php");

require_once("../config/app/config.php");

// Fetch cart details for the current session
$session_id = session_id();
$query = "SELECT p.*, cd.quantity FROM cart_details cd
          JOIN Products p ON p.ProductID = cd.product_id
          WHERE cd.session_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);

$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid p-4 w-80 d-flex" style="margin-top: 10em;">
            <div class="container-fluid w-75 p-3 bg-light border me-3 rounded">
                <h3>Cart (<?php echo count($products); ?>)</h3>
                <hr />
                <?php if (empty($products)) : ?>
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <h4 class="text-muted">Cart is empty</h4>
                    </div>
                <?php else : ?>
                    <?php foreach ($products as $product) : ?>
                        <div class="d-flex mb-4">
                            <div class="d-flex align-items-center">
                                <img class="me-3" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($product['image']); ?>" alt="product" style="width: 3em; height: 3em;">
                                <p><?php echo $product['ProductName']; ?> - KES <?php echo $product['Price']; ?></p>
                            </div>
                            <div class="d-flex align-items-center ms-auto">
                                <div class="btn-group me-2" role="group">
                                    <button type="button" class="btn btn-secondary" onclick="updateQuantity(<?php echo $product['ProductID']; ?>, -1)">-</button>
                                    <span class="btn btn-light"><?php echo $product['quantity']; ?></span>
                                    <button type="button" class="btn btn-secondary" onclick="updateQuantity(<?php echo $product['ProductID']; ?>, 1)">+</button>
                                </div>
                                <h6 class="fs-3 ms-3">KES. <?php echo $product['Price'] * $product['quantity']; ?></h6>
                                <?php $total_price += $product['Price'] * $product['quantity']; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <button type="button" class="btn btn-danger" onclick="clearCart()">Remove All Items</button>

                <?php endif; ?>
            </div>

            <!-- HTML Above Remains Unchanged -->

            <div class="container-fluid w-25 bg-danger rounded p-3 bg-light border">
                <h3>Cart Summary</h3>
                <hr />
                <?php if (!empty($products)) : ?>
                    <div class="d-flex mb-4">
                        <div class="d-flex align-items-center">
                            <h5>Sub-Total</h5>
                        </div>
                        <div class="d-flex align-items-center ms-auto">
                            <h6 class="fs-3">KES. <?php echo $total_price; ?></h6>
                        </div>
                    </div>
                    <p>Delivery fee not included.</p>
                    <hr />
                    <div class="d-grid gap-2">
                        <button class="btn" type="button" style="background: #c837d1; color: #fff;">CHECKOUT (KES. <?php echo $total_price; ?>)</button>
                    </div>
                <?php else : ?>
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <a href="../products/index.php" class="btn btn-secondary">Start Shopping</a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- JavaScript and Closing HTML Tags Remain Unchanged -->

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function updateQuantity(productId, change) {
            $.post('update_cart.php', {
                product_id: productId,
                quantity_change: change
            }, function(data) {
                location.reload(); // Reload page to update cart display
            });
        }

        function clearCart() {
            if (confirm('Are you sure you want to remove all items from your cart?')) {
                $.post('clear_cart.php', function(data) {
                    location.reload(); // Reload page to reflect that the cart is now empty
                });
            }
        }
    </script>

</body>

</html>