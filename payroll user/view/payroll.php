<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll</title>
    <link rel="stylesheet" href="../css/mycss.css">
    <script src="../js/myjs.js" defer></script>
</head>
<body>
    <!-- Page Heading -->
    <header class="page-heading">
        <h1>Payroll Information</h1>
    </header>

    <!-- Payroll Form -->
    <form action="../control/process_payroll.php" method="POST" onsubmit="return validatePayrollForm()">
        <!-- Form Group for Payroll ID -->
        <div class="form-group">
            <label for="payroll_id">ID:</label>
            <input type="text" id="payroll_id" name="payroll_id" class="input-field" required>
            <span class="error-message" id="payroll_id_error"></span>
        </div>

        <!-- Form Group for User ID -->
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" id="user_id" name="user_id" class="input-field" required>
            <span class="error-message" id="user_id_error"></span>
        </div>

        <!-- Form Group for Basic Salary -->
        <div class="form-group">
            <label for="basic_salary">Basic Salary:</label>
            <input type="number" id="basic_salary" name="basic_salary" class="input-field" step="0.01" required>
            <span class="error-message" id="basic_salary_error"></span>
        </div>

        <!-- Form Group for Bonus -->
        <div class="form-group">
            <label for="bonus">Bonus:</label>
            <input type="number" id="bonus" name="bonus" class="input-field" step="0.01">
            <span class="error-message" id="bonus_error"></span>
        </div>

        <!-- Form Group for Deduction -->
        <div class="form-group">
            <label for="deduction">Deduction:</label>
            <input type="number" id="deduction" name="deduction" class="input-field" step="0.01">
            <span class="error-message" id="deduction_error"></span>
        </div>

        <!-- Form Group for Net Salary -->
        <div class="form-group">
            <label for="net_salary">Net Salary:</label>
            <input type="number" id="net_salary" name="net_salary" class="input-field" step="0.01" readonly>
            <span class="error-message" id="net_salary_error"></span>
        </div>

        <!-- Form Group for Payment Date -->
        <div class="form-group">
            <label for="payment_date">Payment Date:</label>
            <input type="date" id="payment_date" name="payment_date" class="input-field" required>
            <span class="error-message" id="payment_date_error"></span>
        </div>

        <!-- Submit Button -->
        <button type="submit">Submit Payroll</button>
    </form>
</body>
</html>