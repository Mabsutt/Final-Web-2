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
<div class="container mt-5">
    <h2>Add a New Book</h2>
    <form id="bookForm">
        <div class="mb-3">
            <label for="bookName" class="form-label">Book Name:</label>
            <input type="text" class="form-control" id="bookName" name="bookName" required>
        </div>
        <div class="mb-3">
            <label for="bookDescription" class="form-label">Description:</label>
            <textarea class="form-control" id="bookDescription" name="bookDescription" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <textarea class="form-control" id="price" name="Price" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="bookImage" class="form-label">Upload Image:</label>
            <input type="file" class="form-control" id="bookImage" name="bookImage" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<br>
   
<?php footer()?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    $('#bookForm').on('submit', function(e) {
        e.preventDefault();  // Prevent the default form submission

        var formData = new FormData(this);  // Create a FormData object, passing in the form
        // Append the user ID stored in the PHP session to the FormData object
        formData.append('userId', <?php echo json_encode($_SESSION['ID']); ?>);
        formData.append('action', 'POSTBOOK');
        
        $.ajax({
            url: '../BackEnd/Models/Users.php',  // Backend script to process the form
            type: 'POST',
            data: formData,
            contentType: false,  // Required for 'multipart/form-data' forms which include file upload
            processData: false,  // Ensure that jQuery does not automatically convert the data
            success: function(response) {
                console.log('Success:', response);
                alert('Book added successfully!');
                // Optionally clear the form or handle UI changes
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to add the book.');
            }
        });

})
});
</script>


    <!-- End Script -->
</body>

</html>