<?php
session_start();

if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
    $userFirstname = $_SESSION['userfirstname'];
    $userLastname = $_SESSION['userlastname'];
} 
?>
<nav id="navbar">
    <div id="navbar-inner">
        <a class="brand" href="index.php">Research Paper</a>
        <div class="nav-container">
            <ul class="nav-navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="PDF.php">PDF</a></li>
                <?php
                if (isset($userId)){
                    echo '
                    <li>' . $userFirstname . ' '. $userLastname.'</li>
                    <li><a href="logout.php">Logout</a></li>
                    ';
                } else {
                    echo '
                    
                     <li><a href="UserLogin.php" class="login-link">Login</a></li>
                     <li><a href="UserRegister.php" class="register-link">Register</a></li>';
                }
                ?>
               
            </ul>
        </div>
    </div>
</nav>