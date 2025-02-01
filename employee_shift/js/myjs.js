document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("shiftForm");

    form.addEventListener("submit", (event) => {
        // Get form values
        //const id = document.getElementById("id").value.trim();
        const userid = document.getElementById("userid").value.trim();
        const fromDate = document.getElementById("fromDate").value;
        const toDate = document.getElementById("toDate").value;
        const startTime = document.getElementById("startTime").value;
        const endTime = document.getElementById("endTime").value;
        const shiftTime = document.getElementById("shiftTime").value.trim();

        // Clear previous errors
        let isValid = true;

        /* Validate ID
        if (id === "") {
            alert("ID is required.");
            isValid = false;
        } */

        // Validate User ID
        if (userid === "") {
            alert("User ID is required.");
            isValid = false;
        }

        // Validate From Date and To Date
        if (fromDate === "") {
            alert("From Date is required.");
            isValid = false;
        }
        if (toDate === "") {
            alert("To Date is required.");
            isValid = false;
        }
        if (fromDate && toDate && new Date(fromDate) > new Date(toDate)) {
            alert("From Date cannot be later than To Date.");
            isValid = false;
        }

        // Validate Start Time and End Time
        if (startTime === "") {
            alert("Start Time is required.");
            isValid = false;
        }
        if (endTime === "") {
            alert("End Time is required.");
            isValid = false;
        }
        if (startTime && endTime && startTime >= endTime) {
            alert("Start Time must be earlier than End Time.");
            isValid = false;
        }

        // Validate Shift Time
        if (shiftTime === "") {
            alert("Shift Time is required.");
            isValid = false;
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });
});
