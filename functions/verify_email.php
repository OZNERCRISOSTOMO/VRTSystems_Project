<?php
require '../class/database.php';
require '../class/employee.php';

$database = new Database();
$employee = new Employee($database);

$token = $_GET["token"];

$id = $employee->verification($token);

if (mysqli_num_rows($id) == 1) {
    $updateQuery = $database->getConnection()->prepare("UPDATE employee_info SET is_verified = 1, verification_token = NULL WHERE id = :id");

    if (!$updateQuery->execute(['id' => $id])) {
        echo "Error";
    } else {
        echo "Email verification successful! You can now log in.";
    }
} else {
    echo "Invalid or expired verification token. Please try again.";
}

mysqli_close($conn);
?>
