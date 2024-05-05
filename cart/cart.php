<?php
include("../screens/headers/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid  bg-light border w-75 rounded p-3 d-flex mb-6 flex-column justify-content-center align-items-center" style="margin-top: 10em;">
        <div class="text-center rounded-pill p-2 d-flex mt-5 justify-content-center align-items-center" style="background: #c837d1; height: 9em; width: 9em;">
            <i class="bi bi-cart3 fs-1 fw-bold text-white"></i>
        </div>
        <div class="text-center text-black mt-3">
            <h3>Your cart is empty!</h3>
            <p>Browse our products to discover our best deals!</p>
            <a href="../../products/index.php"><button type="button" class="btn btn-lg mt-5 mb-5" style="background: #c837d1; color: #fff;">START SHOPPING</button></a>
        </div>
    </div>
</body>
</html>

<?php
include("../screens/footer/footer.php");
?>