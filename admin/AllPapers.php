<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>All Papers</title>
  <link rel="stylesheet" href="../css/admin.css" />
  <style>
    
    
  </style>
</head>
<body>

  <?php
  require_once '../includes/dbh.inc.php';
  include 'paperdata.classes.php';
  $Paperdata = new Paperdata_classes();
  $AllPapers = $Paperdata->SubmittedPapers();
include 'adminheader.php';

?>

  <!-- Main Content -->
  <div class="allmain-content">
    <div class="page-title">All Submitted Papers</div>

    <div class="allpaper-table">
      <table id="allPapersTable">
        <thead>
          <tr>
            <th class="allpaper-heading">Title</th>
            <th class="allpaper-heading">Author</th>
            <th class="allpaper-heading">Status</th>
            <th class="allpaper-heading">Submitted On</th>
            <th class="allpaper-heading">PDF</th>
          </tr>
        </thead>
        <tbody>
          <!-- Replace below with PHP loop -->
           <?php foreach ($AllPapers as $paper): ?>
          <tr>
            <td class="allpaper-content"><?php echo $paper['p_title']; ?></td>
            <?php
                            $rid = $paper['r_id'];
                            $ResearcherInfo = $Paperdata->researcherDetails($rid); // Assume this returns an associative array
                            echo '<td class="allpaper-content">' . $ResearcherInfo['r_fullname'] . '</td>';
                            ?>
            <td class="allpaper-content"><span class="status-approved">Approved</span></td>
            <td class="allpaper-content"><?php echo $paper['Timestamp']; ?></td>
            <td class="allpaper-content">
              <a href="../PDF/<?php echo $paper['p_pdf'] ?>" target="_blank" class="allbtn-view">View</a>
            </td>
          </tr>
          <?php endforeach; ?>
          <!-- End loop -->
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
