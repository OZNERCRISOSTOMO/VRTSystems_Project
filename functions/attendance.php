<?php 

if(isset($_POST['submit'])){
    require '../class/database.php';

    $timezone = 'Asia/Manila';
	date_default_timezone_set($timezone);

    $date1 = date("Y-m-d");
    $current_time = date("H:i:s");

    $database = new Database();

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $stmt = $database->getConnection()->prepare("SELECT * FROM employee_info WHERE email = :email AND is_verified = 1 AND status = 1");
    $stmt->execute(['email' => $email]);
    $employeeInfo = $stmt->fetch();

    $employeeId = $employeeInfo['id'];
    $employeePass = $employeeInfo['password'];


    $hashed_input_password = password_hash($pass, PASSWORD_DEFAULT);
    if(!password_verify($pass, $employeePass)){
        // if not, create variable error 
            header("Location:../Pages/login.php?error=errorPassword");
        exit();
    }

    $stmtCheck = $database->getConnection()->prepare("SELECT * FROM attendance WHERE employee_id = :id AND date = :date");
    $stmtCheck->execute(['id' => $employeeId, 'date' => $date1]);
    $employeeCheck = $stmtCheck->fetch();
    $count = $employeeCheck ? '1':'0';
    if($count == '1'){
        $attendanceId = $employeeCheck['id'];
        $stmtUpdateTime_out = $database->getConnection()->prepare("UPDATE attendance SET time_out = ? WHERE id = ?");
        $stmtUpdateTime_out->execute([$current_time, $attendanceId]);

        header('Location: ../Pages/attendance.php?message=timeOut');
    }else{
        $logstatus = ('08:30:00' > $time)? 'Ontime':'Late';

        $stmtInsert = $database->getConnection()->prepare("INSERT INTO attendance (employee_id, first_name, last_name, time_in, status, date) VALUES (?,?,?,?,?,?)");
        $stmtInsert->execute([$employeeId, $employeeInfo['first_name'], $employeeInfo['last_name'], $current_time, $logstatus, $date1]);
        
        header('Location: ../Pages/attendance.php?message=timeIn');

    }

}