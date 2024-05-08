<?php
// session_start();

// If user is already logged in, redirect to checkout directly
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: checkout.php');
    exit;
}
include("../screens/headers/header.php");

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
                <div id="conditionalContent"></div>
            </div>
            <div class="col-md-5">
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
                   
                        
                        
                                <div class="card text-center" style="opacity: 1;">
                                    <div class="card-body">
                                        <h6 class="card-title">M-Pesa</h6>
                                        <p class="card-text">Paybill: 522533 <br> Account Number: 7845649 <br></p>
                                        <p><button class="btn btn-primary">Pay with M-Pesa</button></p>
                                    </div>
                                </div>
                      

                    `);
                } else {
                    // User is not logged in, redirect to signup page
                    window.location.href = '../auth/accounts/signup.php';
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
    </script>
</body>

</html>
<?php
ob_end_flush(); // Send output to browser
?>