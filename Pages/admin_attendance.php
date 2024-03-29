<?php
session_start();

require '../class/database.php';
require '../class/employee.php';

$database = new Database();
$employee = new Employee($database);

if (isset($_SESSION['id']) && $_SESSION['user_type'] === 3) {
    $id = $_SESSION['id'];

    $employeeData = $employee->employee_info($id);
} else {
    header('Location: login.php');
    exit; // Ensure that the script stops executing after redirection
}

// Establish a PDO database connection
$pdo = $database->getConnection();

$query = "SELECT * FROM attendance";
$result = $pdo->query($query);

if (!$result) {
    die("Query failed: " . implode(" ", $pdo->errorInfo()));
}

function calculateTotalHours($timeIn, $timeOut) {
    // Convert the time strings to DateTime objects
    $timeIn = new DateTime($timeIn);
    $timeOut = new DateTime($timeOut);

    // Calculate the difference between Time Out and Time In
    $interval = $timeIn->diff($timeOut);

    // Format and return the difference as total hours and minutes
    return $interval->format('%H hours %i minutes');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Pictures/logo.png"/>
    <title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53a2b7f096.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">


  </head>
  <body>
   
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
                  
                    <li class="nav-item">
                        <a href="../Pages/admin_attendance.php" class="nav-link px-0 align-middle text-black ">
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
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">

                      <li><a class="dropdown-item" href="../functions/logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>


  
  








    <!-- Main Content -->


      <!-- Main Content -->
      <div class="col py-3" style="background-color: #F5F5F5;">
      <div class="container">
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="myTabs">
          <li class="nav-item">
            <a class="nav-link active" href="#presentTab">List of Present</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#absentTab">List of Absent</a>
          </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content">
          <div class="tab-pane active" id="presentTab">
          <div class="card border-top-0">
                <div class="card-body">
            <table id="myTable" class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              
              <th>First Name</th>
              <th>Lastt Name</th>
              <th>Time In</th>
              <th>Time Out</th>
              <th>Total Time</th>
            </tr>
          </thead>
          <tbody>
          <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td> 
        <td><?php echo $row['first_name']; ?></td> 
        <td><?php echo $row['last_name']; ?></td> 
        <td><?php echo $row['time_in']; ?></td> 
        <td><?php echo $row['time_out']; ?></td> 
        <td><?php echo calculateTotalHours($row['time_in'], $row['time_out']); ?></td> 
    </tr> 
<?php } ?>
          </tbody>
          </table>
          </div>
          </div>
          </div>
          
          <div class="tab-pane" id="absentTab">
          <div class="card border-top-0">
  <div class="card-body">
          <table id="myabsent" class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Time In</th>
              <th>Time Out</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Chua, Jerome</td>
              <td>12:30 AM</td>
              <td>12:30 AM</td>
              <td>On Time</td>
            </tr>
            <tr>
              <td>Dange, Kevin</td>
              <td>12:30 AM</td>
              <td>12:30 AM</td>
              <td>Late</td>
            </tr>
          </tbody>
        </table>
          </div>

        </div>
      </div>
    </div>

    

  

    <!-- Include DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function () {
        $('#myTable').DataTable();
      });

      $(document).ready(function () {
        $('#myabsent').DataTable();
      });

         $('#myTabs a').on('click', function (e) {
          e.preventDefault();
          $(this).tab('show');
        });
    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
