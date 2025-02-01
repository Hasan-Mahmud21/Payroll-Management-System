// JavaScript validation for the Payroll Report form
function validatePayrollReportForm() {
    // Get form fields
    const reportType = document.getElementById("report-type");
    const startDate = document.getElementById("start-date");
    const endDate = document.getElementById("end-date");
    const department = document.getElementById("department");

    // Get error message spans
    const reportTypeError = document.getElementById("report-type-error");
    const startDateError = document.getElementById("start-date-error");
    const endDateError = document.getElementById("end-date-error");
    const departmentError = document.getElementById("department-error");

    // Flag to track validation status
    let isValid = true;

    // Clear previous error messages
    reportTypeError.innerHTML = "";
    startDateError.innerHTML = "";
    endDateError.innerHTML = "";
    departmentError.innerHTML = "";

    // Validate Report Type
    if (!reportType.value) {
        reportTypeError.innerHTML = "Report type is required.";
        isValid = false;
    }

    // Validate Start Date
    if (!startDate.value) {
        startDateError.innerHTML = "Start date is required.";
        isValid = false;
    }

    // Validate End Date
    if (!endDate.value) {
        endDateError.innerHTML = "End date is required.";
        isValid = false;
    } else if (startDate.value && endDate.value < startDate.value) {
        endDateError.innerHTML = "End date cannot be earlier than the start date.";
        isValid = false;
    }

    // Validate Department
    if (!department.value) {
        departmentError.innerHTML = "Department is required.";
        isValid = false;
    }

    // Prevent form submission if validation fails
    return isValid;
}

// Attach the validation function to the form submission event
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("payroll-report-form");

    if (form) {
        form.onsubmit = function () {
            return validatePayrollReportForm();
        };
    }
});
