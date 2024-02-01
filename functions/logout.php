<?php
    session_start();
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: ../Pages/login.php"); // Redirect the user to the login page or any other desired page
    exit(); // Exit the script

