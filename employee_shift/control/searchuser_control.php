<?php
include '../model/db.php';

if (isset($_POST["query"])) {
    $searchQuery = $_POST["query"];

    $mydb = new myDB();
    $conobj = $mydb->openCon();

    // Fetch users where only `id` matches the search query
    $sql = "SELECT * FROM shift WHERE id = ?";
    $stmt = $conobj->prepare($sql);
    $stmt->bind_param("i", $searchQuery); // Expecting `id` as an integer
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['userid']}</td>
                        <td>{$row['fromdate']}</td>
                        <td>{$row['todate']}</td>
                        <td>{$row['start_time']}</td>
                        <td>{$row['end_time']}</td>
                        <td>{$row['shift_time']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='color:red;'>No results found.</td></tr>";
        }
    } else {
        echo "<tr><td colspan='7' style='color:red;'>Query Error: " . $stmt->error . "</td></tr>";
    }

    $stmt->close();
    $conobj->close();
}
?>
