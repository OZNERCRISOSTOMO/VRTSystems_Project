<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53a2b7f096.js" crossorigin="anonymous"></script>
</head>
  <body>
    


        <!-------------SIDEBAR ----------->


        <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white shadow-lg">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-black min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                    <span class="fs-6 d-none d-sm-inline">VRTSystem Corp.</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0 text-black">
                        <i class="fa-solid fa-table-columns"></i> <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                  
                    <li>
                        <a href="#" class="nav-link px-0 align-middle text-black">
                        <i class="fa-solid fa-clipboard-user"></i></i> <span class="ms-1 d-none d-sm-inline">Attendance</span></a>
                    </li>
              
                
                    <li>
                        <a href="#" class="nav-link px-0 align-middle text-black">
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

                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>




        <!-- Main Nav--->
        <div class="col py-3" style="background-color: #F5F5F5;">
            <div class="container">
                <div class="row">

                <div class="col-sm-3 mb-3 mb-sm-0">
                    <div class="card border-0 border-bottom  border-success border-5 shadow">
                    <div class="card-body">
                        <small class="card-title">Present</small>
                       

                    </div>
                    </div>
                </div>

                <div class="col-sm-3 mb-3 mb-sm-0 ">
                <div class="card border-0 border-bottom  border-danger border-5 shadow">
                <div class="card-body">
                    <small class="card-title">Absent</small>
             
                </div>
                </div>
            </div>

    

        <div class="col-sm-3 mb-3 mb-sm-0">
                    <div class="card border-0 border-bottom  border-primary border-5 shadow">
                    <div class="card-body">
                        <small class="card-title">Employees</small>
                       

                    </div>
                    </div>
                </div>


                <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card border-0 border-bottom  border-secondary border-5 shadow">
            <div class="card-body">
                <small class="card-title">Pending Applicants</small>

            
            </div>
            </div>
        </div>



                </div>
            </div>

           
        </div>
    </div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>