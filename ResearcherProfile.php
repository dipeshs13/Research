<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Researcher Profile</title>
  <link rel="stylesheet" href="css/Researcher.css" />

</head>

<body>


  <?php
  include 'ResearcherHeader.php';
  ?>
  <div class="profile-content">
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