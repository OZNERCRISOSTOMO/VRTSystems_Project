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

    public function checkEmailIfExist($email){
        $stmt = $this->database->getConnection()->prepare("SELECT * FROM employee_info WHERE email=?");

         //if execution fail
        if (!$stmt->execute([$email])) {
            header("Location: ../Pages/signup.php?scholar=emailExist");
            exit();
        }

        //fetch the result
        $result = $stmt->fetch();
        
          //if has result true, else return false
        if ($result) {
            return true;
        } else {
            return false;
        }
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

    public function registerEmployee($employeeData, $resume){
        
        $sql = "INSERT INTO employee_info (first_name, last_name, email, password, resume, verification_token)
            VALUES (?,?,?,?,?,?);";

         // prepared statement
        $stmt = $this->database->getConnection()->prepare($sql);

        $hashedpwd = password_hash($employeeData['password'], PASSWORD_DEFAULT);

        if (!$stmt->execute([$employeeData['f_name'],
                             $employeeData['l_name'],
                             $employeeData['email'],
                             $hashedpwd,
                             $resume,
                             $employeeData['token']])){
                                header('Location: ../Pages/signup.php?message=error');
                                exit();
                             }
        
        header("Location: ../Pages/login.php?message=success"); 
        exit();
    }

    public function verification($token){
        $stmt = "SELECT id FROM users WHERE verification_token = '?'";

        if (!$stmt->execute([$token])) {
            header("Location: ../Pages/signup.php?scholar=emailExist");
            exit();
        }

        $result = $stmt->fetch();
        
          //if has result true, else return false
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}