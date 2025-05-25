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
          <tr>
            <td>AI in Agriculture</td>
            <td>John Doe</td>
            <td>Pending</td>
            <td>2025-05-24</td>
          </tr>
          <tr>
            <td>Quantum Computing Basics</td>
            <td>Jane Smith</td>
            <td>Approved</td>
            <td>2025-05-20</td>
          </tr>
          <tr>
            <td>Cybersecurity Trends</td>
            <td>Mike Johnson</td>
            <td>Pending</td>
            <td>2025-05-18</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</body>
</html>
