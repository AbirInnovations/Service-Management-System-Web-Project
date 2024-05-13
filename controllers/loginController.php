<?php

// Function to handle login logic
function loginControl($username, $password) {
    // Start or resume a session
    session_start();
    // Include the user model for database interaction
    require_once('../models/userModel.php');    
    // Call the login function from the user model and store the result
    $status = login($username, $password);

    // If login is successful
    if ($status) {
        // Set session and cookie flags to indicate an active login
        $_SESSION['flag'] = "true";
        setcookie('flag', 'true', time() + 3600, '/'); // Expires in 1 hour
        setcookie('user', $username, time() + 3600, '/'); // Expires in 1 hour
        return true;
    } else {
        return false;
    }
}

// Check if the server request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize error message and user credentials variables
    $errMsg = "";
    $username = $password = "";

    // Validate username
    if (empty($_POST['username'])) {
        $errMsg = "Username is required!";
    } else {
        $username = $_POST['username'];
    }

    // Validate password
    if (empty($_POST['password'])) {
        $errMsg = "Password is required!";
    } else {
        $password = $_POST['password'];
    }

    // If there's no error message, proceed to control login
    if (empty($errMsg)) {
        $result = loginControl($username, $password);

        // If login is successful, redirect to the dashboard
        if ($result) {
            header('location: ../views/dashboard.php');
            exit; // Ensure no further code is executed after redirect
        } else {
            // Set error message for invalid credentials
            $errMsg = "Invalid credentials!";
        }
    }
}

?>
