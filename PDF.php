<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
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
            echo '<h3>' . htmlspecialchars($pdf['p_title']) . '</h3>';
            echo '<a href="' . $pdfPath . '" target="_blank" class="view-btn">View PDF</a>';
            echo '</div>';
        }
        echo '</div>';
    }
    ?>
</body>

</html>