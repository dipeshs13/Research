<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Researcher Dashboard</title>
  <link rel="stylesheet" href="css/Researcher.css" />
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
    }

    .sidebar {
      width: 220px;
      background-color: #1a1a2e;
      color: white;
      height: 100vh;
      padding: 20px;
    }

    .main-content {
      flex: 1;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .dashboard-header {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .stats-container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .stat-card {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      flex: 1 1 200px;
      text-align: center;
    }

    .stat-number {
      font-size: 32px;
      color: #007bff;
    }

    .recent-activity {
      margin-top: 30px;
    }

    .activity-item {
      background-color: white;
      padding: 15px;
      margin-bottom: 10px;
      border-left: 4px solid #007bff;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .action-buttons {
      margin-top: 30px;
    }

    .action-buttons a {
      display: inline-block;
      margin-right: 10px;
      background-color: #007bff;
      color: white;
      padding: 10px 15px;
      border-radius: 5px;
      text-decoration: none;
    }
  </style>
</head>
<body>
    <?php 
include 'ResearcherHeader.php';
?>
  <!-- <div class="sidebar"> -->
    <!-- Your existing sidebar here -->
    <!-- <div class="logo">Researcher Panel</div>
    <ul class="menu">
      <li class="active"><a href="#"><span>Dashboard</span></a></li>
      <li><a href="#"><span>My Profile</span></a></li>
      <li><a href="#"><span>Upload Research Paper</span></a></li>
      <li><a href="#"><span>My Submissions</span></a></li>
      <li><a href="#"><span>Citations & Stats</span></a></li>
      <li><a href="#"><span>Peer Reviews</span></a></li>
      <li><a href="#"><span>Messages</span></a></li>
      <li><a href="#"><span>Account Settings</span></a></li>
      <li><a href="#" class="logout"><span>Logout</span></a></li>
    </ul>
  </div> -->

  <div class="main-content">
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
