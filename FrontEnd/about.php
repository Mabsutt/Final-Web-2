<?php
require_once '../BackEnd/Common/Setup.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop - About Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
<?php starter()?>

    <!-- About Section -->
    <section class="bg-success py-5">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col-md-8 text-white">
                    <h1>About Zay Book Store</h1>
                    <p>
                        Zay Book Store is your one-stop destination for the best in literature, academic texts, and genre fiction. Dive into the world of books and explore endless possibilities and ideas with us.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="../assets/img/book4.jpeg" alt="About Hero">
                </div>
            </div>
        </div>
    </section>
    <!-- Close About Section -->

    <!-- Services Section -->
    <section class="container py-5">
        <div class="row text-center pt-5 pb-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Services</h1>
                <p>
                    At Zay Book Store, we provide a variety of services tailored for book lovers, from book clubs and reading sessions to educational seminars and author meet-and-greets.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-book fa-lg"></i></div>
                    <h2 class="h5 mt-4 text-center">Wide Selection of Books</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fas fa-calendar-alt"></i></div>
                    <h2 class="h5 mt-4 text-center">Events and Signings</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-users"></i></div>
                    <h2 class="h5 mt-4 text-center">Community Engagement</h2>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 pb-5">
                <div class="h-100 py-5 services-icon-wap shadow">
                    <div class="h1 text-success text-center"><i class="fa fa-rocket"></i></div>
                    <h2 class="h5 mt-4 text-center">Fast Shipping</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->




  <?php footer()?>
    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- End Script -->
</body>
</html>