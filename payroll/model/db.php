<?php
class DBConfig {
    private $DBHost = "localhost";
    private $DBUser = "root";
    private $DBPassword = "";
    private $DBName = "payroll";
    private $conn;

    // Establish database connection
    public function connect() {
        $this->conn = new mysqli($this->DBHost, $this->DBUser, $this->DBPassword, $this->DBName);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }

    // Login function to validate username and password
    public function login($username, $password) {
        $conn = $this->connect();
        $hashedPassword = md5($password); // Hash password with MD5
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$hashedPassword'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $_SESSION['username'] = $username; // Set session variable
            header('Location: ../view/user_dashboard.php'); // Redirect to dashboard
            exit();
           // header('location:logindashboard.php')
        } else {
            echo "<h1>Username or password is wrong.</h1>"; // Corrected echo statement
           echo  $hashedPassword;
        }
    }
    
    public function insertUser($name, $username, $email, $password, $role, $status) {
        $conn = $this->connect();
        $hashedPassword = md5($password); // Hash password with MD5 for security
        $created_on = date("Y-m-d H:i:s"); // Current timestamp
    
        // Check if username or email already exists
        $sqlCheck = "SELECT * FROM admin WHERE username = '$username' OR email = '$email'";
        $resultCheck = $conn->query($sqlCheck);
    
        if ($resultCheck->num_rows > 0) {
            return "Username or email already exists. Please use a different one.";
        }
    
        // If no match is found, insert the new user
        $sqlInsert = "INSERT INTO admin (name, username, email, password, role, status, created_on) 
                      VALUES ('$name', '$username', '$email', '$hashedPassword', '$role', '$status', '$created_on')";
    
        if ($conn->query($sqlInsert) === TRUE) {
            return "New user added successfully!";
        } else {
            return "Error: " . $sqlInsert . "<br>" . $conn->error;
        }
    }
    

    public function editUser($userId, $name, $username, $email, $role, $status) {
        $conn = $this->connect();
    
        // Check if username or email already exists for another user
        $sqlCheck = "SELECT * FROM admin WHERE (username = '$username' OR email = '$email') AND id != '$userId'";
        $resultCheck = $conn->query($sqlCheck);
    
        if ($resultCheck->num_rows > 0) {
            return "Username or email already exists for another user. Please use a different one.";
        }
    
        // Update user details
        $sqlUpdate = "UPDATE admin 
                      SET name = '$name', username = '$username', email = '$email', role = '$role', status = '$status'
                      WHERE id = '$userId'";
    
        if ($conn->query($sqlUpdate) === TRUE) {
            return "User updated successfully!";
        } else {
            return "Error updating user: " . $conn->error;
        }
    }

    public function getUserByID($id) {
        $conn = $this->connect();
        
        // Prepare and execute the query
        $sql = "SELECT * FROM admin WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);  // "i" means integer (for the ID)
        $stmt->execute();
        
        // Get the result and return it
        $results = $stmt->get_result();
        return $results;
    }

    public function deleteUser($userId) {
        $conn = $this->connect();
    
        // Delete user by ID
        $sqlDelete = "DELETE FROM admin WHERE id = ?";
        $stmt = $conn->prepare($sqlDelete);
        $stmt->bind_param("i", $userId);
    
        if ($stmt->execute()) {
            return "User deleted successfully!";
        } else {
            return "Error deleting user: " . $stmt->error;
        }
    }

    public function updatePassword($username, $hashedPassword) {
        $con = $this->connect(); // Establish database connection
        $query = "UPDATE admin SET password = ? WHERE username = ?"; // Use username to identify the user
        $stmt = $con->prepare($query);
        
        if ($stmt) {
            // Bind parameters ('ss' means string for password, string for username)
            $stmt->bind_param('ss', $hashedPassword, $username); 
            
            $result = $stmt->execute(); // Execute the query
    
            if (!$result) {
                // Log or display SQL error
                error_log("Error updating password: " . $stmt->error);
                echo "Error updating password: " . $stmt->error;  // Debugging
                return false;
            }
    
            $stmt->close();
            $con->close();
            return true; // Password updated successfully
        } else {
            error_log("Error preparing statement: " . $con->error);
            echo "Error preparing statement: " . $con->error; // Debugging
            return false; // Failed to prepare statement
        }
    }
    
    
    public function getAllUsers() {
        $conn = $this->connect();
        $sql = "SELECT * FROM admin";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false; // No users found
        }
    }
    public function searchUsers($searchQuery) {
        $conn = $this->connect();
        $sql = "SELECT * FROM admin WHERE username LIKE ? OR name LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchQuery = "%" . $searchQuery . "%"; // Add % to match any substring
        $stmt->bind_param("ss", $searchQuery, $searchQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Fetch all results as an associative array
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }
    
    
}


function getDBConnection() {
    static $db = null; // Use static to avoid multiple instances
    if ($db === null) {
        $db = new DBConfig();
    }
    return $db->connect();
}



?>
