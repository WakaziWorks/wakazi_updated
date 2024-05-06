<?php
session_start();
include("../screens/headers/header.php");

// Assuming you have a database connection set up as $mysqli
require_once("../config/app/config.php");

// Check if the cart is not empty
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $product_ids = array_keys($_SESSION['cart']);
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
    $types = str_repeat('i', count($product_ids));
    $query = "SELECT * FROM Products WHERE ProductID IN ($placeholders)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param($types, ...$product_ids);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $products = [];
}
$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-4 w-80 d-flex" style="margin-top: 10em;">
        <div class="container-fluid w-75 p-3 bg-light border me-3 rounded">
            <h3>Cart (<?php echo array_sum($_SESSION['cart']); ?>)</h3>
            <hr />
            <?php foreach ($products as $product): ?>
            <div class="d-flex mb-4">
                <div class="d-flex align-items-center">
                    <img class="me-3" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($product['image']); ?>" alt="product" style="width: 3em; height: 3em;">
                    <p><?php echo $product['ProductName']; ?> - KES <?php echo $product['Price']; ?></p>
                </div>
                <div class="d-flex align-items-center ms-auto">
                    <div class="btn-group me-2" role="group">
                        <button type="button" class="btn btn-secondary" onclick="updateQuantity(<?php echo $product['ProductID']; ?>, -1)">-</button>
                        <span class="btn btn-light"><?php echo $_SESSION['cart'][$product['ProductID']]; ?></span>
                        <button type="button" class="btn btn-secondary" onclick="updateQuantity(<?php echo $product['ProductID']; ?>, 1)">+</button>
                    </div>
                    <h6 class="fs-3 ms-3">KES. <?php echo $product['Price'] * $_SESSION['cart'][$product['ProductID']]; ?></h6>
                    <?php $total_price += $product['Price'] * $_SESSION['cart'][$product['ProductID']]; ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

        <div class="container-fluid w-25 bg-danger rounded p-3 bg-light border">
            <h3>Cart Summary</h3>
            <hr />
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
        </div>
      
    </div>
    <div class="row">
        <button type="button" class="btn btn-danger" onclick="clearCart()">Remove All Items</button>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    function updateQuantity(productId, change) {
        $.post('update_cart.php', { product_id: productId, quantity_change: change }, function(data) {
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
