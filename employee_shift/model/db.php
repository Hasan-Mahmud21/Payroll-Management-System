<?php
class myDB {
    // Function to open a connection to the database
    public function openCon() {
        $DBHost = "localhost"; // Hostname for the database
        $DBUser = "root";      // Database username
        $DBPassword = "";      // Database password
        $DBName = "payroll";     // Database name

        // Create a connection object
        $connectionObject = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);

        // Check for connection errors
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }
        //else {
           // echo "Connected successfully to the database.<br>";
        //}
        return $connectionObject;
    }
    // Function to insert data
    public function insertData( $userid, $fromdate, $todate, $start_time, $end_time, $shift_time, $connectionObject) {
        $sql = "INSERT INTO shift ( userid, fromdate, todate, start_time, end_time, shift_time) 
                VALUES ( ?, ?, ?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = $connectionObject->prepare($sql);
        if ($stmt === false) {
            return "Error preparing statement: " . $connectionObject->error;
        }
    
        // Bind parameters
        $stmt->bind_param("isssss",  $userid, $fromdate, $todate, $start_time, $end_time, $shift_time);
    
        // Execute the statement
        if ($stmt->execute()) {
            $stmt->close();
            return "Data inserted successfully!"; // Success
        } else {
            $stmt->close();
            return "Error executing statement: " . $stmt->error;
        }
    }
     // Function to show all records
      public function showAll($tableName, $connectionObject) {
      $sql = "SELECT id, userid,fromdate , todate , start_time ,end_time ,shift_time  FROM $tableName";
      $results = $connectionObject->query($sql);

    if ($results->num_rows > 0) {
         while ($row = $results->fetch_assoc()) {
            echo "ID: " . $row["id"] . " | User ID: " . $row["userid"] . " | FromDate: " . $row["fromdate"];
            echo " | ToDate: " . $row["todate"] . " | start_time: " . $row["start_time"] . " |end_time: " . $row["end_time"] . " |shift_time: " . $row["shift_time"] . "<br>";
         }
    }else {
        echo "No records found.";
    }
}


  // Function to delete a record
 public function deleteData($id, $tableName, $connectionObject) {
    $sql = "DELETE FROM $tableName WHERE id = ?";
    $stmt = $connectionObject->prepare($sql);
    if (!$stmt) {
        return "Error preparing statement: " . $connectionObject->error;
    }

    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $stmt->close();
        return "Record deleted successfully!";
    } else {
        $stmt->close();
        return "Error deleting record: " . $stmt->error;
    }
 }

 // Function to update a record
 public function updateDataUser($connectionObject, $tableName, $id, $userid,$fromdate, $todate, $start_time, $end_time, $shift_time ) {
    $sql = "UPDATE $tableName SET 
                userid = ?, 
                 fromdate= ?, 
                 todate = ?, 
                start_time = ?, 
                end_time = ?,
                shift_time=?
                WHERE id = ?";
    
    $stmt = $connectionObject->prepare($sql);
    if (!$stmt) {
        return "Error preparing statement: " . $connectionObject->error;
    }

    $stmt->bind_param("isssssi", $userid,$fromdate, $todate, $start_time, $end_time, $shift_time,$id );
    if ($stmt->execute()) {
        $stmt->close();
        return "Record updated successfully!";
    } else {
        $stmt->close();
        return "Error updating record: " . $stmt->error;
    }

}  

 //Function to close the connection
public function closeCon($connectionObject) {
    $connectionObject->close();
    echo "Connection closed.<br>";
}

} // Add this closing brace to end the class definition

// Example usage
$dbInstance = new myDB();
$conn = $dbInstance->openCon();

// Example: Insert data
//$result = $dbInstance->insertData( 200, "2022-01-07", "2024-01-09", "11:00", "14:00", "15 hours", $conn);
//echo $result;

// Show all records
//echo "<h2>Shift Records:</h2>";
//$dbInstance->showAll('shift', $conn);

// Delete a record
//echo $dbInstance->deleteData("56", 'shift', $conn) . "<br>";

// Update a record
//echo $dbInstance->updateDataUser($conn, 'shift', 200, "2022-01-07", "2024-01-09", "11:00", "14:00", "15 hours",21 ) . "<br>";



// Close the connection
//$dbInstance->closeCon($conn);
?>
