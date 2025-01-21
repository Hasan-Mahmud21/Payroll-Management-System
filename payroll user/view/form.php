<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll</title>
    <link rel="stylesheet" href="../css/mystyle.css">
    <script src="../js/myjs.js" defer></script>
</head>
<body>
    <h1 class="legend">Payroll Information</h1>
    
    <form action="../control/process_payroll.php" method="POST" onsubmit="return validatePayrollForm()">
        <label for="payroll_id">ID:</label>
        <input type="text" id="payroll_id" name="payroll_id" required><br><br>

        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" class="input-field" required><br><br>

        <label for="basic_salary">Basic Salary:</label>
        <input type="number" id="basic_salary" name="basic_salary" class="input-field" step="0.01" required><br><br>

        <label for="bonus">Bonus:</label>
        <input type="number" id="bonus" name="bonus" class="input-field" step="0.01"><br><br>

        <label for="deduction">Deduction:</label>
        <input type="number" id="deduction" name="deduction" class="input-field" step="0.01"><br><br>

        <label for="net_salary">Net Salary:</label>
        <input type="number" id="net_salary" name="net_salary" class="input-field" step="0.01" readonly><br><br>

        <label for="payment_date">Payment Date:</label>
        <input type="date" id="payment_date" name="payment_date" class="input-field" required><br><br>

        <button type="submit">Submit Payroll</button>
    </form>
</body>
</html>
