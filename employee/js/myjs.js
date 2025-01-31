function demoFunction() {
    document.getElementById('print').innerHTML = 'EMPLOYEE DETAILS';
}

function validateForm() {
    var isValid = true;

    // var Name = document.getElementById('f_name').value.trim();
    // var email = document.getElementById('e_name').value.trim();
    // var phone = document.getElementById('phoneNumber').value.trim();
    // var Address = document.getElementById('address').value.trim();
    // var DOB = document.getElementById('dob').value;
    // var Gender = document.querySelector('input[name="gender"]:checked'); // Fix for gender selection
    // var Nid = document.getElementById('nid').value.trim();
    // var Userid = document.getElementById('userid').value.trim();
    // var Emprole = document.getElementById('emprole').value;
    // var profile_Picture = document.getElementById('profile_picture').files.length; // Fix for file 
    


    var Name = document.getElementById('f_name').value.trim();
    var email = document.getElementById('e_name').value.trim();
    var phone = document.getElementById('phoneNumber').value.trim();
    var Address = document.getElementById('address').value.trim();
    var DOB = document.getElementById('dob').value;
    var Gender = document.querySelector('input[name="gender"]:checked');
    var Nid = document.getElementById('nid').value.trim();
    var Userid = document.getElementById('userid').value.trim();
    var Emprole = document.getElementById('emprole').value;
    var profile_Picture = document.getElementById('profile_picture').value;

    // Name Validation
    if (Name === "") {
        showErrorMessage('f_name', 'Name is required');
        isValid = false;
    } else if (!/^[a-zA-Z]+$/.test(Name)) {
        showErrorMessage('f_name', 'Name must only contain alphabets');
        isValid = false;
    } else if (!/[A-Z]/.test(Name)) {
        showErrorMessage('f_name', 'Name must contain at least one uppercase letter');
        isValid = false;
    }

    // Email Validation
    if (email === "") {
        showErrorMessage('e_name', 'Email is required');
        isValid = false;
    } else if (!validateEmail(email)) {
        showErrorMessage('e_name', 'Invalid email format');
        isValid = false;
    } else if (!email.endsWith('.xyz')) {
        showErrorMessage('e_name', 'Email must contain the .xyz domain');
        isValid = false;
    }

    // Phone Number Validation
    if (phone === "") {
        showErrorMessage('phoneNumber', 'Phone Number is required');
        isValid = false;
    } else if (!/^\d+$/.test(phone)) {
        showErrorMessage('phoneNumber', 'Phone number must only contain digits');
        isValid = false;
    }

    // Address Validation
    if (Address === "") {
        showErrorMessage('address', 'Address is required');
        isValid = false;
    }

    // DOB Validation
    if (DOB === "") {
        showErrorMessage('dob', 'Date of Birth is required');
        isValid = false;
    }

    // Gender Validation
    if (!Gender) {
        showErrorMessage('gender-male', 'Gender is required'); // Show error near first radio button
        isValid = false;
    }

    // NID Validation
    if (Nid === "") {
        showErrorMessage('nid', 'NID is required');
        isValid = false;
    }

    // User ID Validation
    if (Userid === "") {
        showErrorMessage('userid', 'User ID is required');
        isValid = false;
    } else if (!validateUserid(Userid)) {
        showErrorMessage('userid', 'User ID must only contain digits');
        isValid = false;
    } else if (Userid.length < 6) {
        showErrorMessage('userid', 'User ID must be at least 6 characters long');
        isValid = false;
    }

    // Employee Role Validation
    if (Emprole === "") {
        showErrorMessage('emprole', 'Please select an Employee Role');
        isValid = false;
    }

    // Profile Picture Validation
    if (profile_Picture === 0) {
        showErrorMessage('profile_picture', 'Please upload a profile picture');
        isValid = false;
    }

    return isValid;
}

// Function to show error messages
function showErrorMessage(inputId, message) {
    var inputField = document.getElementById(inputId);
    var errorSpan = inputField.nextElementSibling;
    if (errorSpan && errorSpan.classList.contains('error-message')) {
        errorSpan.innerText = message;
    }
}

// Email validation function
function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

// User ID validation function
function validateUserid(Userid) {
    return /^[0-9]+$/.test(Userid);
}
