<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Users</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
   

 
  </style>
</head>
<body>


<?php include 'adminheader.php'; ?>
  <!-- Main Content -->
  <div class="usrmain-content">
    <div class="page-title">Manage Users</div>

    <table class="user-table">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example user rows -->
        <tr>
          <td>Prakash KC</td>
          <td>prakash@example.com</td>
          <td><span class="role-researcher">Researcher</span></td>
          <td><span class="usrstatus-active">Active</span></td>
          <td><a href="ViewUser.php?id=1" class="usraction-btn">View</a></td>
        </tr>
        
      </tbody>
    </table>
  </div>

</body>
</html>
