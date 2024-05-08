<?php
require_once '../BackEnd/Common/Setup.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zay Shop - Product Listing Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
</head>
<body>
    <?php starter(); ?>

    <!-- Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Categories
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="#">Genre</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="row" id="book-list">
                    <!-- Book items will be added here dynamically -->
                </div>
            </div>
        </div>
    </div>

    <?php footer(); ?>
    <!-- Scripts -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
    $(document).ready(function() {
        $.ajax({
            url: '../BackEnd/Models/Users.php',
            type: 'POST',
            data: { action: 'FetchAllBooks' },
            dataType: 'json',
            success: function(books) {
                var container = $('#book-list');
                books.forEach(function(book) {
                    var bookHTML = `
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="${book.IMAGE_PATH}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.php"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">${book.BOOK}</a>
                                <p class="text-center mb-0">${book.DESCRIPTION}</p>
                                <p class="text-center text-warning"><strong>$${book.Price}</strong></p>
                            </div>
                        </div>
                    </div>`;
                    container.append(bookHTML);
                });
            },
            error: function(xhr, status, error) {
                console.error("An error occurred:", error);
            }
        });
    });
    </script>
</body>
</html>
