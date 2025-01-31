<?php
class myDB
{
    // Function to open a connection to the database
    public function openCon()
    {
        $DBHost = "localhost"; // Hostname for the database
        $DBUser = "root";      // Database username
        $DBPassword = "";      // Database password
        $DBName = "payroll";   // Database name

        // Create a connection object
        $connectionObject = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);

        // Check for connection errors
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }

        return $connectionObject;
    }

    // Function to insert data into the database
    public function insertData($Name, $email, $phone, $Address, $DOB, $Gender, $Nid, $Userid, $Emprole, $profile_Picture, $connectionObject)
    {
        $sql = "INSERT INTO emptable (f_name, e_name, phoneNumber, address, dob, gender, nid, userid, emprole, profile_picture) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param(
            "ssssssssss",
            $Name,
            $email,
            $phone,
            $Address,
            $DOB,
            $Gender,
            $Nid,
            $Userid,
            $Emprole,
            $profile_Picture
        );

        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $stmt->close();
            return "Error executing statement: " . $stmt->error;
        }
    }

    // Function to show all records from the database
    function showAll($sql, $connectionObject)
    {
        $results = $connectionObject->query($sql);
        return $results;
    }

    // Function to get user by ID
    function getUserByID($tableName, $connectionObject, $id)
    {
        $sql = "SELECT * FROM $tableName WHERE id = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }

    // Function to delete data from the database
    function deleteData($id, $tableName, $connectionObject)
    {
        $sql = "DELETE FROM $tableName WHERE id = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $stmt->close();
            return "Error executing statement: " . $stmt->error;
        }
    }

    // Function to update data in the database
    function updateDataUser($id, $Name, $email, $phone, $Address, $DOB, $Gender, $Nid, $Userid, $Emprole, $profile_Picture, $connectionObject, $tableName)
    {
        $sql = "UPDATE $tableName SET 
        f_name = ?, 
        e_name = ?, 
        phoneNumber = ?, 
        address = ?, 
        dob = ?, 
        gender = ?, 
        nid = ?, 
        userid = ?, 
        emprole = ?, 
        profile_picture = ? WHERE id = ?";

        $stmt = $connectionObject->prepare($sql);
        if ($stmt === false) {
            return "Error preparing statement: " . $connectionObject->error;
        }

        $stmt->bind_param("ssssssssssi", $Name, $email, $phone, $Address, $DOB, $Gender, $Nid, $Userid, $Emprole, $profile_Picture, $id);

        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $error = "Error executing statement: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }

    // Function to search users by name or email
    public function searchUsers($searchQuery, $connectionObject)
    {
        $sql = "SELECT * FROM emptable WHERE f_name LIKE ? OR e_name LIKE ?";
        $stmt = $connectionObject->prepare($sql);
        $searchQuery = "%" . $searchQuery . "%"; // Add % to match any substring
        $stmt->bind_param("ss", $searchQuery, $searchQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    // Function to execute custom queries
    public function customQuery($sql, $connectionObject)
    {
        return $connectionObject->query($sql);
    }

    // Function to close the database connection
    public function closeCon($connectionObject)
    {
        $connectionObject->close();
    }
}
?>
