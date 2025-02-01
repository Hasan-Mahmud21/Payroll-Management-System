<?php
include "../model/db.php";  // Include the DBConfig file

// Check if the user ID is passed in the URL
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']); // Ensure the ID is an integer for safety

    // Create a DBConfig object and fetch user data by ID
    $db = new DBConfig();
    $results = $db->getUserByID($userId);

    if ($results && $results->num_rows > 0) {
        // Fetch user details
        $user = $results->fetch_assoc();
        $name = $user['name'];
        $username = $user['username'];
        $email = $user['email'];
        $role = $user['role'];
        $status = $user['status'];
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid ID provided.";
    exit;
}

// Check if the form is submitted to update the user details
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Collect form data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    // Validate input fields
    if (empty($name) || empty($username) || empty($email) || $role == "Select Role" || $status == "Select Status") {
        echo "All fields are required. Please go back and fill out the form.";
        exit;
    } else {
        // Create a DBConfig object and call the editUser function
        $message = $db->editUser($userId, $name, $username, $email, $role, $status);

        // Display the result
        if ($message == "User updated successfully!") {
            // Redirect to user list after successful update
            header("Location: ../view/user_dashboard.php");
            exit;
        } else {
            echo $message;
        }
    }
}
?>