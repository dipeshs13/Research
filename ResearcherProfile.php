<?php
 require_once 'includes/dbh.inc.php';
include 'ResearcherHeader.php';
  include 'classes/researcherdata.classes.php';


$researcherId = $_SESSION['researcherId'];

$profile = new Researcherdata_classes();
$researcher = $profile->researcherDetails($researcherId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Researcher Profile</title>
  <link rel="stylesheet" href="css/Researcher.css" />
  <style>
    .profile-content {
      padding: 30px;
    }
    .profile-header {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .profile-container {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      max-width: 700px;
      margin: auto;
    }
    .profile-info {
      margin-bottom: 15px;
    }
    .profile-info label {
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="profile-content">
  <div class="profile-header">My Profile</div>

  <div class="profile-container">
    <div class="profile-info">
      <label>Full Name:</label>
      <div><?= htmlspecialchars($researcher['r_fullname']) ?></div>
    </div>

    <div class="profile-info">
      <label>Email:</label>
      <div><?= htmlspecialchars($researcher['r_email']) ?></div>
    </div>

    <div class="profile-info">
      <label>Institution:</label>
      <div><?= htmlspecialchars($researcher['r_institution']) ?></div>
    </div>

    <div class="profile-info">
      <label>Field of Research:</label>
      <div><?= htmlspecialchars($researcher['r_field']) ?></div>
    </div>
    <div class="profile-info">
      <label>Country:</label>
      <div><?= htmlspecialchars($researcher['r_country']) ?></div>
    </div>
    <div class="profile-info">
      <label>Interest:</label>
      <div><?= htmlspecialchars($researcher['r_interest']) ?></div>
    </div>

    <div class="profile-info">
      <label>Bio / About Me:</label>
      <div><?= nl2br(htmlspecialchars($researcher['r_biography'])) ?></div>
    </div>
  </div>
</div>

</body>
</html>
