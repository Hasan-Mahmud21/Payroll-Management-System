<?php
include '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    if (!empty($_POST["id"])) {
        $id = intval($_POST["id"]); // Convert ID to integer for safety

        $mydb = new myDB();
        $conobj = $mydb->openCon();
        $delete = $mydb->deleteData($id, "shift", $conobj);

        if ($delete === "Record deleted successfully!") {
            echo "Record deleted successfully!";
        
            header("Location: ../view/showuser.php");
            exit();
        } else {
            echo "Error deleting record: " . $delete;
        }

        $conobj->close();
    } else {
        echo "Please enter a valid ID.";
    }
} 

?>
