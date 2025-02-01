<?php
class myDB {
    // Function to open a connection to the database
    public function openCon() {
        $DBHost = "localhost"; 
        $DBUser = "root";      
        $DBPassword = "";      
        $DBName = "payrolldb"; 

        // Create a connection object
        $connectionObject = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);

        // Check for connection errors
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }

        return $connectionObject;
    }

    // Function to insert data
    public function insertData($connectionObject, $user_id, $basic_salary, $bonus, $deduction, $payment_date) {
        $sql = "INSERT INTO payroll (user_id, basic_salary, bonus, deduction, payment_date) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $connectionObject->prepare($sql);
        if (!$stmt) {
            return "Error preparing statement: " . $connectionObject->error;
        }

        // Correct data types
        $stmt->bind_param("iddds", $user_id, $basic_salary, $bonus, $deduction, $payment_date);
        if ($stmt->execute()) {
            $stmt->close();
            return "Data inserted successfully!";
        } else {
            $stmt->close();
            return "Error executing statement: " . $stmt->error;
        }
    }

    // Function to show all records
    public function showAll($tableName, $connectionObject) {
        $sql = "SELECT id, user_id, basic_salary, bonus, deduction, payment_date FROM $tableName";
        $results = $connectionObject->query($sql);

        if ($results->num_rows > 0) {
            while ($row = $results->fetch_assoc()) {
                echo "ID: " . $row["id"] . " | User ID: " . $row["user_id"] . " | Basic Salary: " . $row["basic_salary"];
                echo " | Bonus: " . $row["bonus"] . " | Deduction: " . $row["deduction"] . " | Payment Date: " . $row["payment_date"] . "<br>";
            }
        } else {
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
    public function updateDataUser($connectionObject, $tableName, $id, $user_id, $basic_salary, $bonus, $deduction, $payment_date) {
        $sql = "UPDATE $tableName SET 
                    user_id = ?, 
                    basic_salary = ?, 
                    bonus = ?, 
                    deduction = ?, 
                    payment_date = ? 
                WHERE id = ?";
        
        $stmt = $connectionObject->prepare($sql);
        if (!$stmt) {
            return "Error preparing statement: " . $connectionObject->error;
        }

        // Correct data types
        $stmt->bind_param("iiddds", $user_id, $basic_salary, $bonus, $deduction, $payment_date, $id);
        if ($stmt->execute()) {
            $stmt->close();
            return "Record updated successfully!";
        } else {
            $stmt->close();
            return "Error updating record: " . $stmt->error;
        }
    }

    // Function to close the connection
    public function closeCon($connectionObject) {
        $connectionObject->close();
    }
}

// Example usage
$db = new myDB();
$conn = $db->openCon();

// Insert multiple rows
echo $db->insertData($conn, 102, 30000, 2000, 1000, '2025-01-01') . "<br>";
echo $db->insertData($conn, 103, 45000, 2500, 1500, '2025-02-01') . "<br>";
echo $db->insertData($conn, 105, 60000, 3000, 2000, '2025-03-16') . "<br>";

// Show all records
//echo "<h2>Payroll Records:</h2>";
//$db->showAll('payroll', $conn);

// Update a record
echo $db->updateDataUser($conn, 'payroll', 105, 105, 40000, 3000, 2000, '2025-04-01') . "<br>";

// Delete a record
echo $db->deleteData(105, 'payroll', $conn) . "<br>";

// Close the connection
$db->closeCon($conn);
?>
