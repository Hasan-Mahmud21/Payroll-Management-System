<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payroll</title>
    <link rel="stylesheet" href="../css/mycss.css">
</head>
<body>
    <h1>Edit Payroll</h1>

    <form action="update_payroll.php" method="POST">
        <!-- Payroll ID (Read-Only) -->
        <label for="payroll_id">Payroll ID:</label>
        <input type="text" id="payroll_id" name="payroll_id" readonly>
        <br><br>

        <!-- Employee ID (Read-Only) -->
        <label for="employee_id">Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id" readonly>
        <br><br>

        <!-- Basic Salary -->
        <label for="basic_salary">Basic Salary:</label>
        <input type="number" id="basic_salary" name="basic_salary" step="0.01" required>
        <br><br>

        <!-- Bonus -->
        <label for="bonus">Bonus:</label>
        <input type="number" id="bonus" name="bonus" step="0.01">
        <br><br>

        <!-- Deduction -->
        <label for="deduction">Deduction:</label>
        <input type="number" id="deduction" name="deduction" step="0.01">
        <br><br>

        <!-- Net Salary (Read-Only) -->
        <label for="net_salary">Net Salary:</label>
        <input type="number" id="net_salary" name="net_salary" step="0.01" readonly>
        <br><br>

        <!-- Payment Date -->
        <label for="payment_date">Payment Date:</label>
        <input type="date" id="payment_date" name="payment_date" required>
        <br><br>

        <!-- Submit Button -->
        <button type="submit">Update Payroll</button>
    </form>
</body>
</html>
