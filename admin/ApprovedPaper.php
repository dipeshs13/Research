<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Approved Papers</title>
  <link rel="stylesheet" href="../css/admin.css" />
  <style>


  </style>
</head>

<body>

  <?php
  require_once '../includes/dbh.inc.php';
  include 'adminheader.php';
  include 'paperdata.classes.php';
  $Paperdata = new Paperdata_classes();
  $ApprovedPapers = $Paperdata->getApprovedPapers();


  ?>


  <!-- Main Content -->
  <div class="approvedmain-content">
    <div class="page-title">Approved Papers</div>

    <div class="approved-table">
      <h3>List of Approved Research Papers</h3>
      <table id="approvedPapersTable">
        <thead>
          <tr>
            <th class="approved-paper-heading">Title</th>
            <th class="approved-paper-heading">Researcher</th>
            <th class="approved-paper-heading">Approved On</th>
            <th class="approved-paper-heading">File</th>
            <!-- <th class="approved-paper-heading">Actions</th> -->
          </tr>
        </thead>
        <tbody>
          <!-- Example row -->
          <?php foreach ($ApprovedPapers as $paper): ?>
            <tr>
              <td class="approved-paper-content"><?php echo $paper['p_title']; ?></td>
              <?php
              $rid = $paper['r_id'];
              $ResearcherInfo = $Paperdata->researcherDetails($rid); // Assume this returns an associative array
              echo '<td class="approved-paper-content">' . $ResearcherInfo['r_fullname'] . '</td>';
              ?>
              <!-- <td class="paper-desc"><?php echo $paper['p_submitted_on']; ?></td> -->
              <!-- <td>2025-05-24</td> -->
              <td class="approved-paper-content"><?php echo $paper['Timestamp']; ?></td>
              <td class="approved-paper-content">
                <a href="../PDF/<?php echo $paper['p_pdf'] ?>" target="_blank" class="appbtn appbtn-view">View</a>
              </td>
<!-- 
              <td class="appaction-btns approved-paper-content">
                <button class="btn appbtn-revoke">Revoke</button>
              </td> -->

            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>

</body>

</html>