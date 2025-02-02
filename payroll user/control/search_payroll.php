<?php
require '../model/db.php';

$db = new myDB();
$conn = $db->openCon();

$searchQuery = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : '';

$sql = "SELECT id, user_id, basic_salary, bonus, deduction, 
               (basic_salary + bonus - deduction) AS net_salary, payment_date 
        FROM payroll";

if (!empty($searchQuery)) {
    $sql .= " WHERE user_id LIKE '%$searchQuery%' OR id LIKE '%$searchQuery%'";
}

$result = $conn->query($sql);
$output = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['basic_salary']}</td>
                        <td>{$row['bonus']}</td>
                        <td>{$row['deduction']}</td>
                        <td>{$row['net_salary']}</td>
                        <td>{$row['payment_date']}</td>
                    </tr>";
    }
} else {
    $output = "<tr><td colspan='7'>No payroll records found.</td></tr>";
}

echo $output;
$conn->close();
?>
