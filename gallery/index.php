<?php
include("../screens/headers/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=G, initial-scale=1.0">
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .img-container {
            overflow: hidden;
            transition: transform 0.7s ease;
        }

        .img-container:hover img {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container-fluid px-md-4">
        <h1 class="text-center">Wakazi Stand</h1>
        <p>
            The Nairobi Innovation Week serves as a dynamic platform for showcasing entrepreneurial innovation within Kenya's startup ecosystem.
            Among its standout participants is Wakazi, a pioneering platform empowering artisans to exhibit their talents and craftsmanship.
            Through Wakazi, artisans display their best handmade products, while captivating photography captures the essence of their work,
            showcasing intricate details and celebrating Kenya's rich cultural heritage. By providing visibility and connections to potential
            customers and collaborators, Wakazi embodies the spirit of innovation and entrepreneurship championed by the Nairobi Innovation Week,
            contributing to the vibrant cultural and economic landscape of Kenya and beyond.
        </p>
        <div class="row p-3 gx-3 gx-md-5">
            <div class="col-md-2 bg-light border border-radius-3 p-3 mb-3 mb-md-0">
                <h4 class="text-center">Nairobi Innovation week</h4>
                <div class="text-center d-flex flex-column">
                    <a href="#" class="btn btn-primary btn-sm mb-2">Read more</a>
                    <a href="#" class="btn btn-primary btn-sm">View gallery</a>
                </div>
            </div>
            <div class="col-md p-md-4">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="img-container">
                            <img src="img/expo1.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="img-container">
                            <img src="img/expo2.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="img-container">
                            <img src="img/expo3.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo4.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo5.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo6.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo7.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo8.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo9.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo10.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo11.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo12.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 mt-4">
                        <div class="img-container">
                            <img src="img/expo13.jpg" class="img-fluid rounded" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include("../screens/footer/footer.php");
?>