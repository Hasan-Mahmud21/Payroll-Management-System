<?php
include '../model/db.php';

// Fetch user details if ID is provided via GET
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // Convert ID to an integer for safety

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->getUserByID("shift", $conobj, $id);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            $id = $data["id"];
            $userid = $data["userid"];
            $fromdate = $data["fromdate"];
            $todate = $data["todate"];
            $start_time = $data["start_time"];
            $end_time = $data["end_time"];
            $shift_time = $data["shift_time"];
        }
    } else {
        echo "<p class='error-message'>No Data Available</p>";
    }

    $conobj->close();
}

// Handle the update request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    if (!empty($_POST["id"]) && !empty($_POST["userid"]) && !empty($_POST["fromdate"]) && !empty($_POST["todate"]) && !empty($_POST["start_time"]) && !empty($_POST["end_time"]) && !empty($_POST["shift_time"])) {
        $id = intval($_POST["id"]); 
        $userid = intval($_POST["userid"]);
        $fromdate = $_POST["fromdate"];
        $todate = $_POST["todate"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $shift_time = $_POST["shift_time"];

        $mydb = new myDB();
        $conobj = $mydb->openCon();
        $update = $mydb->updateDataUser($conobj, 'shift', $id, $userid, $fromdate, $todate, $start_time, $end_time, $shift_time);

        if ($update === "Record updated successfully!") {
            echo "<p class='success-message'>Data updated successfully!</p>";
            header("Location: ../view/showuser.php");
            exit();
        } else {
            echo "<p class='error-message'>Error updating data: " . $update . "</p>";
        }

        $conobj->close();
    } else {
        echo "<p class='error-message'>All fields are required.</p>";
    }
}
?>
<!-- Button to go back -->
<a href="../view/showuser.php">
    <button class="redirect-button">Back to User List</button>
</a>
<link rel="stylesheet" type="text/css" href="../css/style.css">
