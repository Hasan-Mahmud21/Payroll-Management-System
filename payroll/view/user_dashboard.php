<?php 
include "../control/user_dashboardcontrol.php"; // Include the UserDashboardControl
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Display App User</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="../css/table.css">
    <!-- Include the search.js file -->
    <script src="../ajex/search.js" defer></script>
</head>
<body>
    <div class="container">
        <!-- Search Bar Section -->
        <div class="search-bar">
            <input type="text" id="searchBar" placeholder="Search users...">
            <button id="searchButton">Search</button>
        </div>

        <!-- Add User Button -->
        <button class="add-user">
            <a href="adduser.php">+Add User</a>
        </button>

        <!-- User Table -->
        <table>
            <thead>
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created On</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($users && $users->num_rows > 0): ?>
                    <?php while ($row = $users->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['created_on']; ?></td>
                            <td>
                                <button class='edit-user'>
                                    <a href='edituser.php?id=<?php echo $row['id']; ?>'>Edit</a>
                                </button>
                                <button class='delete-user'>
                                    <a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
                                </button>
                                <button class='change-password'>
                                    <a href='changepassword.php?id=<?php echo $row['id']; ?>'>Change Password</a>
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan='8'>No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>