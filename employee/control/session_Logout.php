<?php
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect the user to the login page
header("Location:../view/employee.php");
exit;
?>