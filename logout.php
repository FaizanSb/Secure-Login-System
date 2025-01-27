<?php 
    session_start();


    // Ensure the session is started before unsetting

    if(isset($_SESSION['email'])){
        unset($_SESSION['email']); // Unset the email session variable
    }

    // Optionally, destroy the entire session
    //session_destroy(); // This removes all session data

    // Redirect the user to the login page
    header("Location: index.php");
    die; // Ensure no further code is executed after redirect
?>