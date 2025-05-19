<?php
require_once('dbh.inc.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../classes/login.classes.php';
    include '../classes/login.contro.php';

    $login = new LoginContro($email, $password);

    $login->loginUser();
    header("location:../index.php?loginSuccessfull");
    exit();
}


?>