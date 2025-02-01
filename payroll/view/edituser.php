<?php
include "../control/editusercontrol.php";  // Include the DBConfig file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/adduser.css">
</head>
<body>
    <div class="form-container">
        <h1>Edit User Form</h1>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter your name" required></td>
                </tr>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" value="<?php echo $username; ?>" placeholder="Enter your username" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email" required></td>
                </tr>
                <tr>
                    <td><label for="role">Role:</label></td>
                    <td>
                        <select id="role" name="role" required>
                            <option value="Admin" <?php echo ($role == "Admin") ? "selected" : ""; ?>>Admin</option>
                            <option value="Manager" <?php echo ($role == "Manager") ? "selected" : ""; ?>>Manager</option>
                            <option value="User" <?php echo ($role == "User") ? "selected" : ""; ?>>User</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select id="status" name="status" required>
                            <option value="Active" <?php echo ($status == "Active") ? "selected" : ""; ?>>Active</option>
                            <option value="Inactive" <?php echo ($status == "Inactive") ? "selected" : ""; ?>>Inactive</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" name="submit">save</button>
                        <a href="../view/user_dashboard.php">
                        <button type="button"name="clear">Back</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
