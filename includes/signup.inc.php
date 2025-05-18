<?php
require_once('dbh.inc.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    include '../classes/signup.classes.php';
    include '../classes/signup.contro.php';
    
}


?>