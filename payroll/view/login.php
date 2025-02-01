<?php
include "../control/logincontrol.php";  // Include the login control file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Login Form</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="form-container">
        <div class="logo"></div>
        <h1 class="textlogin">Login Form</h1>
        <hr>
        <form method="post" action="../control/logincontrol.php">
            <table>
                <tr>
                    <td>
                        <label for="username" class="textuser">Username:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="username" name="username" placeholder="Enter your username" value="<?php echo htmlspecialchars($username); ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password" class="textuser">Password:</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo htmlspecialchars($password); ?>">
                    </td>
                </tr>
            </table>
            <button type="submit" name="login" id="login" value="login">Login</button>
            <a href="#">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
