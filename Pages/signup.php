<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    body{
        background-image: url('../Pictures/2314983.jpg');
        background-size: cover; /* This ensures the image covers the entire background */
        background-repeat: no-repeat; /* Prevents the image from repeating */
        background-attachment: fixed; /* Keeps the background fixed as you scroll */
        background-color: rgba(0, 0, 0, 0.5);
            }



    </style>
  </head>
  <body>



    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card col-md-10 shadow-lg">
            <div class="card-body">
                <div class="row">
                
                    <div class="col-md-11 mx-auto">
                        <p class="text-center fs-4 fw-bold">SIGN UP</p>
                        <form id="signupForm" method="post" action="../functions/apply_employee.php" onsubmit="return validateForm()" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstname" class="form-label">Firstname</label>
                                    <input type="text" class="form-control" name="f_name" id="firstname" placeholder="Firstname" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastname" class="form-label">Lastname</label>
                                    <input type="text" class="form-control" name="l_name" id="lastname" placeholder="Lastname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="email@gmail.com" required>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    <div id="emailHelp" class="form-text">Your password must be 8-20 characters long, contain letters and numbers.</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                                    <div id="emailHelp" class="form-text">Your password and confirmation password must match.</div>
                                </div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    <input class="form-control" type="file" name="idPhoto" accept=".pdf" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary col-md-9 mx-auto shadow">Submit</button>
                                </div>
                                <small class="text-body-secondary text-center">
                                    Already have an account? <a href="../Pages/login.php" class="text-reset">Sign-In</a>.
                              </small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function validateForm() {
            var firstName = document.forms["signupForm"]["f_name"].value;
            var lastName = document.forms["signupForm"]["l_name"].value;
            var email = document.forms["signupForm"]["email"].value;
            var password = document.forms["signupForm"]["password"].value;
            var confirmPassword = document.forms["signupForm"]["confirmPassword"].value;
            var resume = document.forms["signupForm"]["resume"].value;

            if (firstName.trim() === "" || lastName.trim() === "") {
                alert("Firstname and Lastname cannot be empty.");
                return false;
            }

            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!email.match(emailRegex)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            var allowedExtensions = /(\.pdf)$/i;
            if (!allowedExtensions.test(resume)) {
                alert("Please upload a PDF file.");
                return false;
            }

            return true; // Form will submit if all validations pass
        }
    </script>

</body>

</html>