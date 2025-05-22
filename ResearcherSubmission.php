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
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
    }

   

    .main-content {
      flex: 1;
      background-color: #f4f4f4;
      padding: 30px;
    }

    .submission-header {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .table-container {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th,
    table td {
      padding: 12px 10px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    table th {
      background-color: #f0f0f0;
    }

    .status {
      padding: 5px 10px;
      border-radius: 5px;
      font-weight: bold;
    }

    .pending {
      background-color: #ffecb3;
      color: #a68c00;
    }

    .approved {
      background-color: #c8e6c9;
      color: #256029;
    }

    .rejected {
      background-color: #ffcdd2;
      color: #c62828;
    }

    .action-buttons button {
      padding: 6px 10px;
      margin-right: 5px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .view-btn {
      background-color: #007bff;
      color: white;
    }

    .delete-btn {
      background-color: #e53935;
      color: white;
    }

    .view-btn:hover {
      background-color: #0056b3;
    }

    .delete-btn:hover {
      background-color: #c62828;
    }
  </style>
</head>
<body>
 

  <div class="main-content">
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
