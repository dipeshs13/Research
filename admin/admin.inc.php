<?php
require_once '../includes/dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];



    include 'admin.classes.php';
    include 'admincontro.php';

    $login = new Admin_controller($email, $password);
    $login->loginAdmin();
    if ($login) {
        header("location:./admindashboard.php?success");
        exit();
    } else {
        header("location:./login.php?success");
        exit();

    }

}