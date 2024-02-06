<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="Pictures/logo.png"/>
    <title>Attendance Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

        <div class="container  d-flex align-items-center justify-content-center " style="min-height: 100vh;">
        <div class="card  w-50 shadow">
            <div class="card-header text-center">
                Attendance
            </div>
            <div class="card-body">

            <form method="post" action="../functions/attendance.php">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                </div>


            </div>
            <div class="card-footer text-body-secondary text-center">
              <button type="submit" name="submit"class="btn btn-primary btn-sm w-50"> Attendance </button>  
            </div>
            </div>
            </form>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>