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
   
    

    
  </style>
</head>
<body>
  

  <div class="citations-content">
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
