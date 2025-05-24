
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
include 'ResearcherHeader.php';
?>

  <div class="dasbboard-content">
    <div class="dashboard-header">Welcome, Researcher!</div>

    <div class="stats-container">
      <div class="stat-card">
        <div class="stat-number">5</div>
        <div>Total Submissions</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">2</div>
        <div>Under Review</div>
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
