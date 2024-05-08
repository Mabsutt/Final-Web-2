<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up - Zay eCommerce</title>
<link rel="stylesheet" href="../assets/css/loginCSS.css">
</head>
<body>
<div class="signup-container">
    <h2>Create Your Account</h2>
    <form action="signup.php" method="post">
        <input type="text" placeholder="Enter Username" name="username"  id ="username"required>
        <input type="email" placeholder="Enter Email"   id ="email" name="email" required>
        <input type="password" placeholder="Enter Password" name="password"  id ="password" required>
        <input type="text" placeholder="Enter Phone Number" name="phone" id ="phone" required>
      
        <div class="radio-buttons">
            <input type="radio" id="seller" name="user_type" value="seller" required>
            <label for="seller" >Seller</label>
            <input type="radio" id="client" name="user_type" value="client" required>
            <label for="client">Client</label>
        </div>
        <button type="submit">Sign Up</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


        $(document).ready(function() {
            $('form').on('submit', function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Retrieve the username and password from the form
                var username = $('#username').val();
                var password = $('#password').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                
                const userType = document.querySelector('input[name="user_type"]:checked').value;
                ///console.log(userType); // This should log 'seller' or 'client' based on the selection


                console.log(username);
                console.log(password);
                console.log(userType);
                console.log(phone);
                // Use jQuery's `$.ajax` to send the request to your server endpoint
                $.ajax({
                    url: '../BackEnd/Models/Users.php', // Your endpoint here
                    type: 'POST',

                   
                    data: 
                        { username: username, password: password ,UserEmail: email, phone:phone ,isSeller:userType  , action: 'SignUP'},
                       
                    success: function(response) {
                        console.log('Success:', response);

                      //  window.location.href = "account.php";
                    
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:');

                      ///  window.location.href = "index.php";
                        // Handle errors - like showing error messages to the user
                    }
                });
            })


        });
    </script>
</body>
</html>