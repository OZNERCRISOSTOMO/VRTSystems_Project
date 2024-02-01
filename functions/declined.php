<?php
require '../class/database.php';

$database = new Database();

if (isset($_POST['decline_id'])) {
    $user_id = $_POST['decline_id'];
    
    // Use a prepared statement to update the 'status' column
    $stmt = $database->getConnection()->prepare("UPDATE employee_info SET status = ? WHERE id = ?");
    
    // Bind parameters and execute the statement
    $stmt->execute([2, $user_id]);
    
    // Check for success or failure
    if ($stmt->rowCount() > 0) {
        echo header("location: ../Pages/admin_pending_applicants.php");
    } else {
        echo "Failed to update employee status.";
    }
} else {
    echo "Accept ID not provided.";
}
?>
