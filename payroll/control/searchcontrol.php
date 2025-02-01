<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include "../model/db.php"; 
    $db = new DBConfig();

    // Get search query if it exists
    if (isset($_GET['searchQuery'])) {
        $searchQuery = $_GET['searchQuery'];
        // Fetch users based on search query
        $users = $db->searchUsers($searchQuery);
    } else {
        // Fetch all users if no search query
        $users = $db->getAllUsers();
    }

    // Generate HTML for the table rows
    if ($users) {
        foreach ($users as $user) {
            echo "<tr>
                    <td>{$user['id']}</td>
                    <td>{$user['name']}</td>
                    <td>{$user['username']}</td>
                    <td>{$user['email']}</td>
                    <td>{$user['role']}</td>
                    <td>{$user['status']}</td>
                    <td>{$user['created_on']}</td>
                    <td>
                        <button class='edit-user'>
                            <a href='edituser.php?id={$user['id']}'>Edit</a>
                        </button>
                        <button class='delete-user'>
                            <a href='delete.php?id={$user['id']}'>Delete</a>
                        </button>
                        <button class='change-password'>
                            <a href='changepassword.php?id={$user['id']}'>Change Password</a>
                        </button>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No users found</td></tr>";
    }
}
?>