<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .login-prompt {
             
            background: #eaf4fb;
            color: #31708f;
            border: 1px solid #bce8f1;
            padding: 16px 20px;
            border-radius: 6px;
            margin-top: 20px;
            text-align: center;
           font-size: 1.1rem;
        
        }
        .pdf-title-link{
            text-decoration: none;
            color: #2c3e50;
            font-weight: 600;
            font-size: 15px;
            display: block;
        }
    </style>
</head>

<body>
    <?php
    require_once 'includes/dbh.inc.php';
    include "header.php";
    include 'classes/PDFdata.classes.php';
    $PDFdata = new PDFdata_classes();
    $PDFs = $PDFdata->getPdf();
    if (isset($userId)) {
        echo '<div class="pdf-cards">';
        foreach ($PDFs as $pdf) {
            $pdfPath = 'PDF/' . htmlspecialchars($pdf['p_pdf']);
            echo '<div class="pdf-card">';
            echo '<img src="images/pdf4.jpg" alt="PDF Preview" class="pdf-preview">';
            echo '<a href="PDFdesc.php?title=' . urlencode($pdf['p_title']) . '&id=' . urlencode($pdf['p_id']) . '" class="pdf-title-link">' . htmlspecialchars($pdf['p_title']) . '</a>';
            // echo '<h3>' . htmlspecialchars($pdf['p_title']) . '</h3>';
            echo '<a href="' . $pdfPath . '" target="_blank" class="view-btn">View PDF</a>';
            echo '</div>';
        }
        echo '</div>';
    }
    else {
        echo '<p class="login-prompt">Please <a href="UserLogin.php">log in</a> to view the PDFs.</p>';
    }
    ?>
</body>

</html>