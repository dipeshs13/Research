<?php
require_once '../classes/pdf.contro.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];
    $keywords = $_POST['keywords'];
    $fieldofstudy = $_POST['fieldofstudy'];
    $coauthors = $_POST['coauthors'];
    $researcher_id = $_POST['researcher_id'];

    // Handle file upload
    $filename = $_FILES['pdf']['name'];
    $fileTmpName = $_FILES['pdf']['tmp_name'];
    $folder = '../PDF/' . $filename;
    
    // Check if all required fields are filled
    if(empty($title) || empty($abstract) || empty($keywords) || empty($fieldofstudy) || empty($filename)) {
        header("location: ../ResearcherUpload.php?error=emptyinput");
        exit();
    }

    // Move uploaded file
    if(!move_uploaded_file($fileTmpName, $folder)) {
        header("location: ../ResearcherUpload.php?error=uploadfailed");
        exit();
    }

    // Create PDF controller and upload
    $pdf = new pdfcontro($title, $abstract, $keywords, $fieldofstudy, $coauthors, $folder, $researcher_id);
    $pdf->uploadPdf();
    
    header("location: ../ResearcherUpload.php?upload=success");
    exit();
} else {
    header("location: ../ResearcherUpload.php");
    exit();
}


?>