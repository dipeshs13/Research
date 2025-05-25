<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Approved Papers</title>
  <link rel="stylesheet" href="../css/admin.css" />
  <style>
    
    
  </style>
</head>
<body>

 <?php
include 'adminheader.php';

?>
  

  <!-- Main Content -->
  <div class="approvedmain-content">
    <div class="page-title">Approved Papers</div>

    <div class="approved-table">
      <h3>List of Approved Research Papers</h3>
      <table id="approvedPapersTable">
        <thead>
          <tr>
            <th class="approved-paper-heading">Title</th>
            <th class="approved-paper-heading">Researcher</th>
            <th class="approved-paper-heading">Approved On</th>
            <th class="approved-paper-heading">File</th>
            <th class="approved-paper-heading">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example row -->
          <tr>
            <td class="approved-paper-content">Climate Change and AI</td>
            <td class="approved-paper-content">Dr. Alex Rai</td>
            <td class="approved-paper-content">2025-05-23</td>
            <td class="approved-paper-content"><a href="../PDF/Climate_AI.pdf" target="_blank" class="appbtn appbtn-view">View</a></td>
            <td class="appaction-btns approved-paper-content">
              <button class="btn appbtn-revoke">Revoke</button>
            </td>
          </tr>
          <!-- Repeat this row using PHP dynamically -->
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
