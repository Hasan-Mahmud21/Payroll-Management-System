<?php
session_start(); // Start session to retrieve errors
$errors = isset($_SESSION["errors"]) ? $_SESSION["errors"] : [];
$form_data = isset($_SESSION["form_data"]) ? $_SESSION["form_data"] : [];

// Clear session errors after displaying
unset($_SESSION["errors"]);
unset($_SESSION["form_data"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Report</title>
    <link rel="stylesheet" href="../css/mycss.css">
    <!-- Link JavaScript file -->
    <script src="../js/payroll_reportjs.js"></script>
    
</head>
<body>
    <header class="page-heading">
        <h1>Payroll Report</h1>
    </header>

    <!-- Display errors if there are any -->
    <?php if (!empty($errors)): ?>
        <div class="error-messages">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form id="payroll-report-form" action="../control/process_payroll_report.php" method="POST">
    <div class="form-group">
        <label for="report-type">Report Type:</label>
        <select id="report-type" name="report-type" class="input-field" required>
            <option value="">Select Report Type</option>
            <option value="monthly">Monthly</option>
            <option value="quarterly">Quarterly</option>
            <option value="yearly">Yearly</option>
        </select>
        <span class="error-message" id="report-type-error"></span>
    </div>

    <div class="form-group">
        <label for="start-date">Start Date:</label>
        <input type="date" id="start-date" name="start-date" class="input-field" required>
        <span class="error-message" id="start-date-error"></span>
    </div>

    <div class="form-group">
        <label for="end-date">End Date:</label>
        <input type="date" id="end-date" name="end-date" class="input-field" required>
        <span class="error-message" id="end-date-error"></span>
    </div>

    <div class="form-group">
        <label for="department">Department:</label>
        <select id="department" name="department" class="input-field">
            <option value="">Select Department</option>
            <option value="all">All Departments</option>
            <option value="hr">HR</option>
            <option value="finance">Finance</option>
            <option value="it">IT</option>
            <option value="sales">Sales</option>
        </select>
        <span class="error-message" id="department-error"></span>
    </div>

    <button type="submit">Generate Report</button>
</form>





    <div class="export-options">
        <button onclick="exportToPDF()">Export to PDF</button>
    </div>
</body>
</html>
