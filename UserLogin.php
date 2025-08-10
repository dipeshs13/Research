<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserLogin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include'header.php';?>
    <div class="login-container">
        <?php
           if (isset($_GET['error'])) {
        $error = htmlspecialchars($_GET['error']);
        echo '<div style="color: red; text-align: center; margin: 10px 0;">Error: ' . $error . '</div>';
    }   
    ?>
        <form action="includes/login.inc.php" method="post" id="loginForm">
            <h2>User Login</h2>
            <div class="loginform-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="loginform-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="loginform-group">
                <button type="submit" class="btn-login">Login</button>
            </div>
            <div>
            <a href="ResearcherLogin.php" id="ResearcherLogin">Login as Researcher</a>
        </div>
    </div>
</body>
</html>