<?php
require '../model/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasError = 0;
    
    $Name = htmlspecialchars(trim($_REQUEST["f_name"]));
    $email = htmlspecialchars(trim($_REQUEST["e_name"]));
    $phone = htmlspecialchars(trim($_REQUEST["phoneNumber"]));
    $Address = htmlspecialchars(trim($_REQUEST["address"]));
    $DOB = htmlspecialchars(trim($_REQUEST["dob"]));
    $Gender = isset($_REQUEST["gender"]) ? htmlspecialchars($_REQUEST["gender"]) : "";
    $Nid = htmlspecialchars(trim($_REQUEST["nid"]));
    $Userid = htmlspecialchars(trim($_REQUEST["userid"]));
    $Emprole = htmlspecialchars(trim($_REQUEST["emprole"]));
    
    // Name Validation
    if (empty($Name) || !preg_match('/^[A-Za-z ]+$/', $Name) || !preg_match('/[A-Z]/', $Name)) {
        echo "Invalid name. Must contain only alphabets and at least one uppercase letter.<br>";
        $hasError++;
    }
    
    // Email Validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, '.xyz')) {
        echo "Invalid email. Must be a valid format and end with .xyz domain.<br>";
        $hasError++;
    }
    
    // Phone Validation
    if (empty($phone) || !ctype_digit($phone) || strlen($phone) < 10) {
        echo "Invalid phone number. Must contain only digits and be at least 10 characters long.<br>";
        $hasError++;
    }
    
    // Address, DOB, Gender, NID, User ID, and EMP Role Validation
    foreach (["Address" => $Address, "DOB" => $DOB, "Gender" => $Gender, "NID" => $Nid, "User ID" => $Userid, "EMP Role" => $Emprole] as $field => $value) {
        if (empty($value)) {
            echo "$field is required.<br>";
            $hasError++;
        }
    }
    
    // Profile Picture Upload Handling
    $profile_Picture = "";
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] === UPLOAD_ERR_OK) {
        $upload_dir = "../uploadfile/";
        $file_ext = pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);
        
        if (in_array(strtolower($file_ext), ["jpg", "jpeg", "png", "gif"])) {
            $profile_Picture = uniqid("profile_", true) . "." . $file_ext;
            $upload_file = $upload_dir . $profile_Picture;
            
            if (!move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $upload_file)) {
                echo "Failed to upload profile picture.<br>";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.<br>";
            $hasError++;
        }
    }
    
    // Insert into Database if No Errors
    if ($hasError == 0) {
        $tableName = "emptable";
        $myDB = new myDB();
        $connectionObject = $myDB->openCon();
        
        $result = $myDB->insertData($Name, $email, $phone, $Address, $DOB, $Gender, $Nid, $Userid, $Emprole, $profile_Picture, $connectionObject, $tableName);
        $myDB->closeCon($connectionObject);
        
        if ($result === 1) {
            $_SESSION["f_name"] = $Name;
            header("Location: ../view/home.php");
            exit;
        } else {
            echo "Error inserting data into the database.";
        }
    } else {
        echo "Please insert correct data.";
    }
}
