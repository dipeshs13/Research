<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Manage Users</title>
  <link rel="stylesheet" href="../css/admin.css">
  <style>
   

 
  </style>
</head>
<body>


<?php
require_once '../includes/dbh.inc.php';
include 'paperdata.classes.php';
$Paperdata = new Paperdata_classes();
$Users = $Paperdata->getUser(); // Fetch all users
 include 'adminheader.php';
  ?>
  <!-- Main Content -->
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
        <!-- Example user rows -->
         <?php foreach($Users as $User):?>
        <tr>
          <td><?php echo $User['u_firstname'] ?></td>
          <td><?php echo $User['u_lastname'] ?></td>
          <td><?php echo $User['u_email'] ?></td>
          <!-- <td><span class="role-researcher">Researcher</span></td> -->
          <!-- <td><a href="ViewUser.php?id=1" class="usraction-btn">View</a></td> -->
        </tr>
        
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
