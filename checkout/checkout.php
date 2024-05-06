<?php

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
                <!-- Conditional content based on user login status -->
                <div id="conditionalContent"></div>
            </div>
            <div class="col-md-5">
                <!-- Optionally add summary or promotional information -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Need Help?</h5>
                        <p class="card-text">Our customer support is here to help you with your order. Call us at <strong>----------</strong> or <a href="#">chat now</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Check if user is logged in or not
            $.get('check_login_status.php', function(data) {
                if (data.logged_in) {
                    // User is logged in, display payment form
                    $('#conditionalContent').html(`
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Payment Details</h5>
                                <p>Initiate payment using your preferred method.</p>
                                <p> Payment comes here</p>
                            </div>
                        </div>
                    `);
                } else {
                    // User is not logged in, display signup/login form
                    $('#conditionalContent').html(`
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Checkout Form</h5>
                                <form id="checkoutForm">
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
                                                <div class="mb-3">a
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" required>
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
                                </form>
                            </div>
                        </div>
                    `);
                }
            }, 'json');
        });

        function checkEmail() {
            var email = $('#email').val();
            $.ajax({
                url: 'check_email.php',
                type: 'POST',
                data: {
                    email: email
                },
                success: function(response) {
                    if (response.exists) {
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