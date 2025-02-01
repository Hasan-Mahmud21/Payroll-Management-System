<?php
include "../control/addusercontrol.php";  // Include the login control file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="../css/adduser.css">
    <script src="../js/adminvalidation.js" defer></script>
</head>
<body>
    <div class="form-container">
        <h1>User Registration Form</h1>
        <form method="POST" action="../control/addusercontrol.php" onsubmit="return validateForm()">
    <table>
        <tr>
            <td><label for="name">Name:</label></td>
            <td>
                <input type="text" id="name" name="name" placeholder="Enter your name">
                <span class="error-message"></span>

            </td>
        </tr>
        <tr>
            <td><label for="username">Username:</label></td>
            <td>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                <span class="error-message"></span>
            </td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td>
                <input type="email" id="email" name="email" placeholder="Enter your email">
                <span class="error-message"></span>
            </td>
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <span class="error-message"></span>
            </td>
        </tr>
        <tr>
            <td><label for="role">Role:</label></td>
            <td>
                <select id="role" name="role">
                    <option>Select Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="User">User</option>
                </select>
                <span class="error-message"></span>
            </td>
        </tr>
        <tr>
            <td><label for="status">Status:</label></td>
            <td>
                <select id="status" name="status">
                    <option>Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <span class="error-message"></span>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="submit">Submit</button>
                <button type="reset" name="clear">Clear</button>
            </td>
        </tr>
    </table>
</form>

    </div>
</body>
</html>
