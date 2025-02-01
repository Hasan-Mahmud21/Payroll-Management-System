<?php
include "../control/changepasswordcontrol.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/changepassword.css">
    
</head>
<body>
    <div class="form-container">
        <!-- Close button -->
        <button class="close-button" onclick="window.location.href='../view/user_dashboard.php';">&times;</button>
        <h1>Edit password</h1>
        <form method="POST" action="">
            <!-- Password Field -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">
            
            <!-- Confirm Password Field -->
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Enter your confirm password">
            
            <!-- Buttons -->
            <div style="text-align: center;">
                <button type="submit" name="submit">Change Password</button>
                <button type="button" onclick="window.location.href='../view/user_dashboard.php';">Back</button>
            </div>
        </form>
    </div>
</body>
</html>
