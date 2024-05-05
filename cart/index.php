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
    <div class="container-fluid p-4 w-80 d-flex" style="margin-top: 10em;">
        <div class="container-fluid w-75 p-3 bg-light border me-3 rounded">
            <h3>Cart(1)</h3>
            <hr />
            <div class="d-flex mb-4">
                <div class="d-flex align-items-center">
                    <img class="me-3" src="../products/img/art.jpg" alt="product" style="width: 3em; height: 3em;">
                    <p>Description of image of the products to be purchased as per the information collected from the database.</p>
                </div>
                <div class="d-flex align-items-center ms-auto">
                    <h6 class="fs-3">KES. 2500.00</h6>
                </div>
            </div>
            <div class="d-flex">
                <div class="d-flex align-items-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #c837d1; color: #fff; font-weight: bold;">
                        Remove from cart
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Remove from cart</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you really want to remove this item from cart?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" style="background: #c27ec2; color: #fff;" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn" style="background: #c837d1; color: #fff;">Remove</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-auto">
                    <div class="btn-group me-2" role="group" aria-label="Third group">
                        <button type="button" class="btn" style="background: #c837d1; color: #fff;"><i class="bi bi-dash"></i></button>
                    </div>
                    <div class="d-flex align-items-center me-2">
                        <h6 class="fs-3">1</h6>
                    </div>
                    <div class="btn-group" role="group" aria-label="Third group">
                        <button type="button" class="btn" style="background: #c837d1; color: #fff;"><i class="bi bi-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid w-25 bg-danger rounded p-3 bg-light border">
            <h3>Cart Summary</h3>
            <hr />
            <div class="d-flex mb-4">
                <div class="d-flex align-items-center">
                    <h5>Sub-Total</h5>
                </div>
                <div class="d-flex align-items-center ms-auto">
                    <h6 class="fs-3">KES. 2500.00</h6>
                </div>
            </div>
            <p>Delivery fee not included.</p>
            <hr />
            <div class="d-grid gap-2">
                <button class="btn" type="button" style="background: #c837d1; font-weight: bold; color: #fff;">CHECKOUT(KES. 2500.00)</button>
            </div>
        </div>
    </div>    
</body>
</html>

<?php
include("../screens/footer/footer.php");
?>