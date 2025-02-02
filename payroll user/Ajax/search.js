document.addEventListener("DOMContentLoaded", function () {
    loadPayrollData(""); // Load all records when the page loads
});

document.getElementById("searchButton").addEventListener("click", function () {
    const searchQuery = document.getElementById("searchBar").value.trim();
    loadPayrollData(searchQuery);
});

document.getElementById("searchBar").addEventListener("keyup", function () {
    const searchQuery = document.getElementById("searchBar").value.trim();
    loadPayrollData(searchQuery);
});

function loadPayrollData(searchQuery) {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("payrollTable").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", `../control/search_payroll.php?searchQuery=${encodeURIComponent(searchQuery)}`, true);
    xhttp.send();
}
