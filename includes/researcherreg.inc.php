<?php 
require_once 'dbh.inc.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $institution = $_POST['institution'];
    $field_of_research = $_POST['field_of_research'];
    $country = $_POST['country'];
    $biography = $_POST['biography'];
    $research_interests = $_POST['research_interests'];

    // echo $fullname, $email, $password, $confirmPassword, $institution, $field_of_research, $country, $biography, $research_interests;   
    include '../classes/researcherreg.classes.php';
    include '../classes/researchercontro.classes.php';

    $researcher = new Researchercontro($fullname, $email, $password, $confirmPassword, $institution, $field_of_research, $country, $biography, $research_interests);

    $researcher->registerResearcher();
    header("location:../index.php?signupSuccessfull");
    exit();


}


?>