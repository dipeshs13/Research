<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Researcher Profile</title>
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
      padding: 30px;
    }

    .profile-header {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .profile-container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      max-width: 700px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .profile-pic {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile-pic img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-form label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .profile-form input,
    .profile-form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .profile-form textarea {
      resize: vertical;
      height: 100px;
    }

    .save-btn {
      margin-top: 20px;
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .save-btn:hover {
      background-color: #0056b3;
    }

    .change-password {
      margin-top: 40px;
    }

    .change-password h3 {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <!-- <div class="sidebar">
    <div class="logo">Researcher Panel</div>
    <ul class="menu">
      <li><a href="#"><span>Dashboard</span></a></li>
      <li class="active"><a href="#"><span>My Profile</span></a></li>
      <li><a href="#"><span>Upload Research Paper</span></a></li>
      <li><a href="#"><span>My Submissions</span></a></li>
      <li><a href="#"><span>Citations & Stats</span></a></li>
      <li><a href="#"><span>Peer Reviews</span></a></li>
      <li><a href="#"><span>Messages</span></a></li>
      <li><a href="#"><span>Account Settings</span></a></li>
      <li><a href="#" class="logout"><span>Logout</span></a></li>
    </ul>
  </div> -->

   <?php 
include 'ResearcherHeader.php';
?>
  <div class="main-content">
    <div class="profile-header">My Profile</div>

    <div class="profile-container">
      <div class="profile-pic">
        <img src="images/default-profile.png" alt="Profile Picture" />
      </div>

      <form class="profile-form">
        <label for="name">Full Name</label>
        <input type="text" id="name" value="Dr. Jane Doe" />

        <label for="email">Email</label>
        <input type="email" id="email" value="jane@example.com" />

        <label for="institution">Institution</label>
        <input type="text" id="institution" value="Oxford University" />

        <label for="field">Field of Research</label>
        <input type="text" id="field" value="Artificial Intelligence" />

        <label for="bio">Bio / About Me</label>
        <textarea id="bio">Researcher in AI with a focus on NLP and Machine Learning applications.</textarea>

        <label for="orcid">ORCID / Researcher ID (optional)</label>
        <input type="text" id="orcid" value="0000-0001-2345-6789" />

        <button type="submit" class="save-btn">Save Changes</button>
      </form>

      <div class="change-password">
        <h3>Change Password</h3>
        <form class="profile-form">
          <label for="current-password">Current Password</label>
          <input type="password" id="current-password" />

          <label for="new-password">New Password</label>
          <input type="password" id="new-password" />

          <label for="confirm-password">Confirm New Password</label>
          <input type="password" id="confirm-password" />

          <button type="submit" class="save-btn">Update Password</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
