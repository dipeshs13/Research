<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Researchers</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
    

    

  </style>
</head>
<body>

<?php 
require_once '../includes/dbh.inc.php';
include 'paperdata.classes.php';
$Paperdata = new Paperdata_classes();
$Researchers = $Paperdata->getResearcher(); // Fetch all researchers
include 'adminheader.php';
 ?>

  <!-- Main Content -->
  <div class="remain-content">
    <div class="page-title">Manage Researchers</div>

    <table class="researcher-table">
      <thead>
        <tr>
          <th>Researcher Name</th>
          <th>Email</th>
          <th>Total Submissions</th>
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        <!-- Sample Data Rows -->
          <?php foreach($Researchers as $Researcher):?>
        <tr>
          <td><?php echo $Researcher['r_fullname'];?></td>
          <td><?php echo $Researcher['r_email'];?></td>
          <?php
              $rid = $Researcher['r_id'];
              $TotalSubmission = $Paperdata->TotalSubmittedPapers($rid); // Assume this returns an associative array
              echo '<td>' . $TotalSubmission . '</td>';
              ?>
          
          <!-- <td><span class="restatus-approved">Active</span></td> -->
          <!-- <td>
            <a href="ViewResearcher.php?id=1" class="reaction-btn">View</a>
          </td> -->
        </tr>
        <?php endforeach; ?>
        
      </tbody>
    </table>
  </div>

</body>
</html>
