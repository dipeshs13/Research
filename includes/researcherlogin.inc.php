<?php 
require_once 'dbh.inc.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../classes/researcherlogin.classes.php';
    include '../classes/researcherlogin.contro.php';

    $researcherlogin = new Researcherlogin_contro($email, $password);
    $researcherlogin->loginResearcher();
    header("location:../index.php?loginSuccessfull");
    exit();
    
    
}




?>