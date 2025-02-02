<?php
require '../model/db.php'; // Include your database connection

// Check if there is a search query parameter and sanitize it
$searchQuery = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : '';

// Initialize the database object and connection
$mydb = new myDB();
$conobj = $mydb->openCon();

// If searchQuery is not empty, perform a search with LIKE operator
if (!empty($searchQuery)) {
    // SQL query to search for users by name or email (you can modify this query to search other fields)
    $sql = "SELECT * FROM emptable WHERE f_name LIKE '%$searchQuery%' OR e_name LIKE '%$searchQuery%'";
} else {
    // If no search query, show all records
    $sql = "SELECT * FROM emptable";
}

// Execute the query using the showAll method
$results = $mydb->showAll($sql, $conobj);

// Check if there are any results
if ($results->num_rows > 0) {
    // Output the results as a table row
    while ($data = $results->fetch_assoc()) {
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
        echo "<td><a class='button-update' href='../view/edituser.php?id=" . $data["id"] . "'>Update</a></td>";
        echo "<td><a class='button-delete' href='../view/deleteuser.php?id=" . $data["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "No records found.";
}
?>
