<?php
include "../model/db.php"; // Include the DBConfig class

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? '';
    $status = $_POST['status'] ?? '';

    // Input validation
    if (empty($name) || empty($username) || empty($email) || empty($password) || $role === '' || $status === '') {
        echo "All fields are required!";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Password hashing
    $password = password_hash($password, PASSWORD_BCRYPT);

    // Create DBConfig instance
    $db = new DBConfig();
    $message = $db->insertUser($name, $username, $email, $password, $role, $status);
    if ($message == "New user added successfully!") {
        header("Location: ../view/user_dashboard.php");
        exit;
    } else {
        echo $message;
    }
}
?>
