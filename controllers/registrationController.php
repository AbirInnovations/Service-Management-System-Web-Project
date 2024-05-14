<?php
function register($username, $password, $name, $address, $email, $mobileNumber) {
    session_start(); 
    require_once('../models/userModel.php'); 
    registration($username, $password, $name, $address, $email, $mobileNumber); 
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flag = false;
    $errMsg = ""; 

    // Assign form data to variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['password2'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobile_number'];

 
    if (empty($username)) { /* ... */ }
    if ($password != $confirmPassword) { /* ... */ }
    if (empty($address)) { /* ... */ }


    if (!preg_match('/[a-zA-Z]/', $username)) {
        $errMsg .= "Username must contain at least one character.<br />";
        $flag = true;
    }

    if (preg_match('/[0-9]/', $name)) {
        $errMsg .= "Name must not contain any numbers.<br />";
        $flag = true;
    }

    if (empty($password) || !preg_match('/[@#$&]/', $password)) {
        $errMsg .= "Password is required and must contain one of the special characters (@, #, $, or &).<br />";
        $flag = true;
    }

   
    if (!ctype_digit($mobileNumber) || strlen($mobileNumber) > 11) {
        $errMsg .= "Phone number must contain only numbers and must not be longer than 11 digits.<br />";
        $flag = true;
    }

    if (!filter_var($email,) || !preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $email) || strlen($email) > 30) {
        $errMsg .= "Email address must be valid, must contain @ and ., and must not exceed 30 characters.<br />";
        $flag = true;
    }

    if ($flag) {
        echo $errMsg;
    } else {
        
        register($username, $password, $name, $address, $email, $mobileNumber);
    }
}

?>