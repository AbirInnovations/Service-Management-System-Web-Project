<?php

// A function to register a new user
function register($username, $password, $name, $address, $email, $mobileNumber) {
    session_start(); // Start a new session or resume the existing session
    require_once('../models/userModel.php'); // Include the user model file for database operations
    registration($username, $password, $name, $address, $email, $mobileNumber); // Call the registration function
}

// Check if the form has been submitted via POST method
// Check if the form has been submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag = false; // Flag to indicate if there's an error in the form submission
    $errMsg = ""; // String to accumulate error messages

    // Assign form data to variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['password2'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobile_number'];

    // Existing validation checks
    if (empty($username)) { /* ... */ }
    if ($password != $confirmPassword) { /* ... */ }
    if (empty($address)) { /* ... */ }

    // New validation rules

    // Username must contain characters
    if (!preg_match('/[a-zA-Z]/', $username)) {
        $errMsg .= "Username must contain at least one character.<br />";
        $flag = true;
    }

    // Name should not contain any numbers
    if (preg_match('/[0-9]/', $name)) {
        $errMsg .= "Name must not contain any numbers.<br />";
        $flag = true;
    }

    // Password is required and should contain at least one of the specified special characters
    if (empty($password) || !preg_match('/[@#$&]/', $password)) {
        $errMsg .= "Password is required and must contain one of the special characters (@, #, $, or &).<br />";
        $flag = true;
    }

    // Mobile number should contain only numbers and not be longer than 11 digits
    if (!ctype_digit($mobileNumber) || strlen($mobileNumber) > 11) {
        $errMsg .= "Phone number must contain only numbers and must not be longer than 11 digits.<br />";
        $flag = true;
    }

    // Email should be in a proper format and not exceed 30 characters
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email) || strlen($email) > 30) {
        $errMsg .= "Email address must be valid, must contain @ and ., and must not exceed 30 characters.<br />";
        $flag = true;
    }

    // Display error message(s) if validation failed
    if ($flag) {
        echo $errMsg;
    } else {
        // Proceed with the registration if all validations pass
        register($username, $password, $name, $address, $email, $mobileNumber);
    }
}

?>