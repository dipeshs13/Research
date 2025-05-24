<?php
require_once 'dbh.inc.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];
    $keywords = $_POST['keywords'];
    $filedofstudy = $_POST['fieldofstudy'];
    $coauthors = $_POST['coauthors'];
    $reseacher_Id = $_POST['researcher_id'];

    $filename = $_FILES['pdf']['name'];
    $fileTmpName = $_FILES['pdf']['tmp_name'];
    $folder = '../PDF/' . $filename;
    move_uploaded_file($fileTmpName, $folder);


    include '../classes/pdf.classes.php';
    include '../classes/pdf.contro.php';

    $pdf = new pdfcontro($title, $abstract, $keywords, $filedofstudy, $coauthors, $folder, $reseacher_Id);
    $pdf->uploadPdf();
    header("location:../ResearcherUpload.php?uploadSuccessfull");
    exit();

}


?>