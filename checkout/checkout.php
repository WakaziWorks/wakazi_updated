<?php
session_start();
include("../screens/headers/header.php");
// Check if user is already logged in
if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: checkout.php'); // Redirect if already logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Checkout Form</h5>
                    <form id="checkoutForm">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required onchange="checkEmail()">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
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
                    <!-- <div class="d-grid gap-2">
                        <button class="btn" type="button" style="background: #c837d1; color: #fff;" onclick="proceedToCheckout();">CHECKOUT (KES. <?php echo $total_price; ?>)</button>
                    </div> -->
                <?php else : ?>
                    <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                        <a href="../products/index.php" class="btn btn-secondary">Start Shopping</a>
                    </div>
                <?php endif; ?>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function checkEmail() {
    var email = $('#email').val();
    $.ajax({
        url: 'check_email.php',
        type: 'POST',
        data: {email: email},
        success: function(response) {
            if(response.exists) {
                $('#emailHelp').text('Email already registered, please log in or use a different email.');
                $('#password, #confirmPassword').prop('disabled', true);
            } else {
                $('#emailHelp').text('');
                $('#password, #confirmPassword').prop('disabled', false);
            }
        }
    });
}

$('#checkoutForm').on('submit', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: 'process_checkout.php', // This script will handle both signup and login
        type: 'POST',
        data: formData,
        success: function(response) {
            alert('Success! Proceeding to payment.');
            window.location.href = 'payment_page.php';
        },
        error: function() {
            alert('Failed to process your request.');
        }
    });
});
</script>
</body>
</html>

