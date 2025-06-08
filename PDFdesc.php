<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Description</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container {
            width: 80%;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', sans-serif;
        }

        .container h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .detail-item {
            margin-bottom: 15px;
        }

        .detail-item strong {
            color: #34495e;
        }

        .btn-view {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .btn-view:hover {
            background: #0056b3;
        }

    </style>
</head>
<body>
<?php include 'header.php'; 
include 'includes/dbh.inc.php';
include 'classes/researcherdata.classes.php';
$researcherData = new ResearcherData_classes();
$researcherId = isset($_SESSION['userId']) ? $_SESSION['userId'] : null;
$researcherDetails = $researcherData->researcherDetails($researcherId);
?>

<?php
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
    
    
    include 'classes/PDFdata.classes.php';
    $PDFdata = new PDFdata_classes();
    $paper = $PDFdata->getPdfById($id);
    
    if (!empty($paper)) {
        echo '<div class="container">';
    echo '<div class="detail-item"><strong>Researcher Name:</strong> ' . htmlspecialchars($researcherDetails['r_fullname']) . '</div>';
    echo '<div class="detail-item"><strong>Institution:</strong> ' . htmlspecialchars($researcherDetails['r_institution']) . '</div>';
    echo '<div class="detail-item"><strong>Field:</strong> ' . htmlspecialchars($researcherDetails['r_field']) . '</div>';
    echo '<div class="detail-item"><strong>Country:</strong> ' . htmlspecialchars($researcherDetails['r_country']) . '</div>';
    echo '<div class="detail-item"><strong>Biography:</strong><br>' . nl2br(htmlspecialchars($researcherDetails['r_biography'])) . '</div>';
    echo '<div class="detail-item"><strong>Research Interests:</strong> ' . htmlspecialchars($researcherDetails['r_interest']) . '</div>';
            echo '<h2>' . htmlspecialchars($paper['p_title']) . '</h2>';
            echo '<div class="detail-item"><strong>CoAuthor:</strong> ' . htmlspecialchars($paper['p_coauthors']) . '</div>';
            echo '<div class="detail-item"><strong>Abstract:</strong><br>' . nl2br(htmlspecialchars($paper['p_abstract'])) . '</div>';
            echo '<div class="detail-item"><strong>Keywords:</strong> ' . htmlspecialchars($paper['p_keywords']) . '</div>';
            echo '<div class="detail-item"><strong>Field of Study:</strong> ' . htmlspecialchars($paper['p_fieldofstudy']) . '</div>';
            // echo '<div class="detail-item"><strong>Published Date:</strong> ' . htmlspecialchars($paper['p_date']) . '</div>';
            // echo '<a class="btn-view" href="PDF/' . htmlspecialchars($paper['p_pdf']) . '" target="_blank">View PDF</a>';
        
        echo '</div>';
    } else {
        echo '<div class="container"><p>No details found for this paper.</p></div>';
    }

} else {
    echo '<div class="container"><p>No PDF ID provided.</p></div>';
}
?>

<?php include 'footer.php'; ?>
</body>
</html>
