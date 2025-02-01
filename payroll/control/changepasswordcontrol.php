<?php
include "../model/db.php";

// changepasswordcontrol.php

session_start(); // Start the session to access session variables

// Check if the user is logged in by verifying the session
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirmpassword = isset($_POST['confirmpassword']) ? trim($_POST['confirmpassword']) : '';
    $response = '';

    if (empty($password) || empty($confirmpassword)) {
        $response = "Password fields cannot be empty.";
    } elseif ($password !== $confirmpassword) {
        $response = "Passwords do not match. Please try again.";
    } else {
        // Get the username from the session
        $username = $_SESSION['username']; // Assuming username is stored in session

        // Hash the password before updating
        $hashedPassword = md5($password); // Use md5 (not recommended)

        // Instantiate the DBConfig class and call updatePassword method
        $db = new DBConfig();
        $result = $db->updatePassword($username, $hashedPassword);

        if ($result) {
            $response = "Password changed successfully!";
        } else {
            $response = "Error updating password. Please try again.";
        }
    }

    // Show the response
    echo "<script>alert('$response');</script>";
}


?>
