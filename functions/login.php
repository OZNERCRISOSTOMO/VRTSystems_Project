<?php

if(isset($_POST['submit'])){
    require '../class/database.php';
    require '../class/employee.php';

    $database = new Database();
    $employee = new Employee($database);

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $employeeData = $employee->login($email);

    $employeePass = $employeeData['password'];
    $is_verified = $employeeData['is_verified'];
    $user_type = $employeeData['user_type'];

    if(!$employeeData){
        header("Location:../Pages/login.php?error=errorEmail");
        exit();
    }
    $hashed_input_password = password_hash($pass, PASSWORD_DEFAULT);
    if(!password_verify($pass, $employeePass)){
        // if not, create variable error 
            header("Location:../Pages/login.php?error=errorPassword");
        exit();
    }

    if($is_verified == 0){
        header("Location:../Pages/login.php?error=notVerified");
        exit();
    }

    session_start();
    $_SESSION['id'] = $employeeData['id'];

    if($user_type == 3){
        $_SESSION['user_type'] = 3;
        header('Location: ../Pages/admin_index.php');
    }elseif($user_type == 1){
        $_SESSION['user_type'] = 1;
        header('Location: ../Pages/index.php');
    }
}