<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Zay eCommerce</title>
<link rel="stylesheet" href="../assets/css/loginCSS.css">
</head>
<body>
<div class="login-container">
    <h2>Login to Your Account</h2>
    <form action="login.php" method="post">
        <input type="email" placeholder="Enter Email" name="email"  id="email"required>
        <input type="password" placeholder="Enter Password" name="password"   id="password" required>
        <button type="submit" class="login-btn">Login</button>
    </form>
    <button onclick="location.href='signUp.php'" class="signup-btn">Sign Up</button>
    <a href="#">Forgot password?</a>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


        $(document).ready(function() {
            $('form').on('submit', function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Retrieve the username and password from the form
                var username = $('#email').val();
                var password = $('#password').val();
              
                $.ajax({
                    url: '../BackEnd/Models/Users.php', // Your endpoint here
                    type: 'POST',

                   
                    data: 
                        { username: username, password: password  , action: 'Man-LogIN'},
                       
                    success: function(response) {
                        console.log('Success:', response);

                        window.location.href = "../index.php";
                    
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:');

                       //x window.location.href = "index.php";
                        // Handle errors - like showing error messages to the user
                    }
                });
            })


        });
    </script>
</html>

