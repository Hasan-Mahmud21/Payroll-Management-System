// JavaScript validation for the Payroll form
function validatePayrollForm() {
    // Get form fields
    const payrollId = document.getElementById("payroll_id");
    const userId = document.getElementById("user_id");
    const basicSalary = document.getElementById("basic_salary");
    const bonus = document.getElementById("bonus");
    const deduction = document.getElementById("deduction");
    const netSalary = document.getElementById("net_salary");
    const paymentDate = document.getElementById("payment_date");

    // Get error message spans
    const payrollIdError = document.getElementById("payroll_id_error");
    const userIdError = document.getElementById("user_id_error");
    const basicSalaryError = document.getElementById("basic_salary_error");
    const bonusError = document.getElementById("bonus_error");
    const deductionError = document.getElementById("deduction_error");
    const paymentDateError = document.getElementById("payment_date_error");

    // Flag to track validation status
    let isValid = true;

    // Clear previous error messages
    payrollIdError.innerHTML = "";
    userIdError.innerHTML = "";
    basicSalaryError.innerHTML = "";
    bonusError.innerHTML = "";
    deductionError.innerHTML = "";
    paymentDateError.innerHTML = "";

    // Validate Payroll ID
    if (payrollId.value.trim() === "") {
        payrollIdError.innerHTML = "Payroll ID is required.";
        isValid = false;
    }

    // Validate User ID
    if (userId.value.trim() === "") {
        userIdError.innerHTML = "User ID is required.";
        isValid = false;
    }

    // Validate Basic Salary
    if (basicSalary.value.trim() === "" || isNaN(basicSalary.value) || parseFloat(basicSalary.value) <= 0) {
        basicSalaryError.innerHTML = "Basic Salary must be a positive number.";
        isValid = false;
    }

    // Validate Bonus (optional, but must be a valid number if provided)
    if (bonus.value.trim() !== "" && (isNaN(bonus.value) || parseFloat(bonus.value) < 0)) {
        bonusError.innerHTML = "Bonus must be a non-negative number.";
        isValid = false;
    }

    // Validate Deduction (optional, but must be a valid number if provided)
    if (deduction.value.trim() !== "" && (isNaN(deduction.value) || parseFloat(deduction.value) < 0)) {
        deductionError.innerHTML = "Deduction must be a non-negative number.";
        isValid = false;
    }

    // Validate Payment Date
    if (paymentDate.value.trim() === "") {
        paymentDateError.innerHTML = "Payment Date is required.";
        isValid = false;
    }

    //  calculate the Net Salary
    if (isValid) {
        const basic = parseFloat(basicSalary.value);
        const bon = bonus.value.trim() === "" ? 0 : parseFloat(bonus.value);
        const ded = deduction.value.trim() === "" ? 0 : parseFloat(deduction.value);
        netSalary.value = (basic + bon - ded).toFixed(2);
    }

    // Prevent form submission if validation fails
    return isValid;
}
