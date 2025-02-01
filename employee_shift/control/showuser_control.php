<?php
require '../model/db.php';

$mydb = new myDB();
$conobj = $mydb->openCon();
$results = $mydb->showAll("shift", $conobj);
$mydb->closeCon($conobj);
?>
<?php
    // Check if results exist and display them in a table
    if ($results && $results->num_rows > 0) {
        echo "<table border='1'>";
        echo "<thead>
                <tr>
                    <th>id</th>
                    <th>userid</th>
                    <th>fromdate</th>
                    <th>todate</th>
                    <th>start_time</th>
                    <th>end_time</th>
                    <th>shift_time</th>
                    <th>Actions</th>
                </tr>
              </thead>";
        echo "<tbody>";

        // Fetch and display each row of data
        while ($data = $results->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $data['id'] . "</td>";
            echo "<td>" . $data['userid'] . "</td>";
            echo "<td>" . $data['fromdate'] . "</td>";
            echo "<td>" . $data['todate'] . "</td>";
            echo "<td>" . $data['start_time'] . "</td>";
            echo "<td>" . $data['end_time'] . "</td>";
            echo "<td>" . $data['shift_time'] . "</td>";
         echo "</tr>";
            
        }

        echo "</tbody>";
        echo "</table>";
    } 


    
    ?>