<?php
session_start();
include "../model/db.php";
$username = "";
$password = "";

if (isset($_POST['login'])) {
    $db = new DBConfig(); // Instantiate the DBConfig class
    $username = $_POST['username']; // Get username
    $password = $_POST['password']; // Get password
    //echo $_POST['password'];
    // Call the login function
    $user = $db->login($username, $password);
}
?>
