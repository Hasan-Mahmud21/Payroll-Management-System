<?php
include '../control/showuser_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User Payroll</title>
    <link rel="stylesheet" href="../css/showuser.css">
</head>
<body>
    <header class="page-heading">
        <h1>User Payroll Information</h1>
    </header>

    <a href="../control/session_Logout.php" class="button-logout">Logout</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Basic Salary</th>
                <th>Bonus</th>
                <th>Deduction</th>
                <th>Net Salary</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($payrollData)) {
                foreach ($payrollData as $row) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['basic_salary']}</td>
                        <td>{$row['bonus']}</td>
                        <td>{$row['deduction']}</td>
                        <td>{$row['net_salary']}</td>
                        <td>{$row['payment_date']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No payroll records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
