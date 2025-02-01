<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/deleteuser.css">
    <title>Delete Payroll Record</title>
</head>
<body>
    <h1>Delete Payroll Record</h1>
    
    <form action="../control/deleteuser_control.php" method="post">
        <label for="id">Enter Payroll ID to Delete:</label>
        <input type="number" name="id" required>
        <input type="submit" value="Delete" name="delete">
    </form>

    <?php
    if (isset($_GET['message'])) {
        echo "<p>{$_GET['message']}</p>";
    }
    ?>
</body>
</html>
