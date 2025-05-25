<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Researcher Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/Researcher.css" />
</head>
<body>
  <?php 
  require_once 'includes/dbh.inc.php';
include 'ResearcherHeader.php';
include 'classes/researcherdata.classes.php';
$researcherData = new Researcherdata_classes();
$reseacher_Submissions = $researcherData->TotalSubmissions($researcherId);
$TotalPendingPapers = $researcherData->TotalPending($researcherId);
?>

  <div class="dasbboard-content">
    <div class="dashboard-header">Welcome, Researcher!</div>

    <div class="stats-container">
      <div class="stat-card">
        <div class="stat-number"><?php echo $reseacher_Submissions; ?></div>
        <div>Total Submissions</div>
      </div>
      <div class="stat-card">
        <div class="stat-number"><?php echo $TotalPendingPapers; ?></div>
        <div>Under Pending</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">3</div>
        <div>Approved Papers</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">12</div>
        <div>Total Citations</div>
      </div>
    </div>

    <div class="recent-activity">
      <h3>Recent Activity</h3>
      <div class="activity-item">You uploaded a new paper titled "AI in Healthcare" - Pending Review</div>
      <div class="activity-item">Your paper "Blockchain in Education" was approved</div>
      <div class="activity-item">Citation updated for "IoT for Smart Cities"</div>
    </div>

    <div class="action-buttons">
      <a href="#">Upload New Paper</a>
      <a href="#">View All Submissions</a>
    </div>
  </div>
</body>
</html>
