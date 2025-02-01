<?php
session_start(); // Start session to store errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate Report Type
    $validReportTypes = ["monthly", "quarterly", "yearly"];
    if (!isset($_POST["report-type"]) || !in_array($_POST["report-type"], $validReportTypes)) {
        $errors["report-type"] = "Invalid report type.";
    } else {
        $reportType = $_POST["report-type"];
    }

    // Validate Start Date
    if (empty($_POST["start-date"])) {
        $errors["start-date"] = "Start date is required.";
    } else {
        $startDate = $_POST["start-date"];
        if (!strtotime($startDate)) {
            $errors["start-date"] = "Invalid start date format.";
        }
    }

    // Validate End Date
    if (empty($_POST["end-date"])) {
        $errors["end-date"] = "End date is required.";
    } else {
        $endDate = $_POST["end-date"];
        if (!strtotime($endDate)) {
            $errors["end-date"] = "Invalid end date format.";
        } elseif (!empty($startDate) && $endDate < $startDate) {
            $errors["end-date"] = "End date cannot be earlier than start date.";
        }
    }

    // Validate Department
    $validDepartments = ["all", "hr", "finance", "it", "sales"];
    if (!isset($_POST["department"]) || !in_array($_POST["department"], $validDepartments)) {
        $errors["department"] = "Invalid department selection.";
    } else {
        $department = $_POST["department"];
    }

    // If errors exist, redirect back to the form with error messages
    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        $_SESSION["form_data"] = $_POST; // Store input values so they don't get lost
        header("Location: ../view/payroll_report.php");
        exit();
    }

    // If no errors, proceed with report generation (replace this with actual logic)
    echo "<p>Report generated successfully for <strong>$reportType</strong> from <strong>$startDate</strong> to <strong>$endDate</strong> (Department: $department).</p>";
}
?>
