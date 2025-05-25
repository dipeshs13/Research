<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>All Papers</title>
  <link rel="stylesheet" href="../css/admin.css" />
  <style>
    
    
  </style>
</head>
<body>

  <?php
include 'adminheader.php';

?>

  <!-- Main Content -->
  <div class="allmain-content">
    <div class="page-title">All Submitted Papers</div>

    <div class="allpaper-table">
      <table id="allPapersTable">
        <thead>
          <tr>
            <th class="allpaper-heading">Title</th>
            <th class="allpaper-heading">Author</th>
            <th class="allpaper-heading">Status</th>
            <th class="allpaper-heading">Submitted On</th>
            <th class="allpaper-heading">PDF</th>
          </tr>
        </thead>
        <tbody>
          <!-- Replace below with PHP loop -->
          <tr>
            <td class="allpaper-content">AI in Education</td>
            <td class="allpaper-content">John Sharma</td>
            <td class="allpaper-content"><span class="status-approved">Approved</span></td>
            <td class="allpaper-content">2025-05-20</td>
            <td class="allpaper-content"><a href="../PDF/AI_Education.pdf" target="_blank" class="allbtn-view">View</a></td>
          </tr>
          
          <!-- End loop -->
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
