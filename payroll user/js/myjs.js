function validatePayrollForm() {
    var payrollId = document.getElementById("payroll_id").value;
    var userId = document.getElementById("user_id").value;
    var basicSalary = document.getElementById("basic_salary").value;
    var bonus = document.getElementById("bonus").value;
    var deduction = document.getElementById("deduction").value;
    var paymentDate = document.getElementById("payment_date").value;

    var isValid = true;

    // Validate Payroll ID
    if (payrollId.trim() === "") {
        alert("Payroll ID is required.");
        isValid = false;
    }

    // Validate User ID
    if (userId.trim() === "") {
        alert("User ID is required.");
        isValid = false;
    }

    // Validate Basic Salary
    if (basicSalary.trim() === "" || isNaN(basicSalary) || Number(basicSalary) <= 0) {
        alert("Enter a valid Basic Salary (greater than 0).");
        isValid = false;
    }

    // Validate Bonus (optional, but must be a valid number if entered)
    if (bonus.trim() !== "" && (isNaN(bonus) || Number(bonus) < 0)) {
        alert("Bonus must be a positive number.");
        isValid = false;
    }

    // Validate Deduction (optional, but must be a valid number if entered)
    if (deduction.trim() !== "" && (isNaN(deduction) || Number(deduction) < 0)) {
        alert("Deduction must be a positive number.");
        isValid = false;
    }

    // Validate Payment Date
    if (paymentDate.trim() === "") {
        alert("Payment Date is required.");
        isValid = false;
    }

    return isValid;
}
