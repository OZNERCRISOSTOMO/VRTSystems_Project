<?php

session_start();
if(isset($_SESSION['id']) && $_SESSION['user_type'] === 3){
  require '../class/database.php';
  require '../class/employee.php';

  $database = new Database();
  $employee = new Employee($database);

  $id = $_SESSION['id'];

  $employeeData = $employee->employee_info($id);

  $employeeCount = $employee->getEmployeeCount();
}else{
  header('Location: login.php');
}


 $list = $database->getConnection()->query("SELECT * FROM employee_info WHERE status= 1")->fetchAll();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Pictures/logo.png"/>
    <title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53a2b7f096.js" crossorigin="anonymous"></script>
</head>
  <body>
    


        <!-------------SIDEBAR ----------->


        <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white shadow-lg border">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-black min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                <img src="../Pictures/logo.png" class="me-1" style="width:35px;height:35px; font-weight:bold;">BOLTIMZER
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="../Pages/admin_index.php" class="nav-link align-middle px-0 text-black">
                        <i class="fa-solid fa-table-columns"></i> <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                  
                    <li>
                        <a href="../Pages/admin_attendance.php" class="nav-link px-0 align-middle text-black">
                        <i class="fa-solid fa-clipboard-user"></i></i> <span class="ms-1 d-none d-sm-inline">Attendance</span></a>
                    </li>
              
                        
                    <li>
                        <a href="../Pages/employeelist.php" class="nav-link px-0 align-middle text-black">
                        <i class="fa-solid fa-user"></i></i> <span class="ms-1 d-none d-sm-inline">Employee List</span> </a>
                    </li>

                    <li>
                        <a href="../Pages/admin_pending_applicants.php" class="nav-link px-0 align-middle text-black">
                        <i class="fa-solid fa-clock-rotate-left"></i></i> <span class="ms-1 d-none d-sm-inline">Pending Applicants</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-circle-user fs-4 me-2"></i>
                        <span class="d-none d-sm-inline mx-1">Name</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">

                        <li><a class="dropdown-item" href="../functions/logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>




        <!-- Main Nav--->
        <div class="col py-3" style="background-color: #F5F5F5;">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($list as $row) { ?>
                        <tr>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                       
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    </div>
        </div>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>