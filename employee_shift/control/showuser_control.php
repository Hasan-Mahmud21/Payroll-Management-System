<?php
require '../model/db.php';

$db = new myDB();
$conn = $db->openCon();

$sql = "SELECT id, userid,fromdate , todate , start_time ,end_time ,shift_time from shift ";

$result = $conn->query($sql);
$shiftdata = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $shiftdata[] = $row;
    }
}

$conn->close();
?>
