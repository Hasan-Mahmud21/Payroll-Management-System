<html>
<head>
    <link rel="stylesheet" href="../css/mystyle.css">
    <script src="../js/myjs.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
    <!-- Include the search.js file -->
    <script src="../ajax/search.js" defer></script>
    <h1 id='printt'>Employee Information</h1><br>
</head>
<body>
    <div class="container">
        <!-- Search Bar Section, placed at top right -->
        <div class="search-bar">
            <input type="text" id="searchBar" placeholder="Search users...">
            <button id="searchButton">Search</button>
        </div>    
        <!-- ADD Button -->
    <a href="../control/session_Logout.php" class="button-logout">Add</a>

        <?php
        // Database connection
        require '../model/db.php';
        $mydb = new myDB();
        $conobj = $mydb->openCon();
        
        // SQL to fetch all records (or filter based on search)
        $results = $mydb->showAll("SELECT * FROM emptable", $conobj);

        // Check if there are records
        if ($results->num_rows > 0) {
            echo "<table border='1'>";
            echo "<thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>NID Number</th>
                        <th>User ID</th>
                        <th>Employee Role</th>
                        <th>Profile Picture</th>
                        <th>Actions</th>
                    </tr>
                </thead>";
            echo "<tbody>";

            // Loop through records
            foreach ($results as $data) {
                echo "<tr>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['f_name'] . "</td>";
                echo "<td>" . $data['e_name'] . "</td>";
                echo "<td>" . $data['phoneNumber'] . "</td>";
                echo "<td>" . $data['address'] . "</td>";
                echo "<td>" . $data['dob'] . "</td>";
                echo "<td>" . $data['gender'] . "</td>";
                echo "<td>" . $data['nid'] . "</td>";
                echo "<td>" . $data['userid'] . "</td>";
                echo "<td>" . $data['emprole'] . "</td>";
                echo "<td><img src='../uploadfile/" . $data['profile_picture'] . "' alt='Profile Picture' loading='lazy' width='50px' height='50px'></td>";
                echo "<td>
                        <a class='button-update' href='../view/edituser.php?id=" . $data["id"] . "'>Update</a>
                        <a class='button-delete' href='../view/deleteuser.php?id=" . $data["id"] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }

            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No records found.";
        }
        ?>
    </div>
    <!-- ADD Button
    <a href="../control/session_Logout.php" class="button-logout">Add</a> -->
</body>
</html>
