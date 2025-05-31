<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

  <?php
  require_once '../includes/dbh.inc.php';
  include 'adminheader.php';
  include 'paperdata.classes.php';
  $Paperdata = new Paperdata_classes();
  $TotalPapers = $Paperdata->TotalPaper();
  $TotalResearchers = $Paperdata->TotalResearcher();
  $TotalPendingPapers = $Paperdata->TotalPending();
  $TotalApprovedPapers = $Paperdata->TotalApproved();
  $PaperDetails = $Paperdata->getPapers(); // Fetch all papers for recent submissions
  ?>
  <!-- Main Content -->
  <div class="dashboardmain-content">
    <div class="dashboard-header">Welcome, Admin</div>

    <!-- Cards -->
    <div class="cards">
      <div class="card">
        <h4>Total Papers</h4>
        <h2><?php echo $TotalPapers; ?></h2>
      </div>
      <div class="card">
        <h4>Pending Papers</h4>
        <h2><?php echo $TotalPendingPapers; ?></h2>
      </div>
      <div class="card">
        <h4>Approved Papers</h4>
        <h2><?php echo $TotalApprovedPapers; ?></h2>
      </div>
      <div class="card">
        <h4>Total Researchers</h4>
        <h2><?php echo $TotalResearchers; ?></h2>
      </div>
    </div>

    <!-- Recent Submissions -->
    <div class="recent-table">
      <h3>Recent Submissions</h3>
      <table>
        <thead>
          <tr>
            <th>Paper Title</th>
            <th>Researcher</th>
            <th>Status</th>
            <th>Submitted On</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($PaperDetails as $Paper): ?>
            <tr>
              <td><?php echo $Paper['p_title']; ?></td>
              <?php
              $rid = $Paper['r_id'];
              $ResearcherInfo = $Paperdata->researcherDetails($rid); // Assume this returns an associative array
              echo '<td>' . $ResearcherInfo['r_fullname'] . '</td>';
              ?>
             <!-- Replace with dynamic researcher name if needed -->
              <td><?php echo $Paper['status']; ?></td>
              <td><?php echo $Paper['Timestamp']; ?></td>
            </tr>
          <?php endforeach; ?>


        </tbody>
      </table>
    </div>

  </div>

</body>

</html>