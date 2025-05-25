<?php 
require_once 'includes/dbh.inc.php';
include 'ResearcherHeader.php';
include 'classes/researcherdata.classes.php';
$researcherData = new Researcherdata_classes();
$researcherPapers = $researcherData->getPapers($researcherId);

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
          <?php if (!empty($researcherPapers)): ?>
            <?php foreach ($researcherPapers as $paper): ?>
              <tr>
                <td><?php echo $paper['p_title']; ?></td>
                <!-- <td><?php echo $paper['date_submitted']; ?></td> -->
                 <td>2025</td>
                <td>
                  <span class="status <?php echo $paper['status']; ?>">
                    <?php echo $paper['status']; ?>
                  </span>
                </td>
                <td class="action-buttons">
                  
                  <a href="PDF/<?php echo $paper['p_pdf'] ?>" target="_blank" class="view-btn">View</a>
              
                   <a href="" id="delete-btn" >Delete</a> 
                </td>
             
            </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4">No submissions found.</td>
            </tr>
          <?php endif; ?>
          

          

         
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
