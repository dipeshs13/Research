<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserRegister</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include'header.php';?>
    <div class="register-container">
        <form action="#" method="post" id="registerForm">
            <h2>User Registration</h2>
            <div class="form-group">
                <label for="firstname">FirstName:</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">LastName:</label>
                <input type="text" id="lastname" name="lastname" required>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>