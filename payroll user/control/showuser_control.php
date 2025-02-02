<?php
require '../model/db.php';

$db = new myDB();
$conn = $db->openCon();

$sql = "SELECT id, user_id, basic_salary, bonus, deduction, 
               (basic_salary + bonus - deduction) AS net_salary, payment_date 
        FROM payroll";

$result = $conn->query($sql);
$payrollData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $payrollData[] = $row;
    }
}

$conn->close();
?>
