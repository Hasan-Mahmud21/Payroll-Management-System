<?php
include '../control/deleteuser_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <h1>Delete User</h1>
    
    <form action="../control/deleteuser_control.php" method="post">
        <label for="id">Enter ID to Delete:</label>
        <input type="number" name="id" required>
        <input type="submit" value="Delete" name="delete">
    </form>
</body>
</html>
