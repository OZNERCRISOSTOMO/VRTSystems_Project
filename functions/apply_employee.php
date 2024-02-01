<?php

if(isset($_POST['submit'])){
    require '../class/database.php';
    require '../class/employee.php';

    $database = new Database();
    $employee = new Employee($database);
    $verificationToken = md5(uniqid(rand(), true));
    $employeeData = array(
        'f_name' => trim($_POST['f_name']),
        'l_name' => trim($_POST['l_name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'token' => $verificationToken
    );

    $fileData = array(
        'fileName' => $_FILES['idPhoto']['name'],
        'fileTmpName' => $_FILES['idPhoto']['tmp_name'],
        'fileSize' => $_FILES['idPhoto']['size'],
        'fileError' => $_FILES['idPhoto']['error'],
        'fileType' => $_FILES['idPhoto']['type'],
    );

    $fileExt = explode('.', $fileData['fileName']);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('pdf');

    $resumeData = array(
        'allowed' => $allowed,
        'fileActualExt' => $fileActualExt,
        'fileName' => $fileData['fileName'],
        'fileTmpName' => $fileData['fileTmpName'],
    );

    if($employee->checkEmailIfExist($employeeData['email'])){

       header("Location: ../Pages/signup.php?employee=alreadyExist");
       exit();
    }


    if ($fileData['fileError'] === 0){
        $subject = "Email Verification";
        $message = "Click the following link to verify your email:\n\n";
        $message .= "localhost/VRTSYSTEMS_PROJECT/functions/verify_email.php?token=$verificationToken";
    
        if ($database->sendEmail($employeeData['email'], $subject, $message)) {
            header('Location: ../Pages/signup.php');
        } else {
            echo "Error sending email. Please try again later.";
        }
        $employee->checkData($resumeData ,$employeeData);
    } else {
        echo "There was an error while uploading the file";
        exit();
    }
}

?>