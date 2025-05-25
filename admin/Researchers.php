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

<?php include 'adminheader.php' ?>

  <!-- Main Content -->
  <div class="remain-content">
    <div class="page-title">Manage Researchers</div>

    <table class="researcher-table">
      <thead>
        <tr>
          <th>Researcher Name</th>
          <th>Email</th>
          <th>Total Submissions</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Sample Data Rows -->
        <tr>
          <td>Anish Sharma</td>
          <td>anish@example.com</td>
          <td>4</td>
          <td><span class="restatus-approved">Active</span></td>
          <td>
            <a href="ViewResearcher.php?id=1" class="reaction-btn">View</a>
          </td>
        </tr>
        
        
      </tbody>
    </table>
  </div>

</body>
</html>
