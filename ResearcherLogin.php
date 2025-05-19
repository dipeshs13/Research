<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResearcherLogin</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="login-container">
        <form action="includes/researcherlogin.inc.php" method="post" id="loginForm">
            <h2>Researcher Login</h2>
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
        </form>
        <div>
            <a href="UserLogin.php" id="UserLogin">Login as User</a>
        </div>
</body>

</html>