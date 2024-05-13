<?php 
    // Start a new session or resume the existing session
    session_start();
    // Check if the 'flag' cookie is set
    if(!isset($_COOKIE['flag'])) {
        // If the 'flag' cookie is not set, redirect the user to the login page
        header('location: login.php');
    }
?>
