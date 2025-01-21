<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize an array to store errors
    $errors = [];

    // Retrieve form data and validate it
    $payroll_id = trim($_POST['payroll_id']);
    $user_id = trim($_POST['user_id']);
    $basic_salary = trim($_POST['basic_salary']);
    $bonus = trim($_POST['bonus']);
    $deduction = trim($_POST['deduction']);
    $payment_date = trim($_POST['payment_date']);

    // Validate Payroll ID
    if (empty($payroll_id)) {
        $errors[] = "Payroll ID is required.";
    } elseif (!ctype_digit($payroll_id)) {
        $errors[] = "Payroll ID must be a numeric value.";
    }

    // Validate User ID
    if (empty($user_id)) {
        $errors[] = "User ID is required.";
    } elseif (!ctype_digit($user_id)) {
        $errors[] = "User ID must be a numeric value.";
    }

    // Validate Basic Salary
    if (empty($basic_salary)) {
        $errors[] = "Basic Salary is required.";
    } elseif (!is_numeric($basic_salary) || $basic_salary < 0) {
        $errors[] = "Basic Salary must be a positive number.";
    }

    // Validate Bonus
    if (!empty($bonus) && (!is_numeric($bonus) || $bonus < 0)) {
        $errors[] = "Bonus must be a positive number.";
    }

    // Validate Deduction
    if (!empty($deduction) && (!is_numeric($deduction) || $deduction < 0)) {
        $errors[] = "Deduction must be a positive number.";
    }

    // Validate Payment Date
    if (empty($payment_date)) {
        $errors[] = "Payment Date is required.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $payment_date)) {
        $errors[] = "Payment Date must be in the format YYYY-MM-DD.";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        echo "<h1>Form Submission Failed</h1>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
    } else {
        // Calculate Net Salary in PHP
        $bonus = !empty($bonus) ? (float)$bonus : 0;
        $deduction = !empty($deduction) ? (float)$deduction : 0;
        $net_salary = (float)$basic_salary + $bonus - $deduction;

        // Display the submitted data
        echo "<h1>Form Submitted Successfully</h1>";
        echo "<p>Payroll ID: $payroll_id</p>";
        echo "<p>User ID: $user_id</p>";
        echo "<p>Basic Salary: $basic_salary</p>";
        echo "<p>Bonus: $bonus</p>";
        echo "<p>Deduction: $deduction</p>";
        echo "<p>Net Salary: $net_salary</p>";
        echo "<p>Payment Date: $payment_date</p>";
    }
} else {
    // If accessed without form submission, redirect to the form page
    header('Location: payroll_form.html');
    exit();
}
?>
