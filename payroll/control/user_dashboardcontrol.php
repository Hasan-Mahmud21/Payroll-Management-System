<?php
include "../model/db.php"; 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new DBConfig();
    $users = $db->getAllUsers(); // Fetch all users
}

?>