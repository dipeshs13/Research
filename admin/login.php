<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="adlogin-container">
        <form action="admin.inc.php" method="post" id="loginForm">
            <h2>Admin Login</h2>
            <div class="adloginform-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="adloginform-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="adloginform-group">
                <button type="submit" class="adbtn-login">Login</button>
            </div>
            
    </div>
</body>
</html>