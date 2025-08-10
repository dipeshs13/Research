<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Researchers</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
    .delete-btn {
      background: #e74c3c;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .delete-btn:hover {
      background: #c0392b;
    }
  </style>
</head>
<body>

<?php 
require_once '../includes/dbh.inc.php';
include 'paperdata.classes.php';
include '../classes/Delete.classes.php'; // Your Delete class

$Paperdata = new Paperdata_classes();

// Handle delete request
if (isset($_POST['delete_btn']) && !empty($_POST['delete_id'])) {
    $researcherId = $_POST['delete_id'];
    $deleteObj = new Delete();
    $deleted = $deleteObj->deleteResearcher($researcherId);

    if ($deleted) {
        echo "<script>alert('Researcher deleted successfully.'); window.location.href='Researchers.php';</script>";
        exit;
    } else {
        echo "<script>alert('Failed to delete researcher.');</script>";
    }
}

// Fetch researchers
$Researchers = $Paperdata->getResearcher(); 
include 'adminheader.php';
?>

<!-- Main Content -->
<div class="remain-content">
  <div class="page-title">Manage Researchers</div>

  <table class="researcher-table">
    <thead>
      <tr>
        <th>Researcher Name</th>
        <th>Email</th>
        <th>Total Submissions</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($Researchers as $Researcher): ?>
      <tr>
        <td><?php echo htmlspecialchars($Researcher['r_fullname']); ?></td>
        <td><?php echo htmlspecialchars($Researcher['r_email']); ?></td>
        <td>
          <?php
            $rid = $Researcher['r_id'];
            $TotalSubmission = $Paperdata->TotalSubmittedPapers($rid);
            echo htmlspecialchars($TotalSubmission);
          ?>
        </td>
        <td>
          <form method="POST" style="display:inline;">
            <input type="hidden" name="delete_id" value="<?php echo $Researcher['r_id']; ?>">
            <button type="submit" name="delete_btn" class="delete-btn" onclick="return confirm('Are you sure you want to delete this researcher and all their papers?');">
              Delete
            </button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
