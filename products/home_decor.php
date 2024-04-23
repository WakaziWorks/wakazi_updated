<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
<?php
include("../__screens/__headers/header.php")
?>
    <div id="product-list">
        <h2>Product List</h2>
        <button onclick="addToCart('Product 1', 10)">Add Product 1 to Cart</button>
        <button onclick="addToCart('Product 2', 20)">Add Product 2 to Cart</button>
    </div>

    <div id="cart">
        <h2>Shopping Cart</h2>
        <ul id="cart-items"></ul>
        <button onclick="proceedToCheckout()">Proceed to Checkout</button>
    </div>

    <script>
        function addToCart(productName, price) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push({ productName, price });
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
        }

        function updateCartDisplay() {
            let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            let cartItemsHTML = cartItems.map(item => `<li>${item.productName} - $${item.price}</li>`).join('');
            document.getElementById('cart-items').innerHTML = cartItemsHTML;
        }

        function proceedToCheckout() {
            if (isLoggedIn()) {
                // Redirect to checkout page
                console.log("Proceeding to checkout...");
            } else {
                // Redirect to login/register page
                console.log("Redirecting to login/register page...");
            }
        }

        function isLoggedIn() {
            // Implement logic to check if user is logged in
            return false; // For demonstration purposes
        }

        // Update cart display on page load
        updateCartDisplay();
    </script>
</body>
</html>
