<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include("../screens/headers/header.php"); ?>
<?php require_once("../config/app/config.php"); ?>

<?php
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

<div class="container-fluid" style="padding: 15px;">
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="bg-light border rounded p-3">
                <h3>Cart (<?php echo count($products); ?>)</h3>
                <hr />
                <?php if (empty($products)) : ?>
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <h4 class="text-muted">Cart is empty</h4>
                    </div>
                <?php else : ?>
                    <?php foreach ($products as $product) : ?>
                        <div class="d-flex mb-4">
                            <img class="me-3" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($product['image']); ?>" alt="product" style="width: 3em; height: 3em;">
                            <div class="me-auto">
                                <p><?php echo $product['ProductName']; ?> - KES <?php echo $product['Price']; ?></p>
                            </div>
                            <div class="btn-group me-2" role="group">
                                <button type="button" class="btn btn-secondary" onclick="updateQuantity(<?php echo $product['ProductID']; ?>, -1)">-</button>
                                <span class="btn btn-light"><?php echo $product['quantity']; ?></span>
                                <button type="button" class="btn btn-secondary" onclick="updateQuantity(<?php echo $product['ProductID']; ?>, 1)">+</button>
                            </div>
                            <h6 class="ms-3">KES. <?php echo $product['Price'] * $product['quantity']; ?></h6>
                            <?php $total_price += $product['Price'] * $product['quantity']; ?>
                        </div>
                    <?php endforeach; ?>
                    <button type="button" class="btn btn-danger" onclick="clearCart()">Remove All Items</button>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="bg-danger rounded p-3 bg-light border">
                <h3>Cart Summary</h3>
                <hr />
                <?php if (!empty($products)) : ?>
                    <div class="d-flex mb-4">
                        <h5 class="me-auto">Sub-Total</h5>
                        <h6>KES. <?php echo $total_price; ?></h6>
                    </div>
                    <p>Delivery fee not included.</p>
                    <hr />
                    <button class="btn btn-primary" type="button" style="width:100%;" onclick="proceedToCheckout();">CHECKOUT (KES. <?php echo $total_price; ?>)</button>
                <?php else : ?>
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <a href="../products/index.php" class="btn btn-secondary">Start Shopping</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function updateQuantity(productId, change) {
        $.ajax({
            url: 'update_cart.php',
            type: 'POST',
            data: {
                product_id: productId,
                quantity_change: change
            },
            success: function(response) {
                location.reload(); // Reload page to reflect the updated quantity
            }
        });
    }

    function clearCart() {
        if (confirm('Are you sure you want to remove all items from your cart?')) {
            $.post('clear_cart.php', function(data) {
                location.reload(); // Reload page to reflect that the cart is now empty
            });
        }
    }

    function proceedToCheckout() {
        window.location.href = '../checkout/checkout.php'; // Redirect to the checkout page
    }
</script>

</body>
</html>
