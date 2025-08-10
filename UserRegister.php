<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserRegister</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="register-container">
        <?php
           if (isset($_GET['error'])) {
        $error = htmlspecialchars($_GET['error']);
        echo '<div style="color: red; text-align: center; margin: 10px 0;">Error: ' . $error . '</div>';
    }   
    ?>
        <form action="includes/signup.inc.php" method="post" id="registerForm">
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
                    <button type="submit" name="reg" class="btn-submit">Register</button>
                </div>
        </form>
        <div>
            <p>Already have an account? <a href="UserLogin.php" id="loginLink">Login here</a></p>
        </div>
        <div>
            <a href="ResearcherRegister.php" id="ResearcherLink">Click Here to register as a Researcher</a>
        </div>
        
    </div>
</body>

</html>