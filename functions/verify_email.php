<?php
require '../class/database.php';
require '../class/employee.php';

$database = new Database();
$employee = new Employee($database);

$token = $_GET["token"];

$data = $employee->code($token);
$id = $data['id'];
$num = count($data);

if ($num == 1) {
    $stmt = $database->getConnection()->prepare("UPDATE employee_info SET is_verified = 1, verification_token = NULL WHERE id = :id");

    if (!$stmt->execute(['id' => $id])) {
        echo "Error";
    } else {
        header('Location: ../Pages/login.php?message=successfullyVerified');
    }
} else {
    echo "Invalid or expired verification token. Please try again.";
}
?>
