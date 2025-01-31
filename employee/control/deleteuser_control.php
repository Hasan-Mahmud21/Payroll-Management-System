<?php

include '../model/db.php';

// Validate and sanitize the input
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // Convert the id to an integer for safety

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->getUserByID("emptable", $conobj, $id);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            $id = $data["id"];
            $Name = $data["f_name"];
            $email = $data["e_name"];
            $phone = $data["phoneNumber"];
            $Address = $data["address"];
            $DOB = $data["dob"];
            $Gender = $data["gender"];
            $Nid = $data["nid"];
            $Userid = $data["userid"];
            $Emprole = $data["emprole"];
            $profile_Picture = $data["profile_picture"];
        }
    } else {
        echo "No Data Available";
    }

    $conobj->close();
} //else {
    //echo "Invalid ID provided.";
//}
if (isset($_POST["delete"])) {
    $id = $_POST["id"];

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $update = $mydb->deleteData($id, "emptable", $conobj);
    if ($update === 1) {
        echo "Data delete successfully";
        header("Location:../view/showuser.php");
    } else {
        echo "Error deleteing data: " . $update;
    }
}
