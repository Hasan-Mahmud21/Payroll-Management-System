<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="../css/edit.css"> <!-- Link to CSS -->
</head>

<body>
    <h1>Edit User</h1>
    <form action="../control/edituser_control.php" method="post">
        <table>
            <tr>
                <td><label for="id">ID:</label></td>
                <td><input type="number" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>">
            </tr>

            <tr>
                <td><label for="userid">User ID:</label></td>
                <td><input type="number" id="userid" name="userid" value="<?php echo htmlspecialchars($userid); ?>" required></td>
            </tr>

            <tr>
                <td><label for="fromdate">From Date:</label></td>
                <td><input type="date" id="fromdate" name="fromdate" value="<?php echo htmlspecialchars($fromdate); ?>"></td>
            </tr>

            <tr>
                <td><label for="todate">To Date:</label></td>
                <td><input type="date" id="todate" name="todate" value="<?php echo htmlspecialchars($todate); ?>"></td>
            </tr>

            <tr>
                <td><label for="start_time">Start Time:</label></td>
                <td><input type="time" id="start_time" name="start_time" value="<?php echo htmlspecialchars($start_time); ?>" ></td>
            </tr>

            <tr>
                <td><label for="end_time">End Time:</label></td>
                <td><input type="time" id="end_time" name="end_time" value="<?php echo htmlspecialchars($end_time); ?>" ></td>
            </tr>

            <tr>
                <td><label for="shift_time">Shift Time:</label></td>
                <td><input type="number" id="shift_time" name="shift_time" value="<?php echo htmlspecialchars($shift_time); ?>"></td>
            </tr>
        </table>

        <input type="submit" value="Update" name="update">
    </form>

    <a href="showuser.php">
        <button class="redirect-button">Back to User List</button>
    </a>
</body>

</html>
