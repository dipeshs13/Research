<?php
session_start();
session_destroy();
header('location:index.php');
exit(); // or die();

// Check for any errors


?>