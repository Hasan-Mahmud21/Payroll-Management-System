function validateForm() {
    

    var isValid = true;
    var name = document.getElementById('name').value.trim();
    var username = document.getElementById('username').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();
    var role = document.getElementById('role').value;
    var status = document.getElementById('status').value;

    if (name === "") {
        showErrorMessage('name', 'Name is required');
        isValid = false;
    }
    if (username === "") {
        showErrorMessage('username', 'Username is required');
        isValid = false;
    }
    else if (!validateUsername(username)) {
        showErrorMessage('username', 'Username can only contain A-Z, a-z, and 0-9');
        isValid = false;
    }
    if (email === "") {
        showErrorMessage('email', 'Email is required');
        isValid = false;
    } else if (!validateEmail(email)) {
        showErrorMessage('email', 'Invalid email format');
        isValid = false;
    }
    if (password === "") {
        showErrorMessage('password', 'Password is required');
        isValid = false;
    } 
    else if (password.length < 6) {
        showErrorMessage('password', 'Password must be at least 6 characters');
        isValid = false;
    }
    if (role === "Select Role") {
        showErrorMessage('role', 'Please select a role');
        isValid = false;
    }
    if (status === "Select Status") {
        showErrorMessage('status', 'Please select a status');
        isValid = false;
    }

    return isValid;
}

function showErrorMessage(inputId, message) {
    var inputField = document.getElementById(inputId);
    var errorSpan = inputField.nextElementSibling;
    if (errorSpan && errorSpan.classList.contains('error-message')) {
        errorSpan.innerText = message;
    }
}


function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
function validateUsername(username) {
    const usernamePattern = /^[a-zA-Z0-9]+$/; 
    return usernamePattern.test(username);
}