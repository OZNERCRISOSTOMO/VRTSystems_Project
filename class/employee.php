<?php 

class Employee
{
    private $database;
    private $date;
    private $time;

    public function __construct(Database $database){
        $this->database = $database;
        date_default_timezone_set('Asia/Manila');
        $this->date = date('Y-m-d');
        $this->time = date('H-i-s');
    }

    public function checkData($resume, $employeeData){

        if(in_array($resume['fileActualExt'], $resume['allowed'])){
            
            $newFileName = explode('.',$resume['fileName']);

            $fileNameNew = uniqid('', true) . "." . $resume['fileActualExt'];

            $fileDestination = '../resume/' . $fileNameNew;

            if(move_uploaded_file($resume['fileTmpName'],$fileDestination)){
                $this->registerEmployee($employeeData, $fileNameNew);
            }else{
                echo "Move_uploaded_file error";
            }
        }else{
            echo "You can't upload this type of file!";
        }

    }

    public function registerEmployee(){
        
        $sql = "INSERT INTO scholars_info (firs_name, last_name, email, password, resume)
            VALUES (?,?,?,?,?);";

         // prepared statement
        $stmt = $this->database->getConnection()->prepare($sql);

        if (!$stmt->execute([$employeeData['f_name'],
                             $employeeData['l_name'],
                             $employeeData['email'],
                             $employeeData['password'],
                             $employeeData['resume']])){
                                header('Location: ../Pages/signup.php?message=error');
                                exit();
                             }
        
        
    }
}