<?php 
include 'ResearcherHeader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Submissions</title>
  <link rel="stylesheet" href="css/Researcher.css" />
  <style>
   

   

    
  </style>
</head>
<body>
 

  <div class="submission-content">
    <div class="submission-header">My Submissions</div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>Date Submitted</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example row -->
          <tr>
            <td>Deep Learning for Healthcare</td>
            <td>2025-05-18</td>
            <td><span class="status pending">Pending</span></td>
            <td class="action-buttons">
              <button class="view-btn">View</button>
              <button class="delete-btn">Delete</button>
            </td>
          </tr>

          <tr>
            <td>AI in Agriculture</td>
            <td>2025-04-28</td>
            <td><span class="status approved">Approved</span></td>
            <td class="action-buttons">
              <button class="view-btn">View</button>
              <button class="delete-btn">Delete</button>
            </td>
          </tr>

          <tr>
            <td>Smart Traffic Management</td>
            <td>2025-03-12</td>
            <td><span class="status rejected">Rejected</span></td>
            <td class="action-buttons">
              <button class="view-btn">View</button>
              <button class="delete-btn">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
