<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    include "../model/db.php"; 
    $db = new DBConfig();
    $userId = $_GET['id'];

    // Delete user by ID
    $result = $db->deleteUser($userId);

    // Redirect back to the user dashboard with a success or error message
    header("Location: ../view/user_dashboard.php?message=" . urlencode($result));
    exit();
}
?>