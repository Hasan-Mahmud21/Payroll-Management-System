<?php 

session_start();

require  '../model/db.php';
$hasError = 0;
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

//$id = $_REQUEST["id"];
$userid = $_REQUEST["userid"];
$fromdate = $_REQUEST["fromDate"];
$todate = $_REQUEST["toDate"];
$start_time = $_REQUEST["startTime"];
$end_time = $_REQUEST["endTime"];
$shift_time = $_REQUEST["shiftTime"];

/*if (empty($id)) {
    $errors['id'] = " ID is required";
    $hasError++;
} elseif (preg_match('/[A-Z,a-z,@]/', $id)) {
    $errors['id'] = " Id should not contain Letters";
    $hasError++;
} else {
    echo " ID: $id <br>";
}
*/

if (empty($userid)) {
    $errors['userid'] = "User ID is required";
    $hasError++;
} elseif (preg_match('/[A-Z,a-z,@]/', $userid)) {
    $errors['userid'] = "Employee Id should not contain Letters";
    $hasError++;
} else {
    echo "User ID: $userid <br>";
}

if (empty($fromdate)) {
    $errors['fromDate'] = "The Payment Date is required";
    $hasError++;
} 

else {
    echo "fromDate  is : $fromdate <br>";
}


if (empty($todate)) {
    $errors['toDate'] = "The Payment Date is required";
    $hasError++;
} 

else {
    echo "ToDate  is : $todate <br>";
}

if (empty($start_time)) {
    $errors['startTime'] = "The Payment Date is required";
    $hasError++;
} 

else {
    echo "Start Time  is : $start_time <br>";
}



if (empty($end_time)) {
    $errors['endTime'] = "The end Time is required";
    $hasError++;
} 

else {
    echo "end Time  is : $end_time <br>";
}

if (empty($shift_time)) {
    $errors['shiftTime'] = "The shift Time is required";
    $hasError++;
} 

else {
    echo "shift Time  is : $shift_time <br>";
}




if ($hasError > 0) {
    echo "Please correct the errors.<br>";
    foreach ($errors as $key => $error) {
        echo "$key: $error<br>";
    }
} 

if ($hasError == 0) {
    $tableName = "shift"; // Define the table name
    $myDB = new myDB();
    $connectionObject = $myDB->openCon();

    $result = $myDB->insertData(
                
                $userid,  
                $fromdate, 
                $todate , 
                $start_time, 
                $end_time ,
                $shift_time,
                $connectionObject,
                $tableName
    );
    $myDB->closeCon($connectionObject);
    //if ($result === 1) {
       // $_SESSION["userid"] = $userid ;
        //$_SESSION["Password"] = $password;
        //header("Location: ../view/home.php");
       // exit;
    //} else {
       // echo "Error inserting data into the database.";
   // }
    
}














    
}
?>
