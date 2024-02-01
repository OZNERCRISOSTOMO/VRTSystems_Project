<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/53a2b7f096.js" crossorigin="anonymous"></script>  
</head>
  <style>
    body{
        background-image: 
    url('../Pictures/2314983.jpg'), /* Image URL */
    linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
        background-size: cover; /* This ensures the image covers the entire background */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        background-attachment: fixed; /* Keeps the background fixed as you scroll */
        background-color: rgba(0, 0, 0.5, 0.5);
            }



    </style>
  <body>



            <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="card col-md-10 shadow-lg">
                
        
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-5">
                                <img src="../Pictures/63773689c5405621be6336d5e91b5b61.jpg" class="img-fluid">
                            </div>

                            <div class="col-md-7 p-4">

                            <p class="text-center fs-4 fw-bold">SIGN IN</p>
                            <form method="post" action="../functions/login.php">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <div class="text-center">        
                            <button type="submit" name="submit" class="btn btn-primary col-md-9 mx-auto">Submit</button>
                            </div>

                            

                            <small class="text-body-secondary text-center ">
                                    <center> Need an account? <a href="../Pages/signup.php" class="text-reset">Sign-Up</a>.</center>
                            </small>

                            <div class="d-flex justify-content-center  text-center gap-2 mt-1">
                            <i class="fa-brands fa-facebook fs-5 text-primary" ></i> <i class="fa-brands fa-instagram fs-5"></i> <i class="fa-solid fa-envelope fs-5"></i>
                            </div>
                        
                            </form>
                            </div>




                        </div>


                    </div>



                </div>


            </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>