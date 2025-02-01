<?php
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
} else {
    header("Location: user_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User Confirmation</title>
    <link rel="stylesheet" href="../css/delete.css">
</head>
<body>
    <div class="confirmation-container">
        <h1>Are you sure you want to delete this user?</h1>
        <div class="buttons">
            <a href="../control/deletecontrol.php?id=<?php echo $userId; ?>" class="btn btn-yes">Yes</a>
            <a href="user_dashboard.php" class="btn btn-no">No</a>
        </div>
    </div>
</body>
</html>