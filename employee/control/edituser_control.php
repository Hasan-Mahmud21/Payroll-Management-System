<?php

include '../model/db.php';
echo "<script src='../js/myjs.js' defer></script>";
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
//     echo "Invalid ID provided.";
// }


if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $Name = $_POST["f_name"];
    $email = $_POST["e_name"];
    $phone = $_POST["phoneNumber"];
    $Address = $_POST["address"];
    $DOB = $_POST["dob"];
    $Gender = $_POST["gender"];
    $Nid = $_POST["nid"];
    $Userid = $_POST["userid"];
    $Emprole = $_POST["emprole"];

    // Handle profile picture
    if (!empty($_FILES["profile_picture"]["name"])) {
        $target_dir = "../uploadfile/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
        $profile_Picture = $_FILES["profile_picture"]["name"];
    } else {
        $profile_Picture = $_POST["old_profile_picture"];
    }

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $update = $mydb->updateDataUser($id, $Name, $email, $phone, $Address, $DOB, $Gender, $Nid, $Userid, $Emprole, $profile_Picture, $conobj, "emptable");

    if ($update === 1) {
        echo "Data updated successfully";
        header("Location:../view/showuser.php");
    } else {
        echo "Error updating data: " . $update;
    }
}

