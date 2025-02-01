<?php
include '../model/db.php';

$db = new myDB();
$conn = $db->openCon();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $payroll_id = $_POST['id'];

    // Check if payroll record exists
    $sql = "SELECT * FROM payroll WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $payroll_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Delete the payroll entry
        $sql = "DELETE FROM payroll WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $payroll_id);

        if ($stmt->execute()) {
            $message = "Payroll record deleted successfully!";
        } else {
            $message = "Error deleting record: " . $stmt->error;
        }
    } else {
        $message = "Payroll record with ID $payroll_id not found.";
    }

    $stmt->close();
    $db->closeCon($conn);

    // Redirect back to delete page with message
    header("Location: ../view/deleteuser.php?message=" . urlencode($message));
    exit;
}
?>
