<?php 
include 'ResearcherHeader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Citations</title>
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

    .citations-header {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .citation-table-container {
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

    .view-btn {
      padding: 6px 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .view-btn:hover {
      background-color: #0056b3;
    }

    .chart-placeholder {
      margin-top: 30px;
      background: #e0e0e0;
      height: 250px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #555;
      border-radius: 10px;
      font-style: italic;
    }
  </style>
</head>
<body>
  

  <div class="main-content">
    <div class="citations-header">Citations Overview</div>

    <div class="citation-table-container">
      <table>
        <thead>
          <tr>
            <th>Paper Title</th>
            <th>Total Citations</th>
            <th>Last Cited On</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>AI in Education</td>
            <td>15</td>
            <td>2025-05-15</td>
            <td><button class="view-btn">View Citing Papers</button></td>
          </tr>
          <tr>
            <td>Blockchain in Healthcare</td>
            <td>8</td>
            <td>2025-04-30</td>
            <td><button class="view-btn">View Citing Papers</button></td>
          </tr>
          <tr>
            <td>IoT in Smart Cities</td>
            <td>0</td>
            <td>—</td>
            <td><button class="view-btn" disabled>View Citing Papers</button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="chart-placeholder">
      Citation trend graph (optional visualization)
    </div>
  </div>
</body>
</html>
