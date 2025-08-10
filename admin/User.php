<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Users</title>
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<?php
require_once '../includes/dbh.inc.php';
include 'paperdata.classes.php';
include '../classes/Delete.classes.php'; // include the delete class

$Paperdata = new Paperdata_classes();
$Users = $Paperdata->getUser(); // Fetch all users
include 'adminheader.php';

// Handle delete request
if (isset($_GET['delete_user'])) {
    $userId = intval($_GET['delete_user']);
    $deleteObj = new Delete();
    $deleted = $deleteObj->deleteUser($userId); // your function to delete
    
    if ($deleted) {
        echo "<script>
                alert('User deleted successfully!');
                window.location.href = 'User.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Failed to delete user. Please try again.');</script>";
    }
}
?>

<div class="usrmain-content">
    <div class="page-title">Manage Users</div>

    <table class="user-table">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($Users as $User): ?>
        <tr>
          <td><?php echo htmlspecialchars($User['u_firstname']); ?></td>
          <td><?php echo htmlspecialchars($User['u_lastname']); ?></td>
          <td><?php echo htmlspecialchars($User['u_email']); ?></td>
          <td>
            <a href="User.php?delete_user=<?php echo $User['u_id']; ?>" 
               onclick="return confirm('Are you sure you want to delete this user?')" 
               class="usraction-btn" 
               style="color:white; background-color: #f44336;">
               Delete
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>

</body>
</html>
