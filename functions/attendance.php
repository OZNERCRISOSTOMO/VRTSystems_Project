<?php 

if(isset($_POST['submit'])){
    require '../class/database.php';

    $database = new Database();

    $id = $_POST['id'];

    $stmt = $database->getConnection()->prepare("SELECT * FROM employee_info WHERE id = :id");
    $stmt->execute(['id' => $id]);
    

}